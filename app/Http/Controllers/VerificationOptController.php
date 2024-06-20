<?php

namespace App\Http\Controllers;

use App\Mail\OTPVerificationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class VerificationOptController extends Controller
{
    public function showVerificationForm()
    {
        return view('auth.verification');
    }

    public function verifyCode(Request $request)
    {
        try {
            // Vérifie que les OTP et l'email sont fournis dans la requête
            $request->validate([
                'otp1' => 'required|string',
                'otp2' => 'required|string',
                'otp3' => 'required|string',
                'otp4' => 'required|string',
                'email' => 'required|email',
            ]);

            // Récupère l'utilisateur correspondant à l'email
            $user = User::where('email', $request->email)->first();

            // Vérifie si l'utilisateur existe
            if (!$user) {
                return response()->json(['status' => '01', 'message' => 'Utilisateur non trouvé.'], 404);
                Alert::error('Error', 'Utilisateur non trouvé.');
                return redirect()->back()->withInput();
            }

            // Vérifie si l'email de l'utilisateur est déjà vérifié
            if ($user->email_verified_at) {
                Alert::warning('Message', 'L\'email est déjà vérifié.');
                return redirect()->back()->withInput();
            }

            // Récupère et concatène les valeurs des champs OTP
            $otp = $request->input('otp1') . $request->input('otp2') . $request->input('otp3') . $request->input('otp4');

            // Vérifie si l'OTP correspond à celui enregistré dans la base de données
            if ($otp === $user->otp) {
                // Met à jour la colonne email_verified_at pour indiquer que l'email a été vérifié
                $user->update(['email_verified_at' => now()]);

                Alert::success('Message', 'Votre e-mail a été vérifié avec succès');
                $auth=auth()->user()->role;

                if($auth=='admin'){
                return redirect()->route('home.admin');
                }                                             //admin==Fournisseur et editor==Entreprise
                elseif($auth=='editor'){
                    return redirect()->route('home.editor');
                }
            } else {
                Alert::error('Error', 'Le code OTP est incorrect. Veuillez réessayer.');
                return redirect()->back()->withInput();
            }
        } catch (\Exception $e) {
            // Gestion des erreurs
            Alert::error('Error', 'Erreur interne du serveur: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function resendOTP(Request $request)
    {
        try {
            // Vérifie que l'email est fourni dans la requête
            $request->validate([
                'email' => 'required|email',
            ]);

            // Récupère l'utilisateur correspondant à l'email
            $user = User::where('email', $request->email)->first();

            // Vérifie si l'utilisateur existe
            if (!$user) {
                Alert::error('Error', 'Utilisateur non trouvé.');
                return redirect()->back()->withInput();
            }

            // Génération d'un nouvel OTP
            $otpCode = str_pad(random_int(0, 9999), 4, '0', STR_PAD_LEFT);

            // Mise à jour de l'OTP de l'utilisateur
            $user->otp = $otpCode; // Assurez-vous que la mise à jour est correcte
            $user->save(); // Sauvegarde de la mise à jour

            // Envoi du nouvel OTP par email
            Mail::to($request->email)->send(new OTPVerificationMail($otpCode));

            Alert::success('Message', 'Un nouvel email avec l\'OTP a été envoyé à votre adresse.');
            return redirect()->back()->withInput();
        } catch (\Exception $e) {
            Alert::error('Error', 'Erreur interne du serveur: ' . $e->getMessage(), 500);
            return redirect()->back()->withInput();
        }
    }
}

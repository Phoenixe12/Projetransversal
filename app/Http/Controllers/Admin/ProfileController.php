<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.profile.profil');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function userInformation(Request $request)
    {
        $utilisateur = User::find($request->input('id'));

        if ($utilisateur) {
            try {
                $utilisateur->name = $request->input('name');
                $utilisateur->email = $request->input('email');

                if ($request->hasFile('image')) {
                    $fichier = $request->file('image');

                    $extension = $fichier->getClientOriginalExtension();

                    $nomFichier = time() . "." . $extension;

                    $fichier->move(public_path('img/'), $nomFichier);
                    // Corriger le chemin de déplacement du fichier

                    $utilisateur->image = $nomFichier;
                }

                $utilisateur->update();

                Alert::success('Succès', 'Utilisateur mis à jour avec succès.');
                return redirect()->route('Gestion+Profil.index');
            } catch (Exception $e) {
                Alert::error('Erreur', 'Une erreur est survenue. Veuillez réessayer plus tard.' . $e->getMessage());
                return redirect()->back();
            }
        } else {
            Alert::warning('Attention', 'Utilisateur non trouvé.');
            return redirect()->back();
        }
    }



    public function updatePassword(Request $request){
        $user = User::find($request->input('id'));

        if ($user) {
            // Vérification du mot de passe actuel
            if (Hash::check($request->input('current_password'), $user->password)) {
                try {
                    $user->password = Hash::make($request->input('password'));
                    $user->save();

                    Alert::success('Success', 'Password updated successfully.');
                    return redirect()->route('Gestion+Profil.index');
                } catch (Exception $e) {
                    Alert::error('Error', 'An error occurred. Please try again later.');
                    return redirect()->back();
                }
            } else {
                Alert::warning('Warning', 'Current password is incorrect.');
                return redirect()->back();
            }
        } else {
            Alert::warning('Warning', 'User not found.');
            return redirect()->back();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 public function update(Request $request, $id){

 }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



}

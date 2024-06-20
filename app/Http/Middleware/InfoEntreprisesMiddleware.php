<?php

namespace App\Http\Middleware;

use App\Models\InformationEntreprise;
use App\Models\InformationFournisseur;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InfoEntreprisesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {

        // Vérifier si l'utilisateur est authentifié
        if (auth()->check()) {
            // Récupérer l'ID de l'utilisateur authentifié
            $id = auth()->user()->id;

            // Récupérer toutes les informations d'entreprise associées à l'utilisateur
            $informations = InformationEntreprise::where('idUser', $id)->get();

            // Vérifier s'il y a des informations d'entreprise associées à l'utilisateur
            if ($informations->isEmpty()) {
                // Rediriger l'utilisateur ou envoyer une réponse appropriée
                return redirect()->route('Entreprise.code')->with('error', 'Vous devez compléter vos informations d\'entreprise.');
            }
        } else {
            // Rediriger l'utilisateur non authentifié vers la page de connexion
            return redirect()->route('login');
        }

        // Si l'utilisateur est authentifié et que les informations de l'entreprise existent, passer la requête au prochain middleware
        return $next($request);
    }
}

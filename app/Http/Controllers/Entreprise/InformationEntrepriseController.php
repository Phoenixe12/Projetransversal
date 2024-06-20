<?php

namespace App\Http\Controllers\Entreprise;

use App\Http\Controllers\Controller;
use App\Models\InformationEntreprise;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InformationEntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.InformationEntreprise');
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

            try {
                // Validation des données reçues dans la requête
                $request->validate([
                    'nomCommercial' => 'string',
                    'nomEntreprise' => 'nullable|string',
                    'codePays' => 'string',
                    'telephone' => 'string',
                    'nomPays' => 'string',
                    'adresse' => 'string',
                    'idUser' => 'nullable|integer',
                    'idEntrepriseCategorie' => 'nullable|integer',
                ]);


                // Création d'une nouvelle instance de InformationEntreprise avec les données reçues
                $informationEntreprise = new InformationEntreprise();
                $informationEntreprise->nomOrganisation = $request->input('nomOrganisation');
                $informationEntreprise->emailOrganisation = $request->input('emailOrganisation');
                $informationEntreprise->codePays = $request->input('codePays');
                $informationEntreprise->telephone = $request->input('telephone');
                $informationEntreprise->nomPays = $request->input('nomPays');
                $informationEntreprise->adresse = $request->input('adresse');
                $informationEntreprise->idUser = $request->input('idUser');
                if ($request->hasFile('documentPdf')) {
                    $file = $request->file('documentPdf');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . "." . $extension;
                    $file->move('documentPdf/', $filename);
                    $informationEntreprise->documentPdf = $filename;
                }
             
                $informationEntreprise->save();

                // Réponse de
                Alert::success('Message', 'Données enregistrées avec succès');
                return redirect()->route('home.editor');
            } catch (\Exception $e) {
                // En cas d'erreur, renvoyer une réponse d'erreur avec le message d'erreur
                Alert::error('Error', 'Erreur lors de l\'enregistrement des données: ' . $e->getMessage());
                return redirect()->back()->withInput();
            }
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

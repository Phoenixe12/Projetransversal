<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BioBanque;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BioBanqueController extends Controller
{
    public function index()
    {
        return view('Admin.Biobanque.Biobanque');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = DB::table('biobanques')
            ->select(
                'biobanques.id',
                'biobanques.nom',
                'biobanques.adresseRue',
                'biobanques.codePostal',
                'biobanques.ville',
                'biobanques.region',
                'biobanques.pays',
                'biobanques.latitude',
                'biobanques.longitude',
                'biobanques.etage',
                'biobanques.etablissementHote',
                'biobanques.contactNom',
                'biobanques.contactFonction',
                'biobanques.contactTelephone',
                'biobanques.contactEmail',
                'biobanques.horairesOuverture',
                'biobanques.informationsAcces',
                'biobanques.siteWeb',
                'biobanques.informationsSupplementaires'
            )
            ->get();

        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $bioBanque = new BioBanque();
            $bioBanque->nom = $request->input('nom');
            $bioBanque->adresseRue = $request->input('adresseRue');
            $bioBanque->codePostal = $request->input('codePostal');
            $bioBanque->ville = $request->input('ville');
            $bioBanque->region = $request->input('region');
            $bioBanque->pays = $request->input('pays');
            $bioBanque->latitude = $request->input('latitude');
            $bioBanque->longitude = $request->input('longitude');
            $bioBanque->etage = $request->input('etage');
            $bioBanque->etablissementHote = $request->input('etablissementHote');
            $bioBanque->contactNom = $request->input('contactNom');
            $bioBanque->contactFonction = $request->input('contactFonction');
            $bioBanque->contactTelephone = $request->input('contactTelephone');
            $bioBanque->contactEmail = $request->input('contactEmail');
            $bioBanque->horairesOuverture = $request->input('horairesOuverture');
            $bioBanque->informationsAcces = $request->input('informationsAcces');
            $bioBanque->siteWeb = $request->input('siteWeb');
            $bioBanque->informationsSupplementaires = $request->input('informationsSupplementaires');

            // Save the bio-banque to the database
            $bioBanque->save();

            Alert::success('Success', 'Bio-banque créée avec succès.');
            return redirect()->route('Gestion+BioBanque+Admin.index');
        } catch (Exception $e) {
            Alert::error('Error', 'Une erreur est survenue. Veuillez réessayer plus tard.' . $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bioBanque = BioBanque::find($id);
        return response()->json([
            'status' => 200,
            'BioBanque' => $bioBanque,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request)
    {
        $bioBanque_id = $request->input('id');
        $bioBanque = BioBanque::find($bioBanque_id);

        try {
            $bioBanque->nom = $request->input('nom');
            $bioBanque->adresseRue = $request->input('adresseRue');
            $bioBanque->codePostal = $request->input('codePostal');
            $bioBanque->ville = $request->input('ville');
            $bioBanque->region = $request->input('region');
            $bioBanque->pays = $request->input('pays');
            $bioBanque->latitude = $request->input('latitude');
            $bioBanque->longitude = $request->input('longitude');
            $bioBanque->etage = $request->input('etage');
            $bioBanque->etablissementHote = $request->input('etablissementHote');
            $bioBanque->contactNom = $request->input('contactNom');
            $bioBanque->contactFonction = $request->input('contactFonction');
            $bioBanque->contactTelephone = $request->input('contactTelephone');
            $bioBanque->contactEmail = $request->input('contactEmail');
            $bioBanque->horairesOuverture = $request->input('horairesOuverture');
            $bioBanque->informationsAcces = $request->input('informationsAcces');
            $bioBanque->siteWeb = $request->input('siteWeb');
            $bioBanque->informationsSupplementaires = $request->input('informationsSupplementaires');
            $bioBanque->update();

            Alert::success('Success', 'Account updated successfully.');
            return redirect()->route('Gestion+BioBanque+Admin.index');
        } catch (Exception $e) {
            Alert::error('Error', 'An error has occurred. Please try again later.');
            return redirect()->back();
        }
    }


    public function destroy(Request $request)
    {
        $data_id = $request->input('deleteBiobanque');

        $data = BioBanque::find($data_id);
        try {
            // Delete entry from the database
            $data->delete();
            Alert::success('status', 'deleted successfully.');
            return redirect()->back()->withInput();
        } catch (\Illuminate\Database\QueryException $exception) {
            Alert::warning('status', 'Please complete all fields.');
            return redirect()->back()->withInput();
        } catch (\Exception $e) {
            Alert::error('status', 'An error has occurred. Please try again later.');
            return redirect()->back()->withInput();
        }
    }
}

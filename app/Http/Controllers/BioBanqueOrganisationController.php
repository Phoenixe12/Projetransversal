<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BioBanqueOrganisationController extends Controller
{
    public function index()
    {
        return view('organisation.pages.File_Biobanque.GestionBiobanque');
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

    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request)
    {

    }


    public function destroy(Request $request)
    {

    }
}

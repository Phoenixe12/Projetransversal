<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListeEntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.InformationEntreprise.InformationEntreprise');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $result = DB::table('users')
        ->join('information_entreprises', 'users.id', '=', 'information_entreprises.idUser')
        ->select(
           'users.id',
                'users.name',
                'users.first_name',
                'users.email',
                'users.matricule',
                'information_entreprises.nomOrganisation',
                'information_entreprises.emailOrganisation',
                'information_entreprises.documentPdf',
                'information_entreprises.nomPays',
                'information_entreprises.codePays',
                'information_entreprises.autorisation',
                'information_entreprises.telephone',
                'information_entreprises.adresse',
        )
        ->where('users.role','=','2')
        ->get();


    return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}


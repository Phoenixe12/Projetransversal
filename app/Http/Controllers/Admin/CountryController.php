<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Pays;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


     return view('Admin.Pays.pays');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $result = DB::table('pays')
        ->select(
            'pays.id',
            'pays.nomPays',
            'pays.codePays',
            'pays.flags',
        )->get();


    return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


       try {
               $Country = new Pays();
               $Country->nomPays = $request->input('nomPays');
               $Country->codePays = $request->input('codePays');
            // Convertir en chaîne de caractères
            if ($request->hasFile('flags')) {
                $file = $request->file('flags');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . "." . $extension;
                $file->move('flags/', $filename);
                $Country->flags = $filename;
            }

            $Country->save();


            Alert::success('status', 'Ajout réussi.');
            return redirect()->back()->withInput();
        } catch (\Illuminate\Database\QueryException $exception) {
            Alert::warning('status', 'Veuillez compléter tous les champs.' . $exception->getMessage());
            return redirect()->back()->withInput();
        } catch (\Exception $e) {
            Alert::error('status', 'Une erreur s\'est produite. Veuillez réessayer plus tard.');
            return redirect()->back()->withInput();
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
        $Country = Pays::find($id);
        return response()->json([
            'status' => 200,
            'Country' => $Country,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $Country_id = $request->input('id');
        $Country = Pays::find($Country_id);
        try {

            $Country->nomPays = $request->input('nomPays');
            $Country->codePays = $request->input('codePays');
         // Convertir en chaîne de caractères
         if ($request->hasFile('flags')) {
             $file = $request->file('flags');
             $extension = $file->getClientOriginalExtension();
             $filename = time() . "." . $extension;
             $file->move('flags/', $filename);
             $Country->flags = $filename;
         }

         $Country->update();


         Alert::success('status', 'Mise à jour réussie.');
         return redirect()->back()->withInput();
     } catch (\Illuminate\Database\QueryException $exception) {
         Alert::warning('status', 'Veuillez compléter tous les champs.' . $exception->getMessage());
         return redirect()->back()->withInput();
     } catch (\Exception $e) {
         Alert::error('status', 'Une erreur s\'est produite. Veuillez réessayer plus tard.');
         return redirect()->back()->withInput();
     }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data_id = $request->input('deleteCountry');
        $data = Pays::find($data_id);

        // Get the filename
        $filename = $data->image;

        try {
            // Delete entry from the database
            $data->delete();

            // Delete the file from the server if it exists
            if (!empty($filename) && file_exists(public_path('png250px/' . $filename))) {
                unlink(public_path('png250px/' . $filename));
            }


            Alert::success('status', 'Supprimé avec succès.');
            return redirect()->back()->withInput();
       } catch (\Illuminate\Database\QueryException $exception) {
         Alert::warning('status', 'Veuillez compléter tous les champs.');
         return redirect()->back()->withInput();
       } catch (\Exception $e) {
         Alert::error('status', 'Une erreur s\'est produite. Veuillez réessayer plus tard.');
         return redirect()->back()->withInput();
       }
    }
    }


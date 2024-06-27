<?php

namespace App\Http\Controllers;

use App\Models\Echantillon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class EchantillonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('organisation.pages.File_GestionDonnee.GestionDonnee');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        $result = DB::table('echantillons')
            ->select(
                'echantillons.id',
                'echantillons.numeroIdentification',
                'echantillons.datePrelevement',
                'echantillons.nomPatient',
                'echantillons.typeEchantillon',
                'echantillons.quantiteVolume',
                'echantillons.methodePrelevement',
                'echantillons.conditionsPrelevement',
                'echantillons.nomPreleveur',
                'echantillons.qualificationsPreleveur',
                'echantillons.temperatureConservation',
                'echantillons.tempsTransport',
                'echantillons.traitementPrealable',
                'echantillons.contexteClinique',
                'echantillons.traitementsEnCours',
                'echantillons.antecedentsMedicaux',
                'echantillons.analysesDemandees',
                'echantillons.prioriteUrgence'
            )
            ->where('echantillons.idUser', '=', $user->id)
            ->get();

        return response()->json($result);
    }

    public function getAll()
    {
        $user = Auth::user();

        $result = DB::table('echantillons')
            ->select(
                'echantillons.id',
                'echantillons.numeroIdentification',
                'echantillons.datePrelevement',
                'echantillons.nomPatient',
                'echantillons.typeEchantillon',
                'echantillons.quantiteVolume',
                'echantillons.methodePrelevement',
                'echantillons.conditionsPrelevement',
                'echantillons.nomPreleveur',
                'echantillons.qualificationsPreleveur',
                'echantillons.temperatureConservation',
                'echantillons.tempsTransport',
                'echantillons.traitementPrealable',
                'echantillons.contexteClinique',
                'echantillons.traitementsEnCours',
                'echantillons.antecedentsMedicaux',
                'echantillons.analysesDemandees',
                'echantillons.prioriteUrgence'
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

            $echantillon = new Echantillon();
            $user = Auth::user();
            $echantillon->idUser = $user->id;
            $echantillon->numeroIdentification = 'ID-' . strtoupper(uniqid());
            $echantillon->datePrelevement = $request->input('datePrelevement');
            $echantillon->nomPatient = $request->input('nomPatient');
            $echantillon->typeEchantillon = $request->input('typeEchantillon');
            $echantillon->quantiteVolume = $request->input('quantiteVolume');
            $echantillon->methodePrelevement = $request->input('methodePrelevement');
            $echantillon->conditionsPrelevement = $request->input('conditionsPrelevement');
            $echantillon->nomPreleveur = $user->name . ' ' . $user->first_name;
            $echantillon->qualificationsPreleveur = $request->input('qualificationsPreleveur');
            $echantillon->temperatureConservation = $request->input('temperatureConservation');
            $echantillon->tempsTransport = $request->input('tempsTransport');
            $echantillon->traitementPrealable = $request->input('traitementPrealable');
            $echantillon->contexteClinique = $request->input('contexteClinique');
            $echantillon->traitementsEnCours = $request->input('traitementsEnCours');
            $echantillon->antecedentsMedicaux = $request->input('antecedentsMedicaux');
            $echantillon->analysesDemandees = $request->input('analysesDemandees');
            $echantillon->prioriteUrgence = $request->input('prioriteUrgence');

            $echantillon->save();

            Alert::success('status', 'Ajout réussi.');
            return redirect()->back()->withInput();
        } catch (\Illuminate\Database\QueryException $exception) {
            Alert::warning('status', 'Veuillez compléter tous les champs. ' . $exception->getMessage());
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
        $Echantillon = Echantillon::find($id);
        return response()->json([
            'status' => 200,
            'Echantillon' => $Echantillon,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $echantillon_id = $request->input('id');
        $user = Auth::user();
        $echantillon = Echantillon::find($echantillon_id);
        try {
            $echantillon->idUser = $user->id;
            $echantillon->numeroIdentification = 'ID-' . strtoupper(uniqid());
            $echantillon->datePrelevement = $request->input('datePrelevement');
            $echantillon->nomPatient = $request->input('nomPatient');
            $echantillon->typeEchantillon = $request->input('typeEchantillon');
            $echantillon->quantiteVolume = $request->input('quantiteVolume');
            $echantillon->methodePrelevement = $request->input('methodePrelevement');
            $echantillon->conditionsPrelevement = $request->input('conditionsPrelevement');
            $echantillon->nomPreleveur = $user->name . ' ' . $user->first_name;
            $echantillon->qualificationsPreleveur = $request->input('qualificationsPreleveur');
            $echantillon->temperatureConservation = $request->input('temperatureConservation');
            $echantillon->tempsTransport = $request->input('tempsTransport');
            $echantillon->traitementPrealable = $request->input('traitementPrealable');
            $echantillon->contexteClinique = $request->input('contexteClinique');
            $echantillon->traitementsEnCours = $request->input('traitementsEnCours');
            $echantillon->antecedentsMedicaux = $request->input('antecedentsMedicaux');
            $echantillon->analysesDemandees = $request->input('analysesDemandees');
            $echantillon->prioriteUrgence = $request->input('prioriteUrgence');

            $echantillon->update();


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
        $data_id = $request->input('deleteEchantillon');
        $data = Echantillon::find($data_id);

        try {
            // Delete entry from the database
            $data->delete();

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

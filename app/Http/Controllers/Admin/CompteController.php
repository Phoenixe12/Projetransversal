<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\CompteMail;
use App\Mail\EntrepriseMail;
use App\Models\Categorie;
use App\Models\DroitAcces;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class CompteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permission=DroitAcces::all();
        return view('Admin.Compte.Compte',compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = DB::table('users')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.task',
                DB::raw("LPAD('*', 14, '*') AS password")
            )
            ->where('role', '=', 3)
            ->get();

        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $permission = new User();
            $name = $request->input('name');
            $email = $request->input('email');
            // Generate an 8-character alphanumeric password
            $password = Str::random(8);
            $hashedPassword = Hash::make($password);
            $permission->name = $name;
            $permission->email = $email;
            $permission->role = '3';
            $task = $request->input('task');
            $taskString = implode(', ', $task);
            $permission->task = $taskString;
            $permission->password = $hashedPassword;

            // Send authentication credentials to the user by email
            $details = [
                'name' => $name,
                'email' => $email,
                'password' => $password,
            ];

            Mail::to($email)->send(new EntrepriseMail($details));

            $permission->save();


            Alert::success('Success', 'Account created successfully. Login data sent to user.');
            return redirect()->route('Gestion+Compte.index');
        } catch (Exception $e) {
            Alert::error('Error', 'An error occurred. Please try again later.' . $e->getMessage());
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
        $Compte = User::find($id);
        return response()->json([
            'status' => 200,
            'Compte' => $Compte,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request)
    {
        $permission_id = $request->input('id');
        $permission = User::find($permission_id);

        try {

            $permission->name = $request->input('name');
            $permission->email = $request->input('email');
            $task = $request->input('task');
            $taskString = implode(', ', $task);
            $permission->task = $taskString;
            // Check if password field is provided
            if ($request->filled('password')) {
                $permission->password = Hash::make($request->input('password'));
            }

            $permission->update();

            Alert::success('Success', 'Account updated successfully.');
            return redirect()->route('Gestion+Compte.index');
        } catch (Exception $e) {
            Alert::error('Error', 'An error has occurred. Please try again later.');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data_id = $request->input('deleteCompte');

        $data = User::find($data_id);
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

<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $etudiants = User::with('etudiant')->orderBy('name', 'asc')->get();
        return view('etudiant.index', ['etudiants' => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::selectVille();

        return view('etudiant.create', ['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $request->validate([
            'name' => 'required|string|min:2|max:50',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|min:6|max:20',
            'adresse' => 'required|string|max:255',
            'phone' => 'required|digits:10',
            'date_de_naissance' => 'required|date|before:2003-01-01',
            'ville_id' => 'required|exists:villes,id',
        ]);

        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();       
        $etudiant = new Etudiant;
        $etudiant->user()->associate($user);
        $etudiant->adresse = $request->adresse;
        $etudiant->phone = $request->phone;
        $etudiant->date_de_naissance = $request->date_de_naissance;
        $etudiant->id = $user->id; 
        $etudiant->ville_id = $request->ville_id; 
        $etudiant->save();        

        return redirect(route('etudiant.show', $user->id));        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {        
        return view ('etudiant.show', ['etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::selectVille();
        return view('etudiant.edit', ['etudiant' => $etudiant, 'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:50',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|min:6|max:20',
            'adresse' => 'required|string|max:255',
            'phone' => 'required|digits:10',
            'date_de_naissance' => 'required|date|before:2003-01-01',
            'ville_id' => 'required|exists:villes,id',
        ]);

        $user = $etudiant->user; 
    
        $userData = [
            'nom' => $request->nom,
            'password' => Hash::make($request->password),
        ];
    
        if ($request->email !== $user->email) {
            $userData['email'] = $request->email;
        }
    
        $user->update($userData);
    
        $etudiant->update([
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id,
        ]);

        return view ('etudiant.show', ['etudiant' => $etudiant]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $user = $etudiant->user; 
        $etudiant->delete(); 
        $user->delete(); 
        return redirect(route('etudiant.index'));
    }
}

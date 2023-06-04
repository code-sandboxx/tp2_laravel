@extends('layouts.app')
@section('title', 'Modifier un étudiant')
@section('titleHeader', 'Modifier un étudiant')
@section('content')
    <div class="row mt-4 justify-content-center">
        <div class="col-6">
            <div class="card">
                <form method="post">
                    @csrf
                    @method('put')
                    <div class="card-header">
                       <h4 class="fs-4">Formulaire</h4> 
                    </div>
                    <div class="card-body">

                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" value="{{ $etudiant->nom }}" class="form-control mb-3"/>

                        <label for="adresse">Adresse</label>
                        <textarea name="adresse" id="adresse" class="form-control mb-3">{{ $etudiant->adresse }}</textarea>

                        <label for="email">Adresse courriel</label>
                        <input type="email" id="email" name="email" value="{{ $etudiant->email }}" class="form-control mb-3"/>

                        <label for="phone">Téléphone</label>
                        <input type="tel" id="phone" name="phone" value="{{ $etudiant->phone }}" class="form-control mb-3"/>

                        <label for="ville_id">Ville</label>
                        <select name="ville_id" id="ville_id" class="form-control mb-3">
                            @foreach($villes as $ville)
                                <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                            @endforeach
                        </select>

                        <label for="date_de_naissance">Date de naissance</label>                      
                        <input type="date" id="date_de_naissance" name="date_de_naissance" value="{{ $etudiant->date_de_naissance }}" class="form-control mb-3">

                    </div>

                    <div class="card-footer text-center">
                        <input type="submit" class="btn btn-success mt-3 mb-3" value="Sauvegarder">
                    </div>

                </form> 
            </div>
        </div>
    </div>
@endsection
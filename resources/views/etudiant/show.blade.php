@extends('layouts.app')
@section('title', 'Informations personnelles')
@section('titleHeader', 'Informations personnelles')
@section('content')


<div class="card m-5 col-10">
    <div class="card-header p-4">
        <h4 class="fs-4 text-center">Etudiant numero {{$etudiant->id}}</h4>
    </div>

    <div class="card-body p-5">

        <div class="row">                        

                <div class="d-inline-flex justify-content-between mb-3">

                    <a href="{{route('etudiant.index')}}" class="btn btn-outline-primary col-1">Retourner</a>
                    
                    <a href="{{route('etudiant.edit', $etudiant->id)}}" class="btn btn-success col-1">Modifier</a>  
                    
                    <button type="button" class="btn btn-danger col-1" data-bs-toggle="modal" data-bs-target="#modalDelete">Effacer</button>
                    
                </div>    

                <hr>

                <p class="mt-5 mb-4">
                    <strong>Nom :</strong> {{$etudiant->nom}}
                </p>                

                <p>
                    <strong>Date de naissance :</strong> {!! $etudiant->date_de_naissance !!}
                </p>
                
                <p>
                    <strong>Adresse :</strong> {!! $etudiant->adresse !!}
                </p>
                
                <p>
                    <strong>Numero de téléphone :</strong> {!! $etudiant->phone !!}
                </p>

                <p>
                    <strong>Adresse courriel :</strong> {!! $etudiant->email !!}
                </p>

                <p>
                    <strong>Ville :</strong> {{ $etudiant->etudiantHasVille?->nom }}
                </p>
            
            <hr>
        </div>
        
    </div>    
</div>


<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment effacer la donnée : {{ $etudiant->id}} ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Effacer" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>


@endsection

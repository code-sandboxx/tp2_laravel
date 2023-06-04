@extends('layouts.app')
@section('title', 'Le répertoire d’étudiants')
@section('titleHeader', 'Le répertoire d’étudiants')
@section('content')
        <div class="row">    
        
        <div class="row mt-5">

            <div class="col-12">

                <div class="card m-5">

                    <div class="card-header p-4">
                        <h4 class="fs-4 text-center">Liste d’étudiants</h4>
                    </div>

                    <div class="card-body p-5">

                        <div class="d-flex justify-content-between">

                            <div>
                                <p class="fs-5">Cliquez sur le nom d’étudiant dont informations vous désirez consulter</p>
                            </div>   

                            <div class="card d-flex flex-column p-3 bg-light">
                                <p class="fs-5">Ajouter un étudiant</p>
                                <a href="{{route('etudiant.index')}}" class="btn btn-success btn-sm">Ajouter</a>
                            </div>   

                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <ul>
                                    @forelse($etudiants->chunk(ceil($etudiants->count() / 2))[0] as $etudiant)
                                        <li class="list-unstyled"><a href="{{route('etudiant.index')}}" class="custom-link color-brown fs-6" >{{$etudiant->nom}}</a></li>
                                    @empty
                                        <li class="text-danger">Aucun article trouvé</li>
                                    @endforelse
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    @forelse($etudiants->chunk(ceil($etudiants->count() / 2))[1] as $etudiant)
                                        <li class="list-unstyled"><a href="{{route('etudiant.index')}}" class="custom-link color-brown fs-6" >{{$etudiant->nom}}</a></li>
                                    @empty
                                        <li class="text-danger">Aucun article trouvé</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>     
                     
                </div>                             
            </div>
        </div>
@endsection
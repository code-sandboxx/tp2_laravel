@extends('layouts.app')
@section('title', config('app.name'))
@section('titleHeader', config('app.name'))
@section('content')
        <div class="row mt-5 pt-5 justify-content-center">
            <div class="col-10 text-center flex-grow-1">
                <p>
                    <h2 class="mt-5 pt-5 color-brown">Consulter la liste d'étudiants du Collège Maisonneuve</h2>
                </p>
                <a href="" class="btn btn-success btn-lg fw-bold mt-3">Afficher la liste</a>
            </div>
        </div>
@endsection
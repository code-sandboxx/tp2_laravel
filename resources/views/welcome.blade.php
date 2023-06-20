@extends('layouts.app')
@section('title', config('app.name'))
@section('titleHeader', config('app.name'))
@section('content')
        <div class="row mt-5 justify-content-center">
            <div class="col-10 text-center flex-grow-1">
                <p>
                    <h2 class="color-brown">Consulter la liste d'étudiants du Collège Maisonneuve</h2>
                </p>
                @if(Auth::check())
                    <a href="{{ route('etudiant.index') }}" class="btn btn-success btn-lg fw-bold mt-3">Afficher la liste</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-success btn-lg fw-bold mt-3">Afficher la liste</a>
                @endif

            </div>
        </div>
@endsection
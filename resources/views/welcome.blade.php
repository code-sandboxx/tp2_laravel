@extends('layouts.app')
@section('title', config('app.name'))
@section('titleHeader', config('app.name'))
@section('content')
        <div class="row mt-5 justify-content-center">
            <div class="col-10 text-center flex-grow-1">
                <p>
                    <h2 class="color-brown">@lang('lang.welcome_text')</h2>
                </p>
               
                <a href="{{ route('etudiant.index') }}" class="btn btn-success btn-lg fw-bold mt-3">@lang('lang.welcome_show_list')</a>              

            </div>
        </div>
@endsection
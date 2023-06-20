@extends('layouts.app')
@section('title', trans('lang.text_registration'))
@section('titleHeader', trans('lang.text_registration'))
@section('content')
    <div class="row justify-content-center">
        <div class="col-6 mb-5">
            <div class="card">
                <form method="post">
                @csrf
                <div class="card-body">

                    <label for="email">Name</label>
                    <input type="text" class="form-control mt-3 mb-3" name="name" placeholder="@lang('lang.text_name')" value="{{old('name')}}">
                    @if($errors->has('name'))
                        <div class="text-danger mt-2">
                            {{$errors->first('name')}}
                        </div>
                    @endif

                    <label for="email">Email address</label>
                    <input type="email" class="form-control mt-3 mb-3" name="email" placeholder="@lang('lang.text_email')" value="{{old('email')}}">
                    @if($errors->has('email'))
                        <div class="text-danger mt-2">
                            {{$errors->first('email')}}
                        </div>
                    @endif

                    <label for="email">Password</label>
                    <input type="password" class="form-control mt-3 mb-3" name="password" placeholder="@lang('lang.text_password')">
                    @if($errors->has('password'))
                        <div class="text-danger mt-2">
                            {{$errors->first('password')}}
                        </div>
                    @endif                    

                    <label for="phone">Téléphone</label>
                    <input type="tel" id="phone" name="phone" class="form-control mt-3 mb-3"/>

                    <label for="date_de_naissance">Date de naissance</label>     
                    <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control mt-3 mb-3">

                    <label for="adresse">Adresse</label>
                    <textarea name="adresse" id="adresse" class="form-control mt-3 mb-3"></textarea>

                    <label for="ville_id">Ville</label>
                        <select name="ville_id" id="ville_id" class="form-control mt-3 mb-3">
                            @foreach($villes as $ville)
                                <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                            @endforeach
                        </select>                    

                </div>
                <div class="card-footer d-grid mx-auto">
                    <input type="submit" value="@lang('lang.text_save')" class="btn btn-dark btn-block">
                </div>
                
                </form>
            </div>
        </div>
    </div>
@endsection
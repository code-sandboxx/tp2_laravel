@extends('layouts.app')
@section('title', trans('lang.etu_create_add_text'))
@section('titleHeader', trans('lang.etu_create_add_text'))
@section('content')
    <div class="row mt-4 justify-content-center">
        <div class="col-6">
            <div class="card">
                <form method="post">
                    @csrf
                    <div class="card-header">
                       <h4 class="fs-4">@lang('lang.etu_create_form_title')</h4> 
                    </div>
                    <div class="card-body">

                    <label for="name">@lang('lang.name')</label>
                    <input type="text" class="form-control mt-3 mb-3" name="name" placeholder="@lang('lang.name_placeholder')">
                    @if($errors->has('name'))
                        <div class="text-danger mt-2">
                            {{$errors->first('name')}}
                        </div>
                    @endif

                    <label for="email">@lang('lang.email')</label>
                    <input type="email" class="form-control mt-3 mb-3" name="email" placeholder="@lang('lang.email_placeholder')">
                    @if($errors->has('email'))
                        <div class="text-danger mt-2">
                            {{$errors->first('email')}}
                        </div>
                    @endif

                    <label for="password">@lang('lang.password')</label>
                    <input type="password" class="form-control mt-3 mb-3" name="password" placeholder="@lang('lang.password_placeholder')">
                    @if($errors->has('password'))
                        <div class="text-danger mt-2">
                            {{$errors->first('password')}}
                        </div>
                    @endif                    

                    <label for="phone">@lang('lang.phone')</label>
                    <input type="tel" id="phone" name="phone" class="form-control mt-3 mb-3"/>
                    @if($errors->has('phone'))
                        <div class="text-danger mt-2">
                            {{$errors->first('phone')}}
                        </div>
                    @endif  

                    <label for="date_de_naissance">@lang('lang.dob')</label>     
                    <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control mt-3 mb-3">
                    @if($errors->has('date_de_naissance'))
                        <div class="text-danger mt-2">
                            {{$errors->first('date_de_naissance')}}
                        </div>
                    @endif  

                    <label for="adresse">@lang('lang.address')</label>
                    <textarea name="adresse" id="adresse" class="form-control mt-3 mb-3" placeholder="@lang('lang.address_placeholder')"></textarea>
                    @if($errors->has('adresse'))
                        <div class="text-danger mt-2">
                            {{$errors->first('adresse')}}
                        </div>
                    @endif  


                    <label for="ville_id">@lang('lang.city')</label>
                        <select name="ville_id" id="ville_id" class="form-control mt-3 mb-3">
                            @foreach($villes as $ville)
                                <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                            @endforeach
                        </select> 
                    </div>
                    @if($errors->has('ville_id'))
                        <div class="text-danger mt-2">
                            {{$errors->first('ville_id')}}
                        </div>
                    @endif  

                    <div class="card-footer text-center">
                        <input type="submit" class="btn btn-success mt-3 mb-3" value="@lang('lang.save_btn')">
                    </div>

                </form> 
            </div>
        </div>
    </div>
@endsection
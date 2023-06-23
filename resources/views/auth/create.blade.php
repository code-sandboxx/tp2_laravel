@extends('layouts.app')
@section('title', trans('lang.auth_registration'))
@section('titleHeader', trans('lang.auth_registration'))
@section('content')
    <div class="row justify-content-center">
        <div class="col-6 mb-5">
            <div class="card">
                <form method="post">
                @csrf
                <div class="card-body">

                    <label for="name">@lang('lang.name')</label>
                    <input type="text" class="form-control mt-3 mb-3" name="name" placeholder="@lang('lang.name_placeholder')" value="{{old('name')}}">
                    @if($errors->has('name'))
                        <div class="text-danger mt-2">
                            {{$errors->first('name')}}
                        </div>
                    @endif

                    <label for="email">@lang('lang.email')</label>
                    <input type="email" class="form-control mt-3 mb-3" name="email" placeholder="@lang('lang.email_placeholder')" value="{{old('email')}}">
                    @if($errors->has('email'))
                        <div class="text-danger mt-2">
                            {{$errors->first('email')}}
                        </div>
                    @endif

                    <label for="email">@lang('lang.password')</label>
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
                    <textarea name="adresse" id="adresse" placeholder="@lang('lang.address_placeholder')" class="form-control mt-3 mb-3"></textarea>
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
                    @if($errors->has('ville_id'))
                        <div class="text-danger mt-2">
                            {{$errors->first('ville_id')}}
                        </div>
                    @endif  
                      

                </div>
                <div class="card-footer d-grid mx-auto">
                    <input type="submit" value="@lang('lang.save_btn')" class="btn btn-dark btn-block my-3">
                </div>
                
                </form>
            </div>
        </div>
    </div>
@endsection
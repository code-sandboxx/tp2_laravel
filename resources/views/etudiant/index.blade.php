@extends('layouts.app')
@section('title', trans('lang.etu_index_directory'))
@section('titleHeader', trans('lang.etu_index_directory'))
@section('content')
        <div class="row">    
        
        <div class="row mt-5">

            <div class="col-12">

                <div class="card m-5">

                    <div class="card-header p-4">
                        <h4 class="fs-4 text-center">@lang('lang.etu_index_list')</h4>
                    </div>

                    <div class="card-body p-5">

                        <div class="d-flex justify-content-between">

                            <div>
                                <p class="fs-5">@lang('lang.etu_index_instruction')</p>
                            </div>   

                            <div class="card d-flex flex-column p-3 bg-light">
                                <p class="fs-5">@lang('lang.etu_index_add_text')</p>
                                <a href="{{route('etudiant.create')}}" class="btn btn-success btn-sm">@lang('lang.etu_index_add_btn')</a>
                            </div>   

                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <ul>
                                    @forelse($etudiants->chunk(ceil($etudiants->count() / 2))[0] as $etudiant)
                                        <li class="list-unstyled"><a href="{{ route('etudiant.show', $etudiant->id)}}" class="custom-link color-brown fs-6" >{{$etudiant->name}}</a></li>
                                    @empty
                                        <li class="text-danger">@lang('lang.etu_index_error_no_students')</li>
                                    @endforelse
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    @forelse($etudiants->chunk(ceil($etudiants->count() / 2))[1] as $etudiant)
                                        <li class="list-unstyled"><a href="{{ route('etudiant.show', $etudiant->id)}}" class="custom-link color-brown fs-6" >{{$etudiant->name}}</a></li>
                                    @empty                                        
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>                          
                </div>                             
            </div>
        </div>
@endsection
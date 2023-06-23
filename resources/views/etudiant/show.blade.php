@extends('layouts.app')
@section('title', trans('lang.etu_show_info_text'))
@section('titleHeader', trans('lang.etu_show_info_text'))
@section('content')


<div class="card m-5 col-10">

    <div class="card-header p-4">
        <h4 class="fs-4 text-center">@lang('lang.etu_show_number') {{$etudiant->id}}</h4>
    </div>

    <div class="card-body p-5">

        <div class="row">                        

                <div class="d-inline-flex justify-content-between mb-3">

                    <a href="{{route('etudiant.index')}}" class="btn btn-outline-primary col-2">@lang('lang.back_btn')</a>
                    
                    <a href="{{route('etudiant.edit', $etudiant->id)}}" class="btn btn-success col-2">@lang('lang.modify_btn')</a>  
                    
                    <button type="button" class="btn btn-danger col-2" data-bs-toggle="modal" data-bs-target="#modalDelete">@lang('lang.delete_btn')</button>
                    
                </div>    

                <hr>

                <p class="mt-5 mb-4">
                    <strong>@lang('lang.name') :</strong> {{$etudiant->user->name}}
                </p>                

                <p>
                    <strong>@lang('lang.dob') :</strong> {!! $etudiant->date_de_naissance !!}
                </p>
                
                <p>
                    <strong>@lang('lang.address') :</strong> {!! $etudiant->adresse !!}
                </p>
                
                <p>
                    <strong>@lang('lang.phone') :</strong> {!! $etudiant->phone !!}
                </p>

                <p>
                    <strong>@lang('lang.email') :</strong> {!! $etudiant->user->email !!}
                </p>

                <p>
                    <strong>@lang('lang.city') :</strong> {{ $etudiant->etudiantHasVille?->nom }}
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.delete_btn')</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @lang('lang.etu_modal_message')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close_btn')</button>
        <form method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="@lang('lang.delete_btn')" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>


@endsection

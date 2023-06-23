@extends('layouts.app')
@section('title', trans('lang.post'))
@section('titleHeader', trans('lang.post'))
@section('content')

<div class="card my-5 col-11">

    <div class="card-header py-4">
        <h4 class="fs-4 text-center">{{$post->user->name}} @lang('lang.post_wrote'): </h4>        
    </div>

    <div class="card-body">

        <div class="row">  
          <div class="mt-5 mb-4 d-flex justify-content-between fs-5">                    
            <span><strong>@lang('lang.post_title') :  {{ $post->{"title_$language"} }}</strong></span>
            <span><strong>@lang('lang.post_show_date') : </strong> {{$post->created_at}}</span>
          </div>  
          <hr>                               
          <p class="py-5">
          {{ $post->{"body_$language"} }}
          </p>            
          <hr>

          <div class="d-inline-flex justify-content-between py-3">

            <a href="{{route('post.index')}}" class="btn btn-outline-primary col-2">@lang('lang.back_btn')</a>

            <!-- Affiche les boutons juste a l'utilisateur-auteur de l'article -->
            @if(Auth::id() == $post->user_id)

              <a href="{{ route('post.edit', ['post' => $post, 'language' => $language]) }}" class="btn btn-success col-2">@lang('lang.modify_btn')</a>  

              <button type="button" class="btn btn-danger col-2" data-bs-toggle="modal" data-bs-target="#modalDelete">@lang('lang.delete_btn')</button>

            @endif  

          </div>   

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
        @lang('lang.post_modal_message')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close_btn')</button>
        <form method="post" action="{{ route('post.delete', $post->id) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="@lang('lang.delete_btn')" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

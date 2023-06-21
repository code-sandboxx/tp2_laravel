@extends('layouts.app')
@section('title', 'Article')
@section('titleHeader', 'Article')
@section('content')

<div class="card my-5 col-11">

    <div class="card-header py-4">
        <h4 class="fs-4 text-center">{{$post->user->name}} wrote: </h4>        
    </div>

    <div class="card-body">

        <div class="row">  
          <div class="mt-5 mb-4 d-flex justify-content-between fs-5">                    
            <span><strong>Title :  {{$post->title_en}}</strong></span>
            <span><strong>Date : </strong> {{$post->created_at}}</span>
          </div>  
          <hr>                               
          <p class="py-5">
            {{$post->body_en}}
          </p>            
          <hr>

          <div class="d-inline-flex justify-content-between py-3">

            <a href="{{route('post.index')}}" class="btn btn-outline-primary col-2">Retourner</a>

            <!-- Affiche les boutons juste a l'utilisateur-auteur de l'article -->
            @if(Auth::id() == $post->user_id)

              <a href="{{route('post.edit', $post->id)}}" class="btn btn-success col-2">Modifier</a>  

              <button type="button" class="btn btn-danger col-2" data-bs-toggle="modal" data-bs-target="#modalDelete">Effacer</button>

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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Voulez-vous vraiment effacer cet article?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form method="post" action="{{ route('post.delete', $post->id) }}">
                    @csrf
                    @method('delete')
                    <input type="submit" value="Effacer" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

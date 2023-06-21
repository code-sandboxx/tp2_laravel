@extends('layouts.app')
@section('title', 'Forum')
@section('titleHeader', 'Articles')
@section('content')
        <div class="d-flex justify-content-between align-items-baseline px-5">
            <div class="ms-5 fw-bolder">
                <p>Cliquez sur un article pour lire</p>
            </div>
            <div class="me-5 fw-bolder">
                Créer un nouveau article
                <a href="{{route('post.create')}}"class="btn btn-primary mx-4">Ajouter</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card m-5">

                    <div class="card-header d-flex align-items-center">
                        <h5 style="flex-basis: 20%; " class="px-3">Author</h5>
                        <h5 style="flex-basis: 70%;">Article</h5>
                        <h5 style="flex-basis: 10%;">Created</h5>
                    </div>

                    <div class="card-body">

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                        <ul class="list-unstyled">
                            @forelse($posts as $key => $post)
                                <li class="d-flex align-items-baseline {{ $key % 2 == 1 ? 'bg-light' : 'bg-white' }}">

                                    <div style="flex-basis: 20%;">
                                        <p class="px-3">{{ $post->user->name }}</p>
                                    </div>    

                                    <div style="flex-basis: 70%;">
                                        <a href="{{ route('post.show', $post->id)}}" class="custom-link color-brown">{{$post->title_en}}</a>
                                    </div>  
                                    
                                    <div style="flex-basis: 10%;">
                                        <span>{{ $post->created_at->format('d/m/Y') }}</span>
                                    </div>
                                </li>
                            @empty
                                <li class="text-danger">Aucun article trouvé</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection
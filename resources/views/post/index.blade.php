@extends('layouts.app')
@section('title', trans('lang.post_forum'))
@section('titleHeader', trans('lang.post_forum'))
@section('content')
        <div class="d-flex justify-content-between align-items-baseline px-5">
            <div class="ms-5 fw-bolder">
                <p>@lang('lang.post_forum_instruction')</p>
            </div>            
        </div>

        <div class="d-flex justify-content-between align-items-baseline px-5 mt-5">
           <a href="{{ route('post.index', ['language' => 'en']) }}" class="btn btn-info mx-4">@lang('lang.post_eng_btn')</a>
           <a href="{{ route('post.index', ['language' => 'fr']) }}" class="btn btn-info mx-4">@lang('lang.post_fr_btn')</a>
           <a href="{{ route('post.index', ['language' => 'en_fr']) }}" class="btn btn-info mx-4">@lang('lang.post_all_btn')</a>
           <a href="{{ route('post.create', ['language' => $language]) }}" class="btn btn-primary mx-4">@lang('lang.post_add_btn')</a>
        </div>    

        <div class="row">
            <div class="col-12">
                <div class="card m-5">

                    <div class="card-header d-flex align-items-center">
                        <h5 style="flex-basis: 20%; " class="px-3">@lang('lang.post_author')</h5>
                        <h5 style="flex-basis: 70%;">@lang('lang.post')</h5>
                        <h5 style="flex-basis: 10%;">@lang('lang.post_date')</h5>
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
                                        <a href="{{ route('post.show', ['post' => $post, 'language' => $language])}}" class="custom-link color-brown">{{ $post->{"title_$language"} }}</a>
                                    </div>  
                                    
                                    <div style="flex-basis: 10%;">
                                        <span>{{ $post->created_at->format('d/m/Y') }}</span>
                                    </div>
                                </li>
                            @empty
                                <li class="text-danger">@lang('lang.etu_index_error_no_posts')</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@endsection
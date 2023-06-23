@extends('layouts.app')
@section('title', trans('lang.post_edit_text'))
@section('titleHeader', trans('lang.post_edit_text'))
@section('content')
    <div class="row mt-4 justify-content-center">
        <div class="col-11">

            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link link" id="en-tab" data-language="en" href="{{ route('post.edit', ['post' => $post->id, 'language' => 'en']) }}">EN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link" id="fr-tab" data-language="fr" href="{{ route('post.edit', ['post' => $post->id, 'language' => 'fr']) }}">FR</a>
                </li>      
            </ul>

            <div class="card mb-5">
                <form method="post">
                    @csrf
                    @method('put')                    
                    <div class="card-body p-4">

                        <input type="hidden" name="language" id="language" value="{{ $language }}">

                        <label for="title">@lang('lang.post_title')</label>
                        <input type="text" id="title" name="title" value="{{ $title }}" class="form-control my-3"/>
                        @if($errors->has('title'))
                            <div class="text-danger mt-2">
                                 {{$errors->first('title')}}
                            </div>
                        @endif

                        <label for="body">@lang('lang.post_edit_content')</label>
                        <textarea name="body" id="body" class="form-control my-3" rows="8">{{ $body}}</textarea>
                        @if($errors->has('body'))
                            <div class="text-danger mt-2">
                                 {{$errors->first('body')}}
                            </div>
                        @endif
                            
                    </div>

                    <div class="card-footer text-center">
                        <input type="submit" class="btn btn-success mt-3 mb-3" value="@lang('lang.save_btn')">
                    </div>

                </form> 
            </div>
        </div>
    </div>
@endsection

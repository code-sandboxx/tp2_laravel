<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($language=null)
    {
        $locale = app()->getLocale();
    
        $language = $locale;

        //echo($locale);       

     if($language === 'en') {
            $posts = Post::whereNotNull('title_en')
                         ->whereNotNull('body_en')
                         ->orderBy('created_at', 'desc')
                         ->get();
        } elseif ($language === 'fr') {
            $posts = Post::whereNotNull('title_fr')
                         ->whereNotNull('body_fr')
                         ->orderBy('created_at', 'desc')
                         ->get();
        } elseif ($language === 'en_fr') {
            $posts = Post::orderBy('created_at', 'desc')->get();
        }               

        return view('post.index', ['posts' => $posts, 'language' => $language]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($language = null)
    {
        $post = new Post();
        $language = app()->getLocale();
        return view('post.create', compact('post', 'language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $language = null)
    {
        $post = new Post();
        $language = $language ?? app()->getLocale();
        $title = 'title_' . $language;
        $body = 'body_' . $language;

        $newPost = Post::create([
            $title => $request->title,
            $body => $request->body,      
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('post.show', [$newPost->id, $language]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, $language)
    {
        $post->load('user');
        return view('post.show', compact('post', 'language'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, $language = null)
    {
        $language = $language ?? app()->getLocale();
        $title = ($language === 'en') ? $post->title_en : $post->title_fr;
        $body = ($language === 'en') ? $post->body_en : $post->body_fr;

        if (Auth::id() !== $post->user_id) {            
            return redirect()->route('post.index')->with('error', 'Unauthorized access. Only the post author can modify the post');    
        }
        return view('post.edit', compact('post', 'title', 'body', 'language'));
    }    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
        ]);    

        $language = $request->input('language'); 
    
        if ($language === 'en') {
            $post->update([
                'title_en' => $request->input('title'),
                'body_en' => $request->input('body')
            ]);
        } elseif ($language === 'fr') {
            $post->update([
                'title_fr' => $request->input('title'),
                'body_fr' => $request->input('body')
            ]);
        }

        return redirect(route('post.show', ['post' => $post, 'language' => $language]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('post.index'));
    }
}

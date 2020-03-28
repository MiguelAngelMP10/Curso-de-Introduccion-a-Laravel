<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\PostRequest;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //Guaradar 
        $post = Post::create([
            'user_id' => auth()->user()->id,
        ] + $request->all());
        //imagen

        if ($request->file('image')) {
            $post->image = $request->file('image')->store('posts', 'public');
            $post->save();
        }

        //retornar
        return back()->with('status', 'Creado con éxito');
    }


    public function edit(Post $post)
    {
        return view('posts.edit',  compact('post'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());
        //imagen
        if ($request->file('image')) {
            Storage::disk('public')->delete($post->image);
            //eliminar imagen 
            $post->image = $request->file('image')->store('posts', 'public');
            $post->save();
        }
        return back()->with('status', 'Actuzalizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //eliminarcion de imagen
        Storage::disk('public')->delete($post->image);
        $post->delete();
        return back()->with('status', 'Eliminado con éxito');
    }
}
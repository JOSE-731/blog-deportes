<?php

namespace App\Http\Controllers;
use App\Post;
use App\Http\Requests\PostRequest;
use App\User;
//Agregamos  esta clase para eliminar del storage la imagen anterior, en la opcion editar
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
        //Obtenemos el id del usuario logeado
        $user1 = auth()->user()->id;
        $posts = Post::where('user_id', '=', $user1)->orderby('id', 'desc')->get();

        return view('posts.index', compact('posts', 'user1'));
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
        //dd($request->all());
        $post = Post::create([
            'user_id' => auth()->user()->id
        ] + $request->all());

        if($request->hasFile('imagen')){
            $post['imagen']=$request->file('imagen')->store('uploads','public');
            $post->save();
        }

        return back()->with('status', 'Creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());

        if($request->hasFile('imagen')){
            //Eliminar la imagen
            Storage::disk('public')->delete($post->imagen);
            $post['imagen']=$request->file('imagen')->store('uploads','public');
            $post->save();
        }

        return redirect('post')->with('status', 'Actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //Eliminar la imagen
        Storage::disk('public')->delete($post->imagen);   
        $post->delete();

        return back();
    }
}

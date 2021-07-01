<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function posts(){
        //Todos los post y los ordena de forma ascendente
        $posts = Post::orderby('id', 'desc')->paginate();
        return view('posts', compact('posts'));
    }

    public function post(Post $post){
        
        //Obtenemos todo lo del post que se envie por parametro
        return view('post', ['post' => $post]);
    }


    public function information(){
        return view('posts.information');
    }
}

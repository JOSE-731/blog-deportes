<?php

namespace App\Http\Controllers;
use App\Post;
//Importramos la clase generadora de pdf
use Barryvdh\DomPDF\Facade as PDF;
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
        
        //Obtenemos el id del usuario logeado
        $user1 = auth()->user()->id;
        $posts = Post::where('user_id', '=', $user1)->orderby('id', 'desc')->get();
        
        //$pdf = PDF::loadView('posts.information');
        //return $pdf->download('prueba.pdf');

        return view('posts.information',compact('posts'));
    }

    public function pdf(){
        $user1 = auth()->user()->id;
        $posts = Post::where('user_id', '=', $user1)->orderby('id', 'desc')->get();
        $pdf = PDF::loadView('posts.information', compact('posts'))->setOptions(['defaultFont' => 'sans-serif']); 
         return $pdf->download('prueba.pdf');
    }
}

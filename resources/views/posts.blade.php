@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($posts as $post)
                <div class="card m-4">
                    <h5 class="card-title m-3">{{ $post->title }}</h5>
                    <p class="card-text m-3">
                        
                        {{ //Utiliza get_the_excerpt () para generar primero una versión reducida del contenido completo de la publicación en caso de que no haya un extracto explícito de la publicación.                        
                            $post->get_excerpt }}
                        <a href="{{ route('post', $post) }}">Leer mas</a>
                    </p>
                    <p class="text-muted m-3">
                        <em>
                            &ndash; {{ $post->user->name }}
                        </em>
                        {{ $post->created_at->format('d M Y') }}
                    </p>
                </div>
            @endforeach
            {{$posts->links()}}
        </div>
    </div>
</div>
@endsection

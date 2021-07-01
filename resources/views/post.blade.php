@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @if($post->imagen)
                        <img src="{{ $post->get_image }}" alt="imagen" class="card-img-top">
                        <h5 class="card-title m-3">{{ $post->title }}</h5>
                        <p class="card-text m-3">
                            {{ $post->body }}
                        </p>
                        <p class="text-muted m-3">
                            <em>
                                &ndash; {{ $post->user->name }}
                            </em>
                            {{ $post->created_at->format('d M Y') }}
                        </p>
                      @endif
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection

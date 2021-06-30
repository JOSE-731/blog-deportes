@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Editar articulo
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('post.update', $post) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>Titulo *</label>
                            <input type="text" name="title" value="{{ $post->title }}" class="form-control" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Imagen</label>
                            <input type="file" name="imagen">
                        </div>
                        <div class="form-group">
                            <label>Descripcion *</label>
                            <textarea name="body" rows="6" class="form-control" autocomplete="off">{{ $post->body }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Recursos de Apoyo *</label>
                            <textarea name="iframe" rows="4" class="form-control" autocomplete="off">{{ $post->iframe }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Actualizar" class="btn btn-sm btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

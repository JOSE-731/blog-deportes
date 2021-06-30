@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Articulos
                    <a href="{{ route('post.create') }}" class="btn btn-sm btn-primary float-right">
                      Crear
                    </a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Bienvenido al panel de administrador de noticias!') }}

                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-2">
        <div class="col-md-8">
            <div class="card bg-dark">
                <div class="card-header">
                    <div class="card-body bg-dark">
                        <table class="table table-dark">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>TITULO</th>
                                    <th>OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($posts as $value)
                                 <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>
                                        <a href="{{ route('post.edit', $value) }}" class="btn btn-primary btn-sm">
                                          EDITAR
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('post.destroy', $value) }}" method="POST">
                                          @method('delete')
                                          @csrf
                                          <input type="submit" value="ELIMINAR" class="btn btn-danger btn-sm">
                                        </form>
                                    </td>
                                 </tr>
                              @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

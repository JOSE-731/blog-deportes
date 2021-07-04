@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
          <a href="{{ route('descarga') }}">Mis datos</a>
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
                                <th>FECHA</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($posts as $value)
                             <tr>
                                <td>{{ $value->id }}</td>
                                <td>{{ $value->title }}</td>
                                <td>{{ $value->created_at->format('d M Y') }}</td>
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
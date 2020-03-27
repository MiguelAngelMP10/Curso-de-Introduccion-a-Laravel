@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header h2 text-center">
                    <i class="far fa-newspaper"></i> Articulos
                <a href="{{route('posts.create') }}"  
                class="btn btn-outline-success float-right"><i class="fas fa-plus-circle" style="white-space: nowrap;"></i>&nbsp;Crear</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center align-middle">
                                <th scope="col">Id</th>
                                <th>Titulo</th>
                                <th colspan="2">Operaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <th scope="col" class="align-middle text-center">{{ $post->id }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <a href="{{ route('posts.edit',$post) }}" class="btn btn-outline-primary" style="white-space: nowrap;"><i class="far fa-edit"></i>&nbsp;Editar
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('posts.destroy',$post) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                type="submit" 
                                                class="btn btn-outline-danger" 
                                                style="white-space: nowrap;" 
                                                onclick="return confirm('¿Desea eliminar regristro?')"
                                            >
                                                <i class="far fa-trash-alt"></i> Eliminar
                                            </button>
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
@endsection

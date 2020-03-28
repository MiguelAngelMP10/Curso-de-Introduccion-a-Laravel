@extends('layouts.app')
   

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center h4"><i class="far fa-edit"></i> Editar Articulo</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <form action="{{ route('posts.update',$post) }}" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title" class="font-weight-bold">Titulo *:</label>
                            <input id="Titulo" class="form-control" type="text" name="titulo" required value="{{ old('title', $post->title) }}">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6 align-items-center row m-0">
                                    <div class="form-group custom-file ">
                                        <input type="file" class="custom-file-input" name="image" id="image">
                                        <label class="custom-file-label" for="image" data-browse="Elige una imagen">Elige una imagen</label>                           
                                    </div>
                                </div>
                                <div class="col-6">
                                    <img src="{{url('storage/'.$post->image)}}" alt="imagen" class="img-thumbnail float-left rounded">
                                </div>

                            </div>
                      
                        </div>

                         <div class="form-group">
                            <label for="body" class="font-weight-bold">Contenido *:</label>
                            <textarea class="form-control" name="body" id="body" rows="3" required>{{ old('body', $post->body) }}</textarea>
                        </div>

                         <div class="form-group">
                            <label for="iframe" class="font-weight-bold">Contenido embebido:</label>
                            <textarea class="form-control" name="iframe" id="iframe">{{ old('iframe', $post->iframe) }}</textarea>
                        </div>

                        <div class="form-group text-center">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-outline-primary col-2 btn-lg"><i class="far fa-edit"></i> Actualizar</button>
                            
                        </div>

                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

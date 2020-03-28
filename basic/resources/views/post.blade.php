@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    @if ($post->image)
                         <img src="{{ $post->get_image }}" alt="imagen" class="img-thumbnail img-fluid card-img-top">
                       @endif
                    @if($post->iframe)
                     <div class="embed-responsive embed-responsive-16by9">
                         {!! $post->iframe !!}
                     </div>
                     @endif
                    <h class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">
                        {{ $post->body }}
                    </p>
                    <p class="text-muted mb-0">
                        <em>
                            &adash; {{ $post->user->name }}
                        </em>
                        {{ $post->created_at->format('d M Y') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

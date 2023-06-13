@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                    <a href={{url('createPost')}}>
                        <button type="button" class="btn btn-primary">Create Post</button>
                    </a>
                </div>
            </div>
            {{-- Fetching images start --}}
            @foreach ($posts as $post)
            <div class="card" style="width: 18rem;">
{{--                 <img class="card-img-top" src="storage . {{ $post->post }}" alt="Card image cap">
 --}}                <img src="{{ url('storage/' . $post->post) }}" alt="post">
                <div class="card-body">
                  <h5 class="card-title">Description</h5>
                  <p class="card-text">{{ $post->description }}</p>
                  {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                </div>
              </div>
            @endforeach
            {{-- Fetching images ends --}}
        </div>
    </div>
</div>
@endsection

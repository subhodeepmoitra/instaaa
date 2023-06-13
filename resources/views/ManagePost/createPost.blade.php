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
                    <form action="{{url('createPostStore')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="username" class="form-control" name="username" id="username" aria-describedby="username" value={{Auth::user()->username}} readonly>
                          </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="useremail" id="email" aria-describedby="emailHelp" value={{Auth::user()->email}} readonly>
                          </div>


                        <div class="form-group">
                            <label for="escription">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                          </div>



                          <div class="form-group">
                            <label for="post">Post</label>
                            <input type="file" class="form-control-file" id="post" name="post">
                          </div>

                          <button type="submit" name="submit" class="btn btn-success" data-mdb-ripple-color="dark">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

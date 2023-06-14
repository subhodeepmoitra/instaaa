<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <title>Index</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Instagram Clone</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/profile') }}">Profile</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>


                </ul>
                <form action="{{ url('search') }}" method="GET" class="d-flex" role="search">
                    @csrf
                    <input class="form-control me-2" name="search" id="search" type="search"
                        placeholder="Search Users" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    {{-- Feed start --}}
    @foreach ($posts as $values)
    
        <div class="card" style="width: 18rem;">
            {{-- <img src="{{ url('storage/') }}{{ $values->post }}" alt="post"> --}}
            {{--             @dd(storage_path('app/public/post'.{{$values->post}}))
 --}}
            {{--  @php
     dd($values->post);
 @endphp --}}
            <img src="@isset($values->post)
{{ url('storage/' . $values->post) }}
 @endisset"
                alt="">
            <div class="card-body">
                <p class="card-text">

                    <span>Dislike</span>



                    {{-- @if ($like->like == 0 && $like->dislike == 0) --}}
                    {{--       <a href="{{ url('/like', ['postid' => $values->id, 'useremail' => Auth::user()->username]) }}"
                    class="btn btn-success">Like</a> --}}
                    {{-- @endif --}}

                    {{-- @if ($like->like == 1 && $like->dislike == 0) --}}
                    {{--     <a href="{{ url('/dislike', ['postid' => $values->id, 'useremail' => Auth::user()->username]) }}"
                    class="btn btn-danger">Dislike</a> --}}
                    {{-- @endif --}}

                    {{-- @if ($like->like == 0 && $like->dislike == 1) --}}
                </p>
            </div>
        </div>
    @endforeach
    {{-- <script>
        function like(id, count) {
            $.get("{{ url('/like') }}/" + id + '/' + count, function(data, status) {

                if (count == 1) {
                    $('#like').hide();
                    $('#dislike').show();

                } else {
                    $('#dislike').hide();
                    $('#like').show();
                }

                likeCount = $('.like-count-' + id).text();
                //alert(like[0]);

                $('.like-count-' + id).text(Number(likeCount[0]) + count);

            });
        }
    </script> --}}

    {{-- Feed ends --}}


</body>

</html>

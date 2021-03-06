@extends('layout.frontened')
@section('form')


    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">
<form class="form-signin" method="post" action="{{route('register')}}">
    @csrf

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('message'))
        <div class="alert alert-{{session('type')}}">
            {{session('message')}}
        </div>
        @endif





    <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>


    <label for="inputEmail" class="sr-only">Name</label>
    <input type="text" id="inputEmail" class="form-control" placeholder="Name"  name="name" value="{{old('name')}}" >
    <br>
    <label for="inputPassword" class="sr-only">Email Address</label>
    <input type="email" id="inputPassword" class="form-control" placeholder="Email Address"  name="email"  value="{{old('email')}}" >
    <br>

    <label for="inputPassword" class="sr-only">Contact No</label>
    <input type="text" id="inputPassword" class="form-control" placeholder="Contact No" name="contact_no"  value="{{old('contact_no')}}" >

    <br>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password"  name="password" value="{{old('password')}}" >
    <br>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
</form>
</body>
</html>



@endsection

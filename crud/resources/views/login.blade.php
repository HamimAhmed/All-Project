<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login form</title>
    <link href="{{mix('css/app.css')}}" rel="stylesheet">
</head>
<body class="cnt">
<div class="container">
    <div class="row">
        <div class="col-md-10 offset=md-1">
            <div class="row">
                <div class="col-md-5 register-left">
                    <h3>
                        Join with us
                    </h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam architecto aspernatur aut,
                        blanditiis consequatur corporis dicta doloru
                    </p>
                    <button type="button" class="btn btn-primary">Registration</button>
                </div>
                <div class="col-md-7 register-right">
                    <h2>
                        Login Here
                    </h2>

                    <div class="register-form">
                        @if($errors->any())

                            <div class=" alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session()->has('message'))

                            <div class="alert alert success">
                                {{session('message')}}
                            </div>

                        @endif
                        <form action="{{route('login')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <input name="email" type="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                            </div>

                            <div class="form-group">
                                <input  name="password" type="password" class="form-control" placeholder="Password" value="{{old('password')}}">
                            </div>


                            <button  type="submit"  class="btn btn-primary">
                                Login
                            </button>

                        </form>

                    </div>



                </div>
            </div>

        </div>
    </div>
</div>




<link href="{{mix('js/app.js')}}">
</body>
</html>

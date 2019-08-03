<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>@yield('title','home page')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{mix('css/app.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->


</head>

<body>

@include('partials._navbar')
<!-- Page Content -->
<div class="container">

    <div class="row">

       @include('partials._sidbar')
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            @yield('content')
        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
@include('partials._footer')

<!-- Bootstrap core JavaScript -->
<script src="{{mix('js/app.js')}}"></script>


</body>

</html>

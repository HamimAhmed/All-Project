@include('partial/header')

<!-- Navigation -->
@include('partial/navbar')
<!-- Page Content -->
<div class="container">

    <div class="row">

        @includeWhen( $sidbar,'partial/sidbar')
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

        @yield('form')
            <div class="row">
                @yield('content')




            </div>
            <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
@include('partial/footer')

@extends('layout.frontened')

@section('form')

    <div class="card mt-4">
        <img class="card-img-top img-fluid" src="{{asset('uploads/images/'.$product->image)}}" alt="no image found">
        <div class="card-body">
            <h3 class="card-title">{{$product->name}}</h3>
            <h4> BDT {{$product->price}} under {{$product->category->name}}</h4>
            <p class="card-text">{{$product->description}}</p>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            4.0 stars

            <a class="btn btn-success" href="">Add to Cart</a>
        </div>
    </div>
    <!-- /.card -->


    <!-- /.card -->
    @endsection

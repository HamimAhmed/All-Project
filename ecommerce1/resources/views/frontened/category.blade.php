@extends('layout.frontened')



@section('content')

    <div class="text-md-center">
        <h3 class="text-md-center text-info">
            {{$category->name}}
        </h3>
    </div>

@foreach($products as $product)

    <div class="col-lg-4 col-md-6 mb-4">

        <div class="card h-100">
            <a href="#"><img class="card-img-top" src="{{asset('uploads/images/'.$product->image)}}" alt="no image"></a>
            <div class="card-body">
                <h4 class="card-title">
                    <a href="#">{{$product->name}}</a>
                </h4>
                <h5>{{$product->price}}</h5>
                <p class="card-text">{{$product->description}}</p>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary">
                    Add to Cart
                </button>
            </div>
        </div>
    </div>
    @endforeach

    @endsection

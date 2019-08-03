@extends('layout.frontened')

@section('content')
    @include('partial.carosel')

    @foreach($products as $product)

    <div class="col-lg-4 col-md-6 mb-4">
        <div class="card h-100">
            <a href="#"><img class="card-img-top" src="uploads/images/{{$product->image}}" alt="no image found"></a>
            <div class="card-body">
                <h4 class="card-title">
                    <a href="{{ route('product.show', $product->slug) }}">{{$product->name}}</a>
                </h4>
                <h5>BDT {{$product->price}}</h5>
                <p class="card-text">
                    {{$product->description}}
                </p>
            </div>

                <form action="{{route('cart')}}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    {{--{{dd($product->id)}}--}}
                    <button type="submit" class="btn btn-info">
                        Add To Card
                    </button>
                </form>

        </div>

    </div>

    @endforeach
    @endsection

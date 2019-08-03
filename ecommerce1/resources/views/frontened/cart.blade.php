@extends('layout.frontened')

@section('content')

    @if (session()->has('message'))
        <div class="alert alert-{{session('type')}}">
            {{session('message')}}
        </div>
    @endif
<div class="container">
<h3 class="text-md-center">
    Cart
</h3>

    @if(!empty($cart))
    <table class="table table-bordered table-hover">
        <thead>

        <tr>
            <td>SL.</td>
            <td>Product Name</td>
            <td>Quantity</td>
            <td>Unit Price</td>
            <td>Total Price</td>
            <td>Action</td>
        </tr>

        </thead>

        <tbody>

            @php $i = 1 @endphp

            @foreach($cart as $product_id => $product)
            <tr>
            <td>{{$i++}}</td>
            <td>{{$product['name']}}</td>
            <td>{{$product['quantity']}}</td>
            <td>{{ number_format($product['price'])}} BDT</td>
            <td>{{ number_format($product['total_price'])}} BDT</td>
             <td>
                 <form action="{{route('cart.delete')}}" method="post">
                     @csrf
                     <input type="hidden" value="{{$product_id}}" name="product_id">
                     <button type="submit" class="btn btn-sm btn-danger">X</button>
                 </form>
                 <form action="{{route('cart')}}" method="post">
                     @csrf
                     <input type="hidden" value="{{$product_id}}" name="product_id">
                     <button type="submit" class="btn btn-sm btn-success">+</button>
                 </form>

                 <form action="{{route('cart.remove')}}" method="post">
                     @csrf
                     <input type="hidden" value="{{$product_id}}" name="product_id">
                     <button type="submit" class="btn btn-sm btn-warning">-</button>
                 </form>
             </td>
            </tr>
            @endforeach


        <tr>
           <td></td>
           <td></td>
           <td></td>
           <td>Total</td>
           <td>{{ number_format($total)}} BDT</td>
           <td>
               <a class="btn btn-danger" href="{{route('cart.clear')}}">X</a>
           </td>
        </tr>
        </tbody>
    </table>

        @else
        <div class="alert alert-info">
            You have no product in your cart
        </div>
        @endif
</div>
    @endsection

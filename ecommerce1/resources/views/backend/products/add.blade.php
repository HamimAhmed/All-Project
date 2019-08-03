@extends('layout.backend')

@section('content')

    <h3 class="mt-5 text-md-center">
        Add New Product
    </h3>

    <form method ="POST" action="{{route('products.store')}}" method="post" enctype="multipart/form-data">

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


        <div class="form-group">
            <label for="formGroupExampleInput">Products Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Product Name" name="name" value="{{old('name')}}">
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Products Description</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="description" value="{{old('description')}}">
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Products Price</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Product Price" name="price" value="{{old('price')}}">
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Category</label>
            <select class="form-control" id="exampleFormControlSelect1" name="category">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" > {{ $category->name }}</option>
                    @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="formGroupExampleInput">Products Quantity</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Product quantity" name="quantity" value="{{old('quantity')}}">
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Select status</label>
            <select class="form-control" id="exampleFormControlSelect1" name="status">
                <option value="1">Active</option>
                <option value="0">Inactive</option>

            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Select Image</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="photo">
        </div>


        <button class="btn btn-outline-warning mb-5 col-6">
            Submit
        </button>
    </form>


    @endsection

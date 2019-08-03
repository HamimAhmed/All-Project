@extends('layout.backend')

@section('content')

    <form method ="POST" action="{{route('categories.update', $category->id)}}">

        @csrf
        @method('PUT')
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
            <label for="formGroupExampleInput">Category Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" value="{{$category->name}}" placeholder="Category Name" name="name">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Select Status</label>
            <select class="form-control" id="exampleFormControlSelect1" name="status">
                <option value="1" @if($category->active == 1) selected @endif>Active</option>
                <option value="0" @if($category->active == 0) selected @endif>Inactive</option>

            </select>
        </div>
        <button class="btn btn-outline-warning">
            Submit
        </button>
    </form>
    @endsection

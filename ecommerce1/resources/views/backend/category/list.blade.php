@extends('layout.backend')

@section('content')
    {{--session--}}
    @if (session()->has('message'))
        <div class="alert alert-{{session('type')}}">
            {{session('message')}}
        </div>
    @endif

    <h3 class="text text-md-center">
        Category list
    </h3>

    <table class="table table-bordered table-hover ">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Slug</td>
            <td>Status</td>
            <td>Action</td>

        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->slug}}</td>
            <td>{{$category->active == 1 ? 'active':'inactive'}}</td>
            <td>
                <a href="{{route('categories.edit',$category->id)}}" class="btn btn-info">Edit</a>
                <form action="{{route('categories.destroy',$category->id)}}" method="post" onsubmit="return confirm('are you sure!')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </td>

        </tr>
            @endforeach
        </tbody>
    </table>

    {!! $categories->links() !!}
    @endsection

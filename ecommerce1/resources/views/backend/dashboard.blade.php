@extends('layout.backend')

@section('content')
     <div class ="alert alert-info mt-5">
         you have been logged in as {{ optional(auth()->user()) ->email }}

     </div>

    @endsection

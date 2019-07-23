@extends('layouts.global')
@section('title') Create Category @endsection
@section('content')

@if(session('status'))
<div class="alert alert-success">
{{session('status')}}
</div>
@endif

    <form action="{{route('categories.store')}}" method="POST"
    class="bg-white shadow-sm p-3" enctype="multipart/form-data">

    @csrf
    <label for="name">Category Name</label><br>
    <input class="form-control" type="text" name="name"><br>

    <label for="image">Category Image</label><br>
    <input class="form-control" type="file" name="image"><br>

    <input class="form-control" type="submit" value="save"><br>

    </form>

@endsection


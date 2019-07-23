@extends('layouts.global')
@section('title') Edit User @endsection
@section('content')

<div class="col-md-8">

    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    <form class="bg-white shadow-sm p-3" enctype="multipart/form-data" action="{{route('users.update',['id'=>$user->id])}}" method="post">
        @csrf
        <input type="hidden" value="PUT" name="_method">
        <label for="name">NAMA</label>
        <input value="{{$user->name}}" class="form-control" placeholder="Full Name" type="text" name="name" id="name"/> <br>
        <label for="username">Username</label>
        <input class="form-control" type="text" value="{{$user->username}}" placeholder="username" id='username'><br>
        <label for="">Status</label>
        <br/>
        <input {{$user->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE" type="radio" class="form-control"
        id="active"  name="status">
        <label for="active">Active</label>
        <input {{$user->status == "INACTIVE" ? "checked" : ""}} value="INACTIVE" type="radio" class="form-control" id="inactive" name="status">
        <label for="inactive">Inactive</label>
        <br><br>
        <label for="">Roles</label>
        <br>
        <input type="checkbox" {{in_array("ADMIN", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="ADMIN" value="ADMIN">
        <label for="ADMIN">Administrator</label>
        <input type="checkbox" {{in_array("STAFF", json_decode($user->roles)) ? "checked" : ""}}
        name="roles[]" id="STAFF" value="STAFF">
        <label for="STAFF">Staff</label>
        <input type="checkbox" {{in_array("CUSTOMER", json_decode($user->roles)) ? "checked" : ""}}
        name="roles[]" id="CUSTOMER" value="CUSTOMER">
        <label for="CUSTOMER">Customer</label>
        <br>
        <br>
        <label for="phone">Phone Number</label>
        <br>
        <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
        <br>
        <textarea type="text" name="address" class="form-control" value="{{$user->address}}">
        </textarea>
        <br>

        <label for="avatar">Avatar Image</label>
        <br>
        Current Avatar: <br>
        @if ($user->avatar) <br>
            <img src="{{asset('storage'.$user->avatar)}}" width="120px" alt="avatar">
        @else
            No Avatar
        @endif

        <br>
        <input id="avatar" name="avatar" type="file" class="form-control">
        <small class="text-muted">Kosongkan jika tidak ingin mengubah avatar</small>
        <hr class="my-3">

        <label for="email">Email</label>
        <input value="{{$user->email}}" disabled class="form-control" placeholder="user@mail.com" type="text"
        name="email" id="email"/>
        <br>

        <input class="btn btn-primary" type="submit" value="Save"/>
        </form>

</div>
@endsection

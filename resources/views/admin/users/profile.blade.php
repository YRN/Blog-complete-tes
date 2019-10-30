@extends('layouts.app')
@section('content')

@if(count($errors)> 0)
<ul class="list-group">
    @foreach($errors->all() as $error)
    <ul class="list-group-item text-danger">
        {{$error}}
    </ul>
    @endforeach
</ul>
@endif
<div class="card">
    <div class="card-header">
        Edit Your Profile
    </div>
    <div class="card-body">
        <form action="{{route('users.profile.update')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Username</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">Email</label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">New Password</label>
                <input type="text" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">Upload New Avatar</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">Facebook Profile</label>
                <input type="text" name="facebook" value="{{$user->profile->facebook}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">Youtube Profile</label>
                <input type="text" name="youtube" value="{{$user->profile->youtube}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="content">About You</label>
                <textarea class="form-control" name="about" id="about" cols="5"
                    rows="5">{{ $user->profile->about }}</textarea>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Profile</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
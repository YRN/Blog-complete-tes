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
        Edit Your Site Settings
    </div>
    <div class="card-body">
        <form action="{{route('settings.update',['id'=>$settings->id])}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Site Name</label>
                <input type="text" name="site_name" value="{{$settings->site_name}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">Address</label>
                <input type="text" name="address" value="{{$settings->address}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">Contact Number</label>
                <input type="text" name="contact_number" value="{{$settings->contact_number}}" class="form-control">
            </div>
            <div class="form-group">
                <label for="title">Contact Email</label>
                <input type="text" name="contact_email" value="{{$settings->contact_email}}" class="form-control">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Site Settings</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
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
        Edit Tag : {{$tag->tag}}
    </div>
    <div class="card-body">
        <form action="{{route('tags.update',['id'=>$tag->id])}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" name="tags" value="{{$tag->tag}}" class="form-control">
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Save Tag</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
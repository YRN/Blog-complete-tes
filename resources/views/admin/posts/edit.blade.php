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
        Edit post : {{$post->title}}
    </div>
    <div class="card-body">
        <form action="{{route('post.update',['id'=>$post->id])}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" value="{{$post->title}}" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="featured">Featured Image</label>
                <input type="file" name="featured" class="form-control">
            </div>
            <div class="form-group">
                <label for="category">Select Category</label>
                <select name="category_id" id="category" class="form-control">
                    @foreach($categories as $category){
                    <option value="{{$category->id}}" @if($post->category->id == $category->id)
                        selected
                        @endif
                        >{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Select Tags</label><br>
                @foreach($tags as $tag)
                <input name="tags[]" type="checkbox" value="{{$tag->id}}" @foreach($post->tags as $t)
                @if($tag->id == $t->id)
                checked
                @endif
                @endforeach

                > {{ $tag->tag }}<br>
                @endforeach
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" name="content" id="content" cols="5"
                    rows="5">{{$post->content}}</textarea>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Update Post</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">

@stop
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js" defer></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#content').summernote();
});
</script>

@stop
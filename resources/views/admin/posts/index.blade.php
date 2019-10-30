@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Edit</th>
                <th>Trashed</th>
            </thead>
            <tbody>
                @if($post->count() > 0)
                @foreach($post as $posts)
                <tr>
                    <td>

                        <img src="{{$posts->featured}}" alt="{{$posts->title}}" width="100px" height="60px">
                    </td>
                    <td>
                        {{$posts->title}}
                    </td>
                    <td>
                        <a href="{{route('post.edit',['id'=>$posts->id])}}" class="btn btn-sm btn-info">
                            Edit</a>
                    </td>
                    <td>
                        <a href="{{route('post.delete',['id'=>$posts->id])}}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
                @else
                <th colspan="5" class="text-center">No posts yet</th>
                @endif
            </tbody>

        </table>

    </div>
</div>



@stop
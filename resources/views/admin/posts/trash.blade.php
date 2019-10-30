@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Restore</th>
                <th>Destroy</th>
            </thead>
            <tbody>
                @if($post->count() > 0)
                @foreach($post as $posts)
                <tr>
                    <td>
                        <img src="{{$posts->featured}}" alt="{{$posts->title}}" width="50px" height="50px">

                    </td>
                    <td>
                        {{$posts->title}}
                    </td>
                    <td>
                        <a href="{{route('post.restore',['id'=>$posts->id])}}" class="btn btn-sm btn-success">
                            Restore</a>
                    </td>
                    <td>
                        <a href="{{route('post.kill',['id'=>$posts->id])}}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
                @else
                <th colspan="5" class="text-center">No trashed posts</th>
                @endif
            </tbody>

        </table>

    </div>
</div>



@stop
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <th>Tag Name</th>
                <th>Edit</th>
                <th>Trashed</th>
            </thead>
            <tbody>
                @if($tags->count() > 0)
                @foreach($tags as $tag)
                <tr>
                    <td>
                        {{$tag->tag}}
                    </td>
                    <td>
                        <a href="{{route('tags.edit',['id'=>$tag->id])}}" class="btn btn-sm btn-info">
                            Edit</a>
                    </td>
                    <td>
                        <a href="{{route('tags.delete',['id'=>$tag->id])}}" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
                @else
                <th colspan="5" class="text-center">No Tags yet</th>
                @endif
            </tbody>

        </table>

    </div>
</div>



@stop
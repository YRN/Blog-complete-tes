@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Permissions</th>
                <th>Delete</th>
            </thead>
            <tbody>
                @if($users->count() > 0)
                @foreach($users as $user)
                <tr>
                    <td>
                        <img src="{{asset($user->profile->avatar)}}" alt="" width="60px" height="60px"
                            style="border-radius:50%;">
                    </td>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        @if($user->admin)

                        <a href="{{ route('users.not.admin' ,['id'=>$user->id]) }}" class="btn btn-sm btn-danger">Remove
                            Permissions</a>

                        @else

                        <a href="{{ route('users.admin' ,['id'=>$user->id]) }}" class="btn btn-sm btn-success">Make
                            Admin</a>

                        @endif
                    </td>
                    <td>
                        @if(Auth::id() !== $user->id)
                        <a href="{{ route('users.delete' ,['id'=>$user->id]) }}"
                            class="btn btn-sm btn-danger">Delete</a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @else
                <th colspan="5" class="text-center">No users yet</th>
                @endif
            </tbody>

        </table>

    </div>
</div>



@stop
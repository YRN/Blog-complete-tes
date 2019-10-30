@extends('layouts.app')

@section('content')


<div class="col-lg-3">
    <div class="card bg-primary mb-3 mx-auto">
        <div class="card-header">
            Published Posts
        </div>
        <div class="card-body">
            <h1 class="text-center">
                {{$posts_count}}
            </h1>
        </div>
    </div>
    <div class="card bg-danger mb-3 mr-0">
        <div class="card-header">
            Trashed Posts
        </div>
        <div class="card-body">
            <h1 class="text-center">
                {{$trashed_count}}
            </h1>
        </div>
    </div>
    <div class="card bg-success mb-3">
        <div class="card-header">
            user
        </div>
        <div class="card-body">
            <h1 class="text-center">
                {{$users_count}}
            </h1>
        </div>
    </div>
    <div class="card bg-primary mb-3">
        <div class="card-header">
            categories
        </div>
        <div class="card-body">
            <h1 class="text-center">
                {{$categories_count}}
            </h1>
        </div>
    </div>
</div>

@endsection
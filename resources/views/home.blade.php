@extends('layouts.app')

@section('content')

<div class="container">
  <div class="card-deck">
    <div class="card bg-primary">
      <div class="card-header">Published Posts</div>
      <div class="card-body">
        <h1 class="text-center">{{ $posts_count }}</h1>
      </div>
    </div>
    <div class="card bg-danger">
      <div class="card-header">Trashed Posts</div>
      <div class="card-body">
        <h1 class="text-center">{{ $trashed_count }}</h1>
      </div>
    </div>
    <div class="card bg-success">
      <div class="card-header">user</div>
      <div class="card-body">
        <h1 class="text-center">{{ $users_count }}</h1>
      </div>
    </div>
    <div class="card bg-primary">
      <div class="card-header">categories</div>
      <div class="card-body">
        <h1 class="text-center">{{ $categories_count }}</h1>
      </div>
    </div>
  </div>
</div>


   

@endsection
@extends('layouts.app')
@section('title', 'Edit a category') 

@section('content')
<div class="card">
  <div class="card-header">Edit a category : {{ $category->name }}</div>
  <div class="card-body">
    @include('includes.errors')
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
      @csrf
      @method("PUT")
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" value="{{ $category->name }}">
      </div>
      <div class="text-center">
        <button class="btn btn-primary form-control">Update a category</button>
      </div>
    </form>
  </div>
</div>

@stop
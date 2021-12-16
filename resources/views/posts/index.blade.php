@extends('layouts.app')
@section('title', 'Posts')
@section('content')
<div class="d-flex justify-content-end">
<button type="button" class="btn btn-primary btn-sm my-2" data-toggle="modal" data-target="#modelId">
  Add post
</button>
</div>
<div class="card">
  <div class="card-header">Posts</div>
  <div class="card-body">
    @include('includes.errors')
    <table class="table table-hover">
      <thead>
        <th>Name</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
      </thead>
      <tbody>
        @foreach($posts as $post)
        <tr>
          <td>{{ $post->title }}</td>
          <td><img src="{{ asset("storage/$post->image") }}" height="50" style="border-radius: 50%" alt=""></td>
          <td>
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
          </td>
          <td>
            <button class="btn btn-danger btn-sm">Delete</button>
          </td>
        </tr>
          
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection





<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Create a post</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <div class="modal-body">

        <div class="container-fluid">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control">
          </div>
          <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control">
          </div>
            <select name="category_id" class="form-control">
              @foreach($categories as $category)
                <option value="{{ $category->id }}"> {{ $category->name }}</option>
              @endforeach
            </select>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="6"></textarea>
          </div>
          <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" rows="3"></textarea>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>
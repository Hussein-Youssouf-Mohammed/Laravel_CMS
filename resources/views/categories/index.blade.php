@extends('layouts.app')
@section('title')
Categories
@endsection
@section('content')
<div class="d-flex justify-content-end">
 
  <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#category">
    Add category
  </button>
</div>
<div class="card">
  <div class="card-header">Categories</div>
  <div class="card-body">
    @include('includes.errors')
    <table class="table table-hover">
       <thead>
         <th>Name</th>
         <th>Delete</th>
         <th>Edit</th>
       </thead>
       <tbody>
         @foreach($categories as $category)
           <tr>
             <td>{{ $category->name }}</td>
             <td>
                <button class="btn btn-danger btn-sm" onclick="handelDelete({{ $category->id }})">Delete</button>
              </td>
             <td> <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm">Edit</a></td>
           </tr>
         @endforeach
       </tbody>
    </table>
     
  </div>
</div>
@section('scripts')
<script>
 function handelDelete(id) {
   var form = document.getElementById('formDelete')
   form.action = '/categories/' + id
  $('#deleteModal').modal('show')
}
</script>
@endsection








<!-- Modal -->
<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ route('categories.store') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Create a category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add a category</button>
      </div>
    </div>
    </form>
  </div>
</div>


{{--  Delete modal   --}}
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <form action="" method="POST" id="formDelete">
    @csrf
    @method('DELETE')
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <div class="modal-body">
      <div class="container">
        <strong class="text-center text-bold">
       Are you sure you want to delete this category ?

        </strong>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">No , Go back</button>
      <button type="submit" class="btn btn-danger">Yes Delete</button>
    </div>
  </div>
  </form>
  </div>
</div>
{{--  Delete modal   --}}
@stop
@extends('admin.layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-10">
<div class="card">
  <div class="card-header lead">Rooms Categories
	<a style="float:right" href="{{ route("admin-roomsCategoryAdd") }}">Add</a>
  </div>
  <div class="card-body table-responsible">
	<table class="table table-hover">
		<thead>
			<th>Type</th>
			<th>Created At</th>
			<th>Action</th>
		</thead>
		<tbody>
      @foreach($row as $obj)
          <tr>
          	<td><p>{{ $obj->type }}</p></td>
          	<td><p>{{ $obj->created_at }}</p></td>
          	<td><button class="btn btn-primary">
          		<a style="color:white; text-decoration: none" href="{{ route("admin-roomsCategoryEdit", ['id' => $obj->id]) }}">
							View | Edit</a>
          	</button>
          	<button class="btn btn-danger">
          		<a style="color:white; text-decoration: none" href="{{ route("admin-roomsCategoryDelete", 
          																													['id' => $obj->id]) }}">
							Delete</a>
          	</button></td>
          </tr>
      @endforeach
    </tbody>
  </table>
  </div>
</div>
</div>
</div>
</div>
@endsection

@extends('admin.layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-10">
<div class="card">
  <div class="card-header lead">Rooms
	<a style="float:right" href="{{ route("admin-roomsAdd") }}">Add</a>
  </div>
  <div class="card-body table-responsible">
	<table class="table table-hover">
		<thead>
			<th>Number</th>
      <th>Type</th>
      <th>Places</th>
			<th>Booked</th>
			<th>Action</th>
		</thead>
		<tbody>
      @foreach($row as $obj)
          <tr>
          	<td><p>{{ $obj->num }}</p></td>
            <td><p>{{ $obj->category->type }}</p></td>
            <td><p>{{ $obj->places }}</p></td>
          	<td><p>{{ $obj->booked }}</p></td>
          	<td><button class="btn btn-primary">
          		<a style="color:white; text-decoration: none" href="{{ route("admin-roomsEdit", ['id' => $obj->id]) }}">
							View | Edit</a>
          	</button>
          	<button class="btn btn-danger">
          		<a style="color:white; text-decoration: none" href="{{ route("admin-roomsDelete", 
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

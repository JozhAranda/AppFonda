@extends('layouts.master')

@section('content')

	<h1>foods</h1>

	<hr>

	<div class="form-group">
		{{ link_to_route('users.create', 'Create User', null, ['class' => 'btn btn-success']) }}
	</div>

	<table class="table table-bordered table-stripped">
		<thead>
			<tr>
				<th>Photo</th>
				<th>Id</th>
				<th>Name</th>
				<th>Description</th>
				<th></th>

			</tr>
		</thead>

		<tbody>
			@foreach ($foods as $food)
			<tr>
				<td> <img src="{{asset('assets/images/Jellyfish.jpg')}}" /></td>
				<td>{{ $food->id }}</td>
				<td>{{ $food->name }}</td>
				<td>{{ $food->description }}</td>

				<td>
					{{-- link_to_route('users.edit', 'Edit', $user->id, array('class' => 'btn btn-primary btn-sm pull-left')) --}}
					{{-- Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) --}}
						{{-- Form::submit('Delete', array('class' => 'btn btn-danger btn-sm')) --}}
					{{-- Form::close() --}}
				</td>
			</tr>
			@endforeach
		</tbody>

	</table>

	{{ $foods->links() }}

@stop
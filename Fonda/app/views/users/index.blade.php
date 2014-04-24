@extends('layouts.master')

@section('content')

 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1>Users</h1>

	
	<div class="form-group">
		{{ link_to_route('users.create', 'Create user', null, ['class' => 'btn btn-success']) }}
	</div>
	@if(Session::has('notice'))
		<p class="bg-primary" style="padding:15px"> {{ Session::get('notice') }} </p>
	@endif
	<div class="row placeholders">
		@foreach ($users as $user)

	      <div class="col-xs-6 col-sm-2 placeholder">
	      	<span>
	        	{{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
					<button type="button" class="close" aria-hidden="true">&times;</button>
				{{ Form::close() }}
			</span>
	        <img src="assets/images/foods/Jellyfish.jpg" class="img-responsive" alt="Generic placeholder thumbnail">
	        <h4>{{$user->name}}</h4>
	        <span class="text-muted">{{ $user->description }}</span>
	        
	      </div>
	    @endforeach
    </div>	
	{{-- link_to_route('users.edit', 'Edit', $user->id, array('class' => 'btn btn-primary btn-sm pull-left')) --}}
	{{-- Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) --}}
		{{-- Form::submit('Delete', array('class' => 'btn btn-danger btn-sm')) --}}
	{{-- Form::close() --}}
	{{-- $users->links() --}}
</div>
@stop
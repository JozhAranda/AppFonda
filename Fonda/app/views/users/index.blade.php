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

	      <div class="col-xs-6 col-sm-2 placeholder" id="content-users">
	      	<span>
	        	{{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
					<button type="submit" name="Delete" class="close" id="delete_user" aria-hidden="true">&times;</button>
				{{ Form::close() }}
			</span>
	        <img src="{{ asset('images/user.png') }}" alt="user" width="120px">
	        <h4>{{$user->name}}</h4>
	        <span class="text-muted">{{ $user->description }}
	        	{{ link_to_route('users.edit', '', $user->id, array('class' => 'glyphicon glyphicon-edit')) }}
	        </span>
	        
	      </div>
	    @endforeach
    </div>	
</div>
@stop
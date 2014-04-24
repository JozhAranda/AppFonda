@extends('layouts.master')

@section('content')

 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1>Foods</h1>

	
	<div class="form-group">
		{{ link_to_route('foods.create', 'Create Food', null, ['class' => 'btn btn-success']) }}
	</div>
	@if(Session::has('notice'))
		<p class="bg-primary" style="padding:15px"> {{ Session::get('notice') }} </p>
	@endif
	<div class="row placeholders">
		@foreach ($foods as $food)

	      <div class="col-xs-6 col-sm-2 placeholder">
	      	<span>
	        	{{ Form::open(array('method' => 'DELETE', 'route' => array('foods.destroy', $food->id))) }}
					<button type="button" class="close" aria-hidden="true">&times;</button>
				{{ Form::close() }}
			</span>
	        <img src="assets/images/foods/Jellyfish.jpg" class="img-responsive" alt="Generic placeholder thumbnail">
	        <h4>{{$food->name}}</h4>
	        <span class="text-muted">{{ $food->description }}</span>
	        
	      </div>
	    @endforeach
    </div>	
	{{-- link_to_route('users.edit', 'Edit', $user->id, array('class' => 'btn btn-primary btn-sm pull-left')) --}}
	{{-- Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) --}}
		{{-- Form::submit('Delete', array('class' => 'btn btn-danger btn-sm')) --}}
	{{-- Form::close() --}}
	{{ $foods->links() }}
</div>
@stop
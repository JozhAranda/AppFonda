@extends('layouts.master')

@section('content')

 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<h1>Foods</h1>

	@if($auth)
	<div class="form-group">
		{{ link_to_route('foods.create', 'Create Food', null, ['class' => 'btn btn-success']) }}
	</div>
	@endif
	@if(Session::has('notice'))
		<p class="bg-primary" style="padding:15px"> {{ Session::get('notice') }} </p>
	@endif
	<div class="row placeholders">
		@foreach ($foods as $food)

	      <div class="col-xs-5 col-sm-2" style="margin:10px" id="content-foods">
	      	@if($auth)
	      	<span>
	        	{{ Form::open(array('method' => 'DELETE', 'route' => array('foods.destroy', $food->id))) }}
					<button type="button" id="btn-remove-food" class="close" aria-hidden="true">&times;</button>
				{{ Form::close() }}
			</span>
			@endif
			@if(!is_null($food->photo))
				<img src="{{ asset('images/foods/Jellyfish.jpg') }}" width="120" alt="" />
			@else
				<img src="{{ asset('images/no_photos.jpg') }}" width="120" alt="" />
			@endif
			
	        <h4>{{$food->name}}</h4>
	        <span class="text-muted">{{ $food->description }}
	        	@if($auth)
	        	{{ link_to_route('foods.edit', '', $food->id, array('class' => 'glyphicon glyphicon-edit')) }}
	        	@endif
	        </span>
	        
	      </div>
	    @endforeach
    </div>	
	

	{{ $foods->links() }}
</div>
@stop
<div class="form-group">
	{{ Form::label('name', 'Name') }}
	{{ Form::text('name', null, array('class'=>'form-control')) }}
</div>

<div class="form-group">
	{{ Form::label('description', 'Description') }}
	{{ Form::textarea('description', null, array('class'=> 'form-control')) }}
</div>

<div class="form-group">
	{{ Form::submit('Save', array('class' => 'btn btn-success')) }} 
	<a href="{{URL::previous()}}" class="btn btn-danger">Cancel</a>
</div>
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
		{{ link_to('foods','Cancel', array('class'=>'btn btn-danger'))}}
</div>
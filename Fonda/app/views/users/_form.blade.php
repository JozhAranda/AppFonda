<div class="form-group">
	{{ Form::label('name', 'First Name') }}
	{{ Form::text('name', null, array('class'=>'form-control')) }}
</div>

<div class="form-group">
	{{ Form::label('last_name', 'Last Name') }}
	{{ Form::text('last_name', null, array('class'=>'form-control')) }}
</div>

<div class="form-group">
	{{ Form::label('username', 'Username') }}
	{{ Form::text('username', null, array('class'=>'form-control')) }}
</div>

<div class="form-group">
	{{ Form::label('password', 'Password') }}
	{{ Form::password('password', array('class'=>'form-control')) }}
</div>

<div class="form-group">
	{{ Form::label('type_user', 'Type user') }}
	{{ Form::select('type_user', array('class'=>'form-control')) }}
</div>

<div class="form-group">
	{{ Form::submit('Save', array('class' => 'btn-success')) }}
</div>
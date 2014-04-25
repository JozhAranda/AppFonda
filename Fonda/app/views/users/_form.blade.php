<div class="form-group">
	{{ Form::label('name', 'First Name') }}
	{{ Form::text('name', null, array('class'=>'form-control', 'pattern' => '([a-zA-ZáéíóúñÁÉÍÓÚÑ]{2,40}\s*)+$', 'title' => 'Only allow letter', 'required' => 'required')) }}
</div>

<div class="form-group">
	{{ Form::label('last_name', 'Last Name') }}
	{{ Form::text('last_name', null, array('class'=>'form-control', 'pattern' => '([a-zA-ZáéíóúñÁÉÍÓÚÑ]{2,40}\s*)+$', 'title' => 'Only allow letter', 'required' => 'required')) }}
</div>

<div class="form-group">
	{{ Form::label('username', 'Username') }}
	{{ Form::text('username', null, array('class'=>'form-control', 'pattern' => '[a-zA-Z0-9]+', 'title' => 'Only allow letter and numbers', 'required' => 'required')) }}
</div>

@if(!$user->exists)
<div class="form-group">
	{{ Form::label('password', 'Password') }}
	{{ Form::password('password', array('class'=>'form-control', 'required' => 'required')) }}
</div>
@endif

<div class="form-group">
	{{ Form::label('type_user', 'Type user') }}
	{{ Form::select('type_user', array('1' => 'User', '2' => 'Admin'), '1', array('class'=>'form-control')) }}
</div>

<div class="form-group">
	{{ Form::submit('Save', array('class' => 'btn btn-success')) }}
</div>
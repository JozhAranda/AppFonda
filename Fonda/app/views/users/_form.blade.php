<div class="form-group">
	{{ Form::label('name', 'First Name') }}
	{{ Form::text('name', null, array('class'=>'form-control', 'pattern' => '([a-zA-ZáéíóúñÁÉÍÓÚÑ]{2,40}\s*)+$', 'title' => 'Only allow letter')) }}
</div>

<div class="form-group">
	{{ Form::label('last_name', 'Last Name') }}
	{{ Form::text('last_name', null, array('class'=>'form-control', 'pattern' => '([a-zA-ZáéíóúñÁÉÍÓÚÑ]{2,40}\s*)+$', 'title' => 'Only allow letter')) }}
</div>

<div class="form-group">
	{{ Form::label('username', 'Username') }}
	{{ Form::text('username', null, array('class'=>'form-control', 'pattern' => '[a-zA-Z0-9]+', 'title' => 'Only allow letter and numbers')) }}
</div>

@if(!$user->exists)
<div class="form-group">
	{{ Form::label('password', 'Password') }}
	{{ Form::password('password', array('class'=>'form-control')) }}
</div>
@else
	{{ Form::label('new_password', 'New password') }}
	{{ Form::password('new_password', array('class'=>'form-control')) }}
@endif

<div class="form-group">
	{{ Form::label('type_user', 'Type user') }}
	{{ Form::select('type_user', $type_user, $type_id, array('class'=>'form-control')) }}
</div>
<!--, 'required' => 'required'-->
<div class="form-group">
	{{ Form::submit('Save', array('class' => 'btn btn-success')) }}
	<a href="{{URL::previous()}}" class="btn btn-danger">Cancel</a>
</div>
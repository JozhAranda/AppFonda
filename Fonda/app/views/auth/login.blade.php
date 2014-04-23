<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        {{ stylesheet_link_tag() }}
    </head>
    <body>
        @if(isset($error))
           <p> <strong> {{ $error }} </strong> </p>
        @endif
        <div class="container">
            {{ Form::open(array('url' => 'auth/login', 'class' => 'form-signin')) }} 
                <h2 class="form-signin-heading">Sign in</h2>
               {{ Form::label('username', 'User name') }}

               {{ Form::text('username', '', array('class'=>'form-control')) }}

               {{ Form::label('password', 'Contraseña') }}

               {{ Form::password('password', array('class'=>'form-control')) }}

               {{ Form::submit('Sign', array('class'=>'btn btn-lg btn-primary btn-block')) }} 
            {{ Form::close() }}
	    </div>	
        {{ javascript_include_tag() }}
    </body>
</html>
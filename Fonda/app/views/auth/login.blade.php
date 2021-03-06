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
          @if(Session::has('notice'))
            <p class="bg-danger" style="padding:15px"> {{ Session::get('notice') }} </p>
          @endif
            {{ Form::open(array('url' => 'auth/login', 'class' => 'form-signin', 'id' => 'login')) }} 
                <h2 class="form-signin-heading">Sign in</h2>
               {{ Form::label('username', 'Username') }}

               {{ Form::text('username', '', array('class'=>'form-control')) }}

               {{ Form::label('password', 'Password') }}

               {{ Form::password('password', array('class'=>'form-control')) }}

               {{ Form::submit('Sign', array('class'=>'btn btn-lg btn-primary btn-block')) }} 
            {{ Form::close() }}
	    </div>	
        {{ javascript_include_tag() }}
    </body>
</html>
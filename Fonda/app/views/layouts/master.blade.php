<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Fonda">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fonda</title>
        	{{ stylesheet_link_tag() }}
        <link rel="author" href="humans.txt">
    </head>
    <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">App Fonda</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"> {{ Session::get('name-user')}}</a></li>
            <li>{{ link_to('/auth/logout', 'Logout')}}</li>
            <!--<img src="{{ asset('images/foods/Jellyfish.jpg') }}" alt="">-->
          </ul>
          <!--form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form-->
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li> {{ link_to('/', 'Home') }}</li>
            <li> {{ link_to_route('foods.index', 'Foods', null) }}</li>
            <li> {{ link_to_route('users.index', 'Users', null) }} </li>
            <li> {{ link_to_route('orders.index', 'Orders', null) }}</li>
          </ul>
        </div>
        @yield('content')
      </div>
    </div>
    {{ javascript_include_tag() }}
    </body>
</html>
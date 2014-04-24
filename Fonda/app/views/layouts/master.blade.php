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
      
        @yield('content')
        {{ javascript_include_tag() }}
          <p></p>
    </body>

</html>
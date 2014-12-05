<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Archivism</title>

	{{ HTML::style('css/normalize.css') }}
	{{ HTML::style('css/base.css') }}
	{{ HTML::style('css/style.css') }}

	{{ HTML::script('https://code.jquery.com/jquery-1.11.1.min.js') }}
	{{ HTML::script('js/main.js') }}

</head>
<body>
	<div id="fullscreen-container">
		@yield('content')
	</div>
</body>
</html>

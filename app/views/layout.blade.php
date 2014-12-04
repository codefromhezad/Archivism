<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Archivism</title>

	{{ HTML::style('css/normalize.css') }}
	{{ HTML::style('css/base.css') }}
	{{ HTML::style('css/style.css') }}

</head>
<body>
	<div id="main-container">
		@yield('content')
	</div>

	<script>
		@yield('script')
	</script>
</body>
</html>

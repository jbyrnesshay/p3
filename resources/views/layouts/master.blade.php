<!DOCTYPE html>
<html
	<head>
		<title>
			@yield('title')
		</title>
		<meta charset="utf-8">
	</head>

	<body>
	<header>
	</header>
	<nav>
	</nav>
	<section>
	@yield ('content')
	</section>

	<footer>
	@copy; {{ date('Y')}}
	</footer>
	</body>
</html>


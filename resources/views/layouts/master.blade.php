<!DOCTYPE html>
<html
	<head>
    <title>
        {{-- Yield the title if it exist, otherwise default to 'Developers Best Friend'--}}
        @yield('title', 'Developers Best Friend')
    </title>

    <meta charset='utf-8'>
    <link href="/css/styles.css" type='text/css' rel='stylesheet'>

    {{-- Yield any page specific CSS files or anything else you might want in the head --}}
    @yield('head')

</head>

	<body>

	<header>
	</header>
	<nav>
	<ul>
	<li>
	<a href="{{route('welcome') }}">home</a> </li>
	<li></li>
	</ul>

	</nav>
	 
	<section>
	@yield ('content')
	</section>
	
	<footer>
	<p>&copy; {{ date('Y')}}</p>
	<p> contact</p>
	</footer>
	</body>
</html>


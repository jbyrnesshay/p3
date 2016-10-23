<!DOCTYPE html>
<html>
<head>
    <title>
        {{-- Yield the title if it exist, otherwise default to 'Foobooks'--}}
        @yield('title', 'Foobooks')
    </title>

    <meta charset='utf-8'>
    <link href="/css/foobooks.css" type='text/css' rel='stylesheet'>

    {{-- Yield any page specific CSS files or anything else you might want in the head --}}
    @yield('head')

</head>
<body>
    <header>
        <img
        src='http://making-the-internet.s3.amazonaws.com/laravel-foobooks-logo@2x.png'
        style='width:300px'
        alt='Foobooks Logo'>
    </header>
    <nav>
        <ul>
        <li><a href="/books"> view all books</a></li>
        <li><a href="/books/create"> create a book </a></li>
    </ul>
    </nav>
    <section>
        {{--Main page content will be yielded here--}}
        @yield('content')

    </section>

    <footer>
        &copy; {{ date('Y') }}
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    {{-- Yield any page specific JS files or anything else you might want at end of body--}}
    @yield('body')
</body>
</html>

 @extends('layouts.master')


   
 

 @section('title')
    Show book
 @endsection

 {{--
This 'head' section will be yielded right before the closing </head> tag
Use it to add specific things that *this* View needs in the <head>
such as a page specific stylesheets.
--}}
@section('head')
     
@endsection

@section('content')
       <h1> Lorem Ipsum Generator </h1>
        <article id="left">
        <h2> Here is your Lorem Ipsum text: </h2>
        {!! $contents !!}
        </article>

        <article id="right">
        <h2> Here is your Lorem Ipsul text with Paragraph tags: </h2>
        <textarea>  {!! $contents !!} </textarea>
        </article>
    
@endsection

{{--
This 'body' section will be yielded right before the closing </body> tag
Use it to add specific things that *this* View needs at the end of the <body>
such as a page specific Javascript files.
--}}
@section('body')
    <script src="/js/books/show.js"></script>
@endsection

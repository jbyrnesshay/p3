@extends('layouts.master')

@section('title')
    display
@stop

@section('head')
    <link href="/css/edit.css" type="text/css" rel='stylesheet'>
@stop

@section('content')
    <p> {{  $content }} </p>
@stop


@section('body')
    <script src="/js/edit.js">
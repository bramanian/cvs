@extends('backend.layouts.base')

@section('header')
	@include('backend.layouts.header')
@stop

@section('menu')
	@include('backend.layouts.menu')
@stop

@section('body')
{{$content}}
@stop
@section('footer')
@include('backend.layouts.footer')
@stop
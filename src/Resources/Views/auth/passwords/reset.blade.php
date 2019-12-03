@extends('layouts.default')
@section('meta')
    @include('layouts.functional.meta')
@endsection
@section('head')
    @include('layouts.functional.head')
@endsection
@section('header')
    @include('layouts.section.header')
@endsection
@section('content')
    @include('laraflex::reset')
@endsection
@section('footer')
    @include('layouts.section.footer')
@endsection
@section('scriptjs')
    @include('layouts.functional.scriptjs')
@endsection

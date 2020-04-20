<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no maximum-scale=1, user-scalable=no">
    @yield('meta')
    @php
    $linkRel = $util->toRoute("images/favicon.png");
    @endphp
    <link rel="icon" type="image/png" sizes="16x16" href="{{$linkRel}}">
    @if (!empty($bootstrap))
    {!!$bootstrap->cssMin!!}
    @endif

  @yield('head')

<link href="{{$util->toRoute('css/contentFlex.css')}}" rel="stylesheet">
<style type="text/css">
body{font-size:1em;font-family:sans-serif}
.error{color:red}
a:hover{text-decoration: none}
.arrow{
    color:#BDBDBD;
    font-weightx:bold;
}
  </style>
  <style type="text/css">
@include('layouts.functional.style')

</style>
</head>
<body>
@yield('header')
@yield('content')
@yield('footer')

<!-- JavaScript ------------------------------------- -->
@if (!empty($bootstrap->jQuerySlin)) {!!$bootstrap->jQuerySlin!!}  @endif
@if (!empty($bootstrap->jsBtPopper)) {!!$bootstrap->jsBtPopper!!}  @endif
@if (!empty($bootstrap->jsBtMin)) {!!$bootstrap->jsBtMin!!}  @endif
@yield('scriptjs')
</body>
</html>


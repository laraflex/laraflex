@php
    $bootstrapCss = $defaultConfig['bootstrapcss'];
@endphp
<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google" content="notranslate">
    @yield('meta')
    @php
    $linkRel = $util->toRoute("local/images/icons/coruja.png");
    @endphp
    <link rel="icon" sizes="20x20" href="{{$linkRel}}">
    <link rel="shortcut icon" type="image/png" sizes="20x20" href="coruja.png">
    <!--Configuração Bootstrap arquivo config-->
    <link rel="stylesheet" href= "{!! $bootstrapCss !!}">
    <link href="{{$util->toRoute('css/contentFlex.css')}}" rel="stylesheet">
    @yield('head')
<style type="text/css">
    body{font-size:1em;font-family:arial,sans-serif}
    .error{color:red}
    a:hover{text-decoration: none}
    .arrow{color:#BDBDBD;font-weightx:bold;}

    </style>
    </head>
<body class="bg-white">
@yield('header')
@yield('blog')
@yield('content')
@yield('footer')

@php
    $pooperJs = $defaultConfig['pooperjs'];
    $bootstrapJs = $defaultConfig['bootstrapjs'];
@endphp
<!-- JavaScript ------------------------------------- -->
<script src= "{!! $pooperJs !!}"></script>
<script src= "{!! $bootstrapJs !!}"></script>

@yield('scriptjs')
</body>
</html>


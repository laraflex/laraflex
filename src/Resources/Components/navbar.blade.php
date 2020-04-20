@if (!empty($objectHeader))
    @php
        $navBar = $objectHeader;
    @endphp

<div id="Navbar">

@php
    if ($headerColor == 'white'){
        $styleColor = 'white';
        $styleNav = 'navbar-light';
    }elseif($headerColor == 'light'){
        $styleColor = '#F2F2F2';
        $styleNav = 'navbar-light';
    }elseif($headerColor == 'dark'){
        $styleColor = '#1C1C1C';
        $styleNav = 'navbar-dark';
    }elseif($headerColor == strtolower('navyblue')){
        $styleColor = '#0B173B';
        $styleNav = 'navbar-dark';
    }elseif($headerColor == strtolower('bordeaux')){
        $styleColor = '#8A0808';
        $styleNav = 'navbar-dark';
    }elseif($headerColor == 'black'){
        $navBgColor = '#000';
        $styleNav = 'navbar-dark';
        $styleColor = 'black';
    }else{
        $styleColor = 'black';
        $navBgColor = '#000';
        $styleNav = 'navbar-dark';
    }
    if(!empty($objetoConfig->fixedmenu) && $objetoConfig->fixedmenu == true){
        $fixed = "fixed-top";
        if($headerColor == 'white'){
            $styleColor = 'rgba(255, 255, 255, 0.8)';
        }elseif($headerColor == 'navyblue'){
            $styleColor = 'rgba(11,23,59, 0.7)';
        }elseif($headerColor == 'bordeaux'){
            $styleColor = 'rgba(138,8,8, 0.7)';
        }elseif($headerColor == 'light'){
            $styleColor = 'rgba(242,242,242, 0.7)';
        }else{
            $styleColor = 'rgba(0,0,0, 0.6)';
        }
    }else{
        $fixed = "";
    }

@endphp

<nav class="navbar navbar-expand-lg mb-0 {{$styleNav}} {{$fixed}}" style="background-color: {{$styleColor}}; border-bottom: 1px solid #ccc;">
<div class="container-xl">
<!-- Logotipo ----------------------->
@if (!empty($navBar->logo))
@if(!empty($navBar->route))
<a class="navbar-brand " href="{{$util->toRoute($navBar->route)}}">
<img src="{{$util->toImage($navBar->imagePath, $navBar->logo)}}" width="170" height="40" class="d-none d-sm-block">
<img src="{{$util->toImage($navBar->imagePath, $navBar->logo)}}" width="136" height="32" class="d-block d-sm-none">
</a>
@else
<img src="{{$util->toImage($navBar->imagePath, $navBar->logo)}}" width="170" height="40" class="d-none d-sm-block">
<img src="{{$util->toImage($navBar->imagePath, $navBar->logo)}}" width="136" height="32" class="d-block d-sm-none">
@endif

@elseif(!empty($navBar->label))
<a class="navbar-brand" href="#">{{$navBar->label}}</a>
@endif
<!-- fim logotipo ------------------->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="row collapse navbar-collapse" id="navbarSupportedContent">
<!-- Início de itens de menu ------------------>
<div class="col-lg-9">
<ul class="navbar-nav mr-auto pl-2">
@if (!empty($navBar->items))
@php
// ===================================================================================================================
$menuArray = $navBar->items;
$numItems = 0;
foreach ( $menuArray as $K => $item ){
if (empty($item->route)){
throw new Exception("A propriedade ROUTE de item de menu não foi definida em [NavbarViewComposer]");
}
if (empty($item->label)){
throw new Exception("A propriedade LABEL de ítem de menu não foi definida em [NavbarViewComposer]");
}
}
// ===================================================================================================================
@endphp
@foreach ($menuArray as $key => $itemMenu)
<li class="nav-item active">
@if (property_exists($itemMenu, "subItems"))
<li class="nav-item dropdown active">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
{{ __($itemMenu->label) }}
</a>
<div class="dropdown-menu pb-3 shadow-lg" aria-labelledby="navbarDropdownMenuLink" style="min-width:300px;">
@php
// ==========================================================================================================
$submenu = $itemMenu->subItems;
// =========================================================================================================
@endphp
@foreach ( $submenu as $K => $item )
<a class="dropdown-item" href="{{$util->toRoute($itemMenu->route,$item->route)}}">{{ __($item->label) }}</a>
@endforeach
</div>
</li>
@else
<a class="nav-link" href="{{$util->toRoute($itemMenu->route)}}" >{{ __($itemMenu->label) }}</a>
@endif
</li>
@endforeach
@else
<li class="nav-item">
<a class="nav-link" href="#">Home</a>
</li>
@endif
</ul>

</div>

@if(!empty($navBar->showLogin) && $navBar->showLogin === true)
{{--*******************************************************--}}
{{--
<div class="d-none d-lg-block col-lg-3 p-0">
--}}
<div class="col-lg-3 p-0">
<ul class="pr-3 navbar navbar-nav p-0 float-right">
<!-- Authentication Links -->
@guest
<li class="nav-item active">
<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
</li>
{{--Controle de show Register--}}
@if(!empty($navBar->showRegister) && $navBar->showRegister === true)
<li class="nav-item active">
<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
</li>
@endif
{{--Fim de controle de register--}}
@else
<li class="nav-item dropdown active">
<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
{{ Auth::user()->name }} <span class="caret"></span>
</a>
<div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
{{ __('Logout') }}
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>
</div>
</li>
@endguest
</ul>
</div>
{{--*******************************************************--}}
@endif
<!-- Fim de itens de menu ------------------>
</div>

</nav>
</div>
@endif


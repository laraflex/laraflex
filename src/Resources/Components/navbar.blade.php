@if (!empty($objectHeader))
    @php
        $navBar = $objectHeader;
    @endphp
{{--<div id="Navbar">--}}
@php
    if (!empty($navBar->bgColor)){
        $bgColor = strtolower($navBar->bgColor); // Controle sobre valor de propriedade de cor de componente
    }else{
        $bgColor = 'black';
    }
    $navbar_id = "";
    $navbar_item = "";
    $btn_integrated = "";
    if ($bgColor == 'white'){
        $styleColor = 'white';
        $styleRgbColor = 'rgba(255, 255, 255, 0.7)';
        $styleNav = 'navbar-light';
        $border = '1px solid #A4A4A4';
        $item_navbar_id1 = 'item-navbar-default-dark';
        $item_navbar_id2 = 'item-navbar-dark';
        $btn_integrated_tmp = 'btn-integrated-dark';
    }elseif($bgColor == 'light'){
        $styleColor = '#F2F2F2';
        $styleRgbColor = 'rgba(242,242,242, 0.8)';
        $styleNav = 'navbar-light';
        $border = '1px solid #A4A4A4';
        $item_navbar_id1 = 'item-navbar-default-dark';
        $item_navbar_id2 = 'item-navbar-dark';
        $btn_integrated_tmp = 'btn-integrated-dark';
    }elseif($bgColor == 'dark'){
        $styleColor = '#1C1C1C';
        $styleRgbColor = 'rgba(0,0,0,0.4)';
        $styleNav = 'navbar-dark';
        $border = '1px solid #ccc';
        $item_navbar_id1 = 'item-navbar-default-light';
        $item_navbar_id2 = 'item-navbar-white';
        $btn_integrated_tmp = 'btn-integrated-light';
    }elseif($bgColor == 'navyblue'){
        $styleColor = '#0B173B';
        $styleRgbColor = 'rgba(11,23,59, 0.7)';
        $styleNav = 'navbar-dark';
        $border = '1px solid #6E6E6E';
        $item_navbar_id1 = 'item-navbar-default-light';
        $item_navbar_id2 = 'item-navbar-white';
        $btn_integrated_tmp = 'btn-integrated-light';
    }elseif($bgColor == 'bordeaux'){
        $styleColor = '#8A0808';
        $styleRgbColor = 'rgba(138,8,8, 0.7)';
        $styleNav = 'navbar-dark';
        $border = '1px solid #6E6E6E';
        $item_navbar_id1 = 'item-navbar-default-light';
        $item_navbar_id2 = 'item-navbar-white';
        $btn_integrated_tmp = 'btn-integrated-light';
    }elseif($bgColor == 'marine'){
        $styleColor = '#3A727E';
        $styleRgbColor = 'rgba(58,114,126,0.7)';
        $styleNav = 'navbar-dark';
        $border = '1px solid #6E6E6E';
        $item_navbar_id1 = 'item-navbar-default-light';
        $item_navbar_id2 = 'item-navbar-white';
        $btn_integrated_tmp = 'btn-integrated-light';
    }elseif($bgColor == 'brown'){
        $styleColor = '#4C3A26';
        $styleRgbColor = 'rgba(76,58,38, 0.6)';
        $styleNav = 'navbar-dark';
        $border = '1px solid #6E6E6E';
        $item_navbar_id1 = 'item-navbar-default-light';
        $item_navbar_id2 = 'item-navbar-white';
        $btn_integrated_tmp = 'btn-integrated-light';
    }elseif($bgColor == 'lightbrown'){
        $styleColor = '#A59A86';
        $styleRgbColor = 'rgba(165,154,134,0.7)';
        $styleNav = 'navbar-dark';
        $border = '1px solid #6E6E6E';
        $item_navbar_id1 = 'item-navbar-default-light';
        $item_navbar_id2 = 'item-navbar-white';
        $btn_integrated_tmp = 'btn-integrated-light';
    }elseif($bgColor == 'blue'){
        $styleColor = '#354F76';
        $styleRgbColor = 'rgba(53,79,118,0.8)';
        $styleNav = 'navbar-dark';
        $border = '1px solid #6E6E6E';
        $item_navbar_id1 = 'item-navbar-default-light';
        $item_navbar_id2 = 'item-navbar-white';
        $btn_integrated_tmp = 'btn-integrated-light';

    }else{
        $styleColor = 'black';
        $styleRgbColor = 'rgba(0,0,0,0.4)';
        $navBgColor = '#000';
        $styleNav = 'navbar-dark';
        $border = '1px solid #6E6E6E';
        $item_navbar_id1 = 'item-navbar-default-light';
        $item_navbar_id2 = 'item-navbar-white';
        $btn_integrated_tmp = 'btn-integrated-light';
    }
    // Classe para menu fixo
    $fixedNavbarClass = 'bg-navbar-none';
    $predominantColor = $styleColor;
    if(!empty($navBar->fixedmenu) && $navBar->fixedmenu == true){
        $fixed = "fixed-top";
        $styleColor = $styleRgbColor;
        $border = '1px solid rgba(0,0,0,0.2)';
        if ($bgColor == 'white' OR $bgColor == 'light'){
            $fixedNavbarClass = 'bg-navbar-bright';
        }else{
            $fixedNavbarClass = 'bg-navbar-dark';
        }

        //$background_tmp = "background-color: " . $styleColor . ";";
        $background_tmp = "background-color: " . $predominantColor . ";";
    }else{
        $fixed = "";
        if (!empty($navBar->fadeTransparency) && $navBar->fadeTransparency === true){
            $background_tmp = "background-color: " . $styleColor . "; opacity:0.9;";
            $styleColor = $styleRgbColor;
            $navbar_id = 'navbar';
            $navbar_item = 'navbar-item-link';
            $border_bottom = '';
            $btn_integrated = $btn_integrated_tmp;
        }
        elseif (!empty($navBar->transparent) && $navBar->transparent === true){
            $background_tmp = "background-color: " . $styleColor . "; opacity:0.9;";
            $styleColor = "";
            $navbar_id = 'navbar';
            $navbar_item = 'navbar-item-link';
            $border_bottom = '';
            $btn_integrated = $btn_integrated_tmp;
        }
    }
    if ($styleColor != ""){
        $background = "background-color: " . $styleColor . ";";
        //$background = '';
        $border_bottom = 'border-bottom:' . $border . ';';
    }else{
        $background = '';
    }
    /**
     * Define a classe de apresentação de item de menu
    */
    //if (empty($navBar->menuEffect) OR $navBar->menuEffect === true)
    if (empty($navBar->menuEffect) OR $navBar->menuEffect === false)
    {
        $item_navbar_id = $item_navbar_id1;
    }else{
        $item_navbar_id = $item_navbar_id2;
    }
    $cssClass = ''; // definição de container a partir de componente header
    if (!empty($objectConfig->headerClass) && $objectConfig->headerClass == 'container'){
        if ($fixed != 'fixed-top'){
            $cssClass = 'container-xl ';
        }
    }
@endphp
<div id="navbar-default">
<nav id="{{$navbar_id}}" class="{{$cssClass}}navbar navbar-expand-lg m-0x px-0x {{$styleNav}} {{$fixedNavbarClass}} {{$fixed}}" style="{{$border_bottom}} {{$background}}">
<div class="container-xl px-2 px-xl-3 ">
<!-- Logotipo ----------------------->
@if (!empty($navBar->logo))
@php 
if (!empty($navBar->imagePath)){
    $logo = $util->toImage($navBar->imagePath, $navBar->logo);
}else{
    $logo = $util->toImage($navBar->logo);
}
@endphp


@if(!empty($navBar->route))
<a class="navbar-brand " href="{{$util->toRoute($navBar->route)}}">
<img src="{{$logo}}" width="170" height="42">
</a>
@else
<img src="{{$logo}}" width="170" height="42">
@endif
@elseif(!empty($navBar->label))
<a class="navbar-brand" href="#">{{$navBar->label}}</a>
@endif
<!-- fim logotipo ------------------->
<button id="navbar-btn" class="navbar-toggler {{$btn_integrated}}" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarDefault">
<!-- Início de itens de menu ------------------>
<ul id="navbar-nav-items" class="navbar-nav mr-auto pl-0">
@if (!empty($navBar->items))
@php
// ===================================================================================================================
$menuArray = $navBar->items;
// ===================================================================================================================
@endphp
    @foreach ($menuArray as $key => $itemMenu)
    <li class="nav-item active">
        @if (property_exists($itemMenu, "subItems"))

        <li class="nav-item dropdown active">
        <a id ="{{$item_navbar_id}}" class="nav-link dropdown-toggle px-2 {{$navbar_item}}" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ __($itemMenu->label) }}
        </a>
        <div class="dropdown-menu pb-3 shadow-lg px-2 py-3" aria-labelledby="navbarDropdownMenuLink" style="width:300px;">
            @php
            // ==========================================================================================================
            $submenu = $itemMenu->subItems;
            // =========================================================================================================
            @endphp
            @foreach ( $submenu as $k => $item )
            @php
            $numItems = count($submenu);
            $border_item = 'border-top: 1px solid #D8D8D8;';
            if ($k == $numItems - 1){
                $border_item = 'border-top: 1px solid #D8D8D8; border-bottom: 1px solid #D8D8D8;';
            }

            @endphp
            <a class="dropdown-item pl-3" href="{{$util->toRoute($itemMenu->route,$item->route)}}" style="{{$border_item}}">
            {{ __($item->label) }}
            </a>
            @endforeach
        </div>
        </li>


        @else
        <a id="{{$item_navbar_id}}" class="nav-link {{$navbar_item}}" href="{{$util->toRoute($itemMenu->route)}}">
        {{ __($itemMenu->label) }}
        </a>
        @endif
    </li>
    @php
        if ($key == 5){
            break;
        }
    @endphp
    @endforeach
@else
<li class="nav-item">
<a class="nav-link" href="#">Home</a>
</li>
@endif
</ul>
@if(!empty($navBar->showLogin) && $navBar->showLogin === true)
{{--*******************************************************--}}
<ul class="pr-3x navbar-nav p-0 float-right">
<!-- Authentication Links -->
@guest
<li class="nav-item active">
<a id="{{$item_navbar_id}}" class="nav-link px-2 {{$navbar_item}}" href="{{ route('login') }}">{{ __('Login') }}</a>
</li>
{{--Controle de show Register--}}
@if(!empty($navBar->showRegister) && $navBar->showRegister === true)
<li class="nav-item active">
<a id="{{$item_navbar_id}}" class="nav-link px-2 {{$navbar_item}}" href="{{ route('register') }}">{{ __('Register') }}</a>
</li>
@endif
{{--Fim de controle de register--}}
@else
<li class="nav-item dropdown active" >
<a id="{{$item_navbar_id}}" class="nav-link dropdown-toggle px-2 {{$navbar_item}}" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
{{--*******************************************************--}}
@endif
<!-- Fim de itens de menu ------------------>

</div>
</nav>

@if(!empty($navBar->fixedmenu) && $navBar->fixedmenu === true)

    @if (!empty($navBar->transparent) && $navBar->transparent === true)
    <div class="navbar-plus d-block d-sm-none" style="height:68px; {{$background_tmp}}">
    </div>
    @else
    <div class="navbar-plus" style="height:68px; {{$background_tmp}}">
    </div>
    @endif

@else
    @if (!empty($navBar->transparent) && $navBar->transparent === true)
    <div class="d-block d-sm-none" style="height:68px; {{$background_tmp}}">
    </div>
    @elseif (!empty($navBar->fadeTransparency) && $navBar->fadeTransparency === true)
    <div class="d-block d-sm-none" style="height:68px; {{$background_tmp}}">
    </div>
    @endif

@endif
</div>
@endif

{{--

    --}}

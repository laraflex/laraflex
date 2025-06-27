{{-- COMPONENT NAVBAR v:2025 =================================================== --}}

@if (!empty($objectHeader) && !empty($objectHeader->items))

@php
    $navBar = $objectHeader;
    if (!empty($navBar->container) && $navBar->container == true){
         $container = 'container-fluid';
    }else{
        $container = 'container-fluid';
    }
    if (!empty($navBar->logoStorage)){
        $logo = $navBar->logoStorage;
    }
    elseif (!empty($navBar->logoPath)){
        $logo = $util->toImage($navBar->logoPath);
    }
    elseif(!empty($navBar->logo)){
        $logo = $util->toImage($navBar->logo);
    }else{
        $logo = '';
    }
    /*
    * Bloco de configuração de temas - Theme configuration block
    */
    if (!empty($navBar->theme)) {
        $theme = $navBar->theme;
    }else{
        $theme = '';
    }
    if (!empty($navBar->transparent) && $navBar->transparent == true) {
        $transparent = true;
        $transparentClass = 'position-absolute top-0 start-0 w-100';
    }else {
        $transparent = false;
        $transparentClass = '';
    }
    if (!empty($navbar->altLogo)){
        $alt = $navbar->altLogo;
    }else {
        $alt = '';
    }

    /*
    * THEMAS DISPONÍVEIS ========================================
    */
    if ($theme == 'dark') {
        if ($transparent == true) {
            $bgColor = 'background-color:rgb(0,0,0,0.5);';
            $font_color = 'color: #FFFFFF;';
        }else {
            $bgColor = 'background-color:#161718;';
            $font_color = 'color: #b8babb;'; //#e9ebef;';
        }
        $bgIcon = 'background-color:rgba(255,255,255, 0.5);';
        $mobileColor = 'background-color:#161718;';
        $itemNavbarColor = 'navbar-dark-color rounded';
        $borderNav = 'border-bottom:1px solid #666666;';
        $bgBtnSearchColor = '"";';
        //$btnColor = 'background-color: #181818;';
        $btnColor = 'background-color: #262727;';
        $bgColorSearch = 'background-color:rgb(255,255,255, 0.1);';

    }elseif($theme == 'light') {
        if ($transparent == true) {
            $bgColor = 'background-color:rgba(238,238,228, 0.8);';
            $font_color = 'color: #000000;';
            $itemNavbarColor = 'navbar-white-color rounded';
            $btnBorder = 'border-secondary';
            $bgBtnSearchColor = '';
        }else{
            $bgColor = 'background-color: #edeeef;'; //#dfe6e9
            $font_color = 'color: #050512;';
             $itemNavbarColor = 'navbar-white-color rounded';
             $bgBtnSearchColor = 'background-color: rgba(232, 240, 243, 0.3);';
        }
        $bgIcon = '';
        $mobileColor = 'background-color:#FFFFFF;';
        $borderNav = 'border-bottom:1px solid #cccccc;';
        $btnColor = 'background-color: #181818;';
        $bgColorSearch = 'background-color:rgb(255,255,255, 0.3);';

    }elseif($theme == 'white') {
        if ($transparent == true) {
            $bgColor = 'background-color:rgba(255,255,255, 0.8);';
            $font_color = 'color: #000000;';
            $bgBtnSearchColor =  'background-color: rgba(232, 240, 243, 0.3);';
            $itemNavbarColor = 'navbar-white-color rounded';
        }else{
            $bgColor = 'background-color:#FFFFFF;';
            $font_color = 'color: #050512;';
            $bgBtnSearchColor =  'background-color: rgba(232, 240, 243, 0.3);';
            $itemNavbarColor = 'navbar-white-color rounded;';
        }
        $bgIcon = '';
        $mobileColor = 'background-color:#FFFFFF;';
        $borderNav = 'border-bottom:1px solid #cccccc;';
        $btnColor = 'background-color: #313131;';
        $bgColorSearch = 'background-color:rgb(255,255,255, 0.3);';

    }elseif($theme == 'nave') {
        if ($transparent == true) {
            $bgColor = 'background-color: rgb(6, 51, 100, 0.6);';
            $font_color = 'color: #FFFFFF;';
        }else {
            $bgColor = 'background-color:#0d1e68;';
            $font_color = 'color: #cccccc;';
        }
        $bgIcon = 'background-color:rgb(255,255,255, 0.5);';
        $mobileColor = 'background-color:#0d1e68;';
        $itemNavbarColor = 'navbar-nave-color rounded';
        $borderNav = 'border-bottom:1px solid #666666;';
        $bgBtnSearchColor = '';
        $btnColor = '';
        $bgColorSearch = 'background-color:rgb(255,255,255, 0.1);';
    }else {
        $bgIcon = '';
        $bgColor = 'background-color:#FFFFFF;';
        $font_color = 'color: #050512;';
        $itemNavbarColor = 'navbar-light-color;';
        $borderNav = 'border-bottom:1px solid #cccccc;';
        $mobileColor = 'background-color:#FFFFFF;';
        $bgBtnSearchColor =  'background-color: rgba(232, 240, 243, 0.3);';
        $btnColor = 'background-color: #666666;';
        $bgColorSearch = 'background-color:rgb(255,255,255, 0.3);';
    }
    $subMenuColor = 'background-color: rgb(255,255,255, 0.9);';
    $fontBtn = 'font-size:calc(0.6em + 0.8vw);';
@endphp
{{--fim do bloco de configuração de temas--}}

<nav class="navbar navbar-dark navbar-expand-lg p-0 {{$transparentClass}}" style="z-index:10">
<div class="{{$container}} pbx-2 ptx-1 ptx-lg-0 pbx-lg-0 py-2" style="z-index:15;{{$bgColor}}{{$borderNav}}">
    @if ($logo != '')
    <a href="{{$util->toRoute('home')}}">
        <img src="{{$logo}}" alt="{{$alt}}" width="170" height="44" class="my-1">
    </a>
    @endif
    <button id="navbar-toggler" class="navbar-toggler" style="{{$bgIcon}} {{$fontBtn}} {{$font_color}}{{$btnColor}}" type="button" data-bs-toggle="collapse" data-bs-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

<div class="collapse navbar-collapse px-3 rounded" id="mainmenu" ">

{{--ITEMS COMPONENT NAVBAR =====================================--}}
<ul class="navbar-nav me-auto mb-2 mb-lg-0" >

@include('laraflex::ComponentParts.navbar.menuitems')


</ul>
{{-- ==========================[]===============================--}}
{{--FORM SEARCH COMPONENT ======================================--}}

@if (!empty($navBar->showSearch) && $navBar->showSearch == true)

@include('laraflex::ComponentParts.navbar.searchform')

@endif
{{-- ============================================================ --}}

@if(!empty($navBar->showLogin) && $navBar->showLogin === true)
{{-- COMPONENTE DE LOGIN E REGISTRO ========================--}}

@include('laraflex::ComponentParts.navbar.accesscontrol')

@endif
</div>
</div>
</nav>
{{----}}
@if (!empty($navBar->transparent) && $navBar->transparent == true)
<div class="container-fluid d-block d-sm-none" style="height: 70px;{{$mobileColor}}"></div>
@endif
{{--Fim do bloco de navbar - End of navbar block --}}
@endif

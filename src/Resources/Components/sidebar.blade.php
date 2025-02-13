@if (!empty($objectHeader))
    @php
        $sidebar = $objectHeader;
    @endphp
@endif
@if (!empty($sidebar))
    @php
    if (!empty($sidebar->fontFamily->title)){
        $font_family_title = 'font-family:'.$sidebar->fontFamily->title .';';
    }else{
        $font_family_title = '';
    }
    if (!empty($sidebar->fontFamily->shared)){
        $font_family = 'font-family:'.$sidebar->fontFamily->shared .';';
    }else{
        $font_family = '';
    }
    if (!empty($sidebar->styleButton) && $sidebar->styleButton == 'dark'){
        $show_style = 'show-sidebar-dark';
    }else{
        $show_style = 'show-sidebar-light';
    }
    if (!empty($sidebar->bgColor)){
        $background = 'background-color:' . $sidebar->bgColor . ';';
    }else{
        $background = 'background-color: #000000;';
    }

    $arrayIcon = ['address-card', 'archive', 'building', 'clipboard-list', 'copy', 'donate', 'fax',  'file-image', 'id-card',
    'weight', 'volleyball-ball', 'users-cog', 'truck-loading', 'store', 'pallet', 'basketball-ball',  'film', 'file-archive',
     'baseball-ball', 'cogs'];
    @endphp

<div id="sidebar">
    @if (!empty($objectConfig->headerClass) && $objectConfig->headerClass == 'container')
        @php
        $btnStyle = 'btn-outline-dark';
        $show_style = 'show-sidebar-dark-out';
        @endphp
    @elseif (!empty($sidebar->showBar) && $sidebar->showBar === true)
        <div class="w-100 text-center py-2 mb-0 border-bottom" style="min-height:65px;{{$background}}">
        @php
        if (!empty($sidebar->logoStorage)){
            $logo = $sidebar->logoStorage;
        }
        elseif (!empty($sidebar->logoPath)){
            $logo = $util->toImage($sidebar->logoPath);
        }
        elseif (!empty($sidebar->logo)){
            $logo = $util->toImage($sidebar->logo);
        }
        @endphp
        @if (!empty($logo))
        @if (!empty($sidebar->route))
        <a href="{{$util->toRoute($sidebar->route)}}">
        @else
        <a href="{{$util->toRoute('home')}}">
        @endif
        <img src="{{$logo}}" class="mt-1 mt-md-0 mb-0 mb-md-1" style="width:calc(160px + 3.5vw); height:calc(35px + 0.7vw); "/>
        </a>
        @endif
        </div>
        @php
            $btnStyle = '';
        @endphp
    @else
        @php
        if (!empty($sidebar->styleButton) && $sidebar->styleButton == 'dark'){
            $btnStyle = 'btn-outline-secondary';
            $show_style = 'show-sidebar-dark-out';
        }else{
            $btnStyle = 'btn-outline-light';
            $show_style = 'show-sidebar-light-out';
        }
        @endphp
    @endif

@if (!empty($sidebar->showSidebar) && $sidebar->showSidebar === true)
<div class="page-wrapper chiller-theme toggledx">
    {{--BUTTON COMPONENT SIDEBAR ===================================--}}
    @include('laraflex::ComponentParts.sidebar.button')

<nav id="sidebar" class="sidebar-wrapper border-right">
    <div class="sidebar-content" >
    {{--HEADE COMPONENT SIDEBAR ===================================--}}
    @include('laraflex::ComponentParts.sidebar.heade')

    {{--PERFIL COMPONENT SIDEBAR ===================================--}}
    @include('laraflex::ComponentParts.sidebar.perfil')

    @if (!empty($sidebar->search) && $sidebar->search === true)
    @php
        if (!empty($sidebar->action)){
            $action = $sidebar->action;
        }else{
            $action = 'search';
        }
    @endphp
    {{--SEARCH COMPONENT SIDEBAR ===================================--}}
    @include('laraflex::ComponentParts.sidebar.search')
    @endif


        {{--Bloco de Menu --}}
    <div class="sidebar-menu" >
    {{--Bloco de seção de menu --------------------------------------------------------------}}
    @if (!empty($sidebar->sections))

    {{--SECTIONS COMPONENT SIDEBAR ===================================--}}
    @include('laraflex::ComponentParts.sidebar.sections')

    @elseif (!empty($sidebar->items))

    {{--ITEMS COMPONENT SIDEBAR ===================================--}}
    @include('laraflex::ComponentParts.sidebar.items')

    @endif
    {{--Fim do bloco de Itens de menu ----------------------------------------------------------------------}}
    </div>
</nav>
</div>
@else
    @guest
    @if (!empty($sidebar->hiddenConect) && $sidebar->hiddenConect === true)
    <a id="show-sidebar" class="dropdown btn {{$show_style}} {{$btnStyle}}" id="dropdownLogin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-pressed="true">
        <div class="d-none d-md-block ml-2 mr-2">
        <span class="mr-2" translate="no">{{ __('connect') }}</span>
        <i class="fas fa-bars"></i>
        </div>
        <div class="d-block d-md-none">
            <i class="fas fa-bars"></i>
        </div>
    </a>
    @else
    <div class="dropdown-menu sidebar-menu shadow" aria-labelledby="dropdownLogin" style="width: 250px;background-color:#F2F2F2;">
        <a class="dropdown-item pl-3" href="{{ route('login') }}">
        <i class="fas fa-user-lock border rounded p-2" style="font-size:12px; background-color:#CCCCCC;"></i>
        <span class="ml-2" translate="no">{{ __('Login') }}</span>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item pl-3" href="{{ route('register') }}">
        <i class="fas fa-address-card border rounded p-2" style="font-size:12px; background-color:#CCCCCC;"></i>
        <span class="ml-2" translate="no">{{ __('Register') }}</span>
        </a>
    </div>
    @endif
    @endguest
</div>
@endif
@else
    @if (!empty($sidebar->nullable) && $sidebar->nullable === true)
        <div class="text-center mt-2 mb-2"></div>
    @else
    {{--messageNull component Blogcardes ==========================================--}}
    <x-laraflex::shared.messagenull />

    @endif
@endif

{{--
Baseado em
Autor: https://codepen.io/azouaoui-med
https://github.com/azouaoui-med/pro-sidebar-template

Icons
https://fontawesome.com/icons?d=gallery&m=free
--}}

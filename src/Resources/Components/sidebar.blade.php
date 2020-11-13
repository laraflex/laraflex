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
        <div class="w-100 text-center py-2 mb-0" style="min-height:65px;border-bottom:1px solid #848484;{{$background}}">
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
    <a id="show-sidebar" class="{{$show_style}} btn btn-md px-xl-3 {{$btnStyle}}" href="#" aria-pressed="true">
        <div class="d-none d-lg-block" translate="no">
        <span class="ml-2 mr-2" translate="no">Main Menu</span>
        <i class="fas fa-bars"></i>
        </div>
        <div class="d-block d-lg-none px-2">
        <i class="fas fa-bars" ></i>
        </div>
    </a>
<nav id="sidebar" class="sidebar-wrapper ">
    <div class="sidebar-content">
        <div class="sidebar-brand" translate="no">
           <a href="#">Main Menu</a>
           <div id="close-sidebar">
           <i class="fas fa-times"></i>
           </div>
        </div>
        {{--Bloco de identificação de usuário --}}
        @if (!empty($sidebar->perfil))
        @guest
        <div class="sidebar-header">
        <div class="user-info text-center">
        <Span class="user-name text-center">{{ __('Expired section' )}}</span>
        </div>
        </div>
        @else
        <div class="sidebar-header">
        <div class="user-pic">
            @php
            if (!empty($sidebar->perfil->photoStorage)){
                $photo = $sidebar->perfil->photoStorage;
            }
            elseif (!empty($sidebar->perfil->photoPath)){
                $photo = $util->toImage($sidebar->perfil->photoPath);
            }
            elseif(!empty($sidebar->perfil->photo)){
                $photo = $util->toImage($sidebar->perfil->photo);
            }else{
                $photo = $util->toImage('local/images/users/perfil1.png');
            }
            @endphp
            @if (!empty($photo))
            <img class="img-fluid" src="{{$photo}}" alt="User picture">
            @else
            <img class="img-fluid" src="{{$util->toImage('local/images/users/perfil1.png')}}" alt="User picture">
            @endif
        </div>
        <div class="user-info text-center">
            @if (!empty($sidebar->perfil->name))
            @php
                $arrayName = explode(" ", $sidebar->perfil->name);
                $num_names = count($arrayName);
            @endphp

            @if ($num_names > 1)
            <span class="user-name text-center">{{reset($arrayName)}}
            <strong>{{end($arrayName)}}</strong>
            </span>
            @else
            <span class="user-name text-center">
            <strong>{{ trim(reset($arrayName) )}}</strong>
            </span>
            @endif
            @endif
            <!--span class="user-role px-0 mx-0 text-center">{{-- trim(date("d/m/Y")) --}}</span-->
            <div>
            <a class="tooltip-dx btn" data-tooltip="Desconectar" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <span class="user-status text-center">
            <i class="fas fa-circle"></i>
            <span>{{__('Connected')}}</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
            </div>
        </div>
        </div>
        @endguest
        @endif
        {{--Bloco de a´rea de busca --}}
        @if (!empty($sidebar->search) && $sidebar->search === true)
        @php
            if (!empty($sidebar->action)){
                $action = $sidebar->action;
            }else{
                $action = 'search';
            }
        @endphp
        <div class="sidebar-search">
            <div>
            <form class="form-inline" method="post" action="{{$util->toRoute($action)}}" id="search-form">
            <div class="input-group " style="width:100%">
            <input type="text" class="form-control search-menu mx-0 mr-1 rounded" id="search" name="search" placeholder="Search..." style="width:80%;">
            @csrf
            <div class="input-group-append mr-1">
            <button type="submit" class="btn m-0 p-0 mr-1" role="button">
            <span class="input-group-text py-2">
            <i class="fas fa-search" aria-hidden="true"></i>
            </span>
            </button>
            </div>

            </div>
            </form>
            </div>
        </div>
        @endif
        {{--Bloco de Menu --}}
    <div class="sidebar-menu">
    {{--Bloco de seção de menu --------------------------------------------------------------}}
        @if (!empty($sidebar->sections))
        @php
        $iconKey = 0;
        @endphp
        @foreach ($sidebar->sections as $i => $section)
        @if (!property_exists($section, "permission") OR $section->permission === true)
        <ul>
        {{--Bloco de items de seção de menu--}}
        @if (!empty($section->items))
            @if (!empty($section->label))
            <!--Cabeçalho de itens de menu -->
            <li class="header-menu">
            <span>{{$section->label}}</span>
            </li>
            <!--Fim de cabeçalho -->
            @elseif($i == 0)
            <li class="header-menu py-1">
            </li>
            @else
            <li class="header-menu">
            <span>{{ __('Section') }} {{$i}}</span>
            </li>
            @endif
        @foreach ($section->items as $key => $item)
            @if (!property_exists($item, "permission") OR $item->permission === true)
            @if (property_exists($item, "subItems"))
            <li class="sidebar-dropdown">
                <a href="#">
                    @if (!empty($item->icon))
                    <i class="fas fa-{{$item->icon}}"></i>
                    @else
                        <i class="fas fa-{{$arrayIcon[$iconKey]}}"></i>
                    @endif
                <span>{{$item->label}}</span>
                </a>
                <!-- Submenu -->
                <div class="sidebar-submenu">
                <ul>
                @foreach ($item->subItems as $subItem)

                @if (!property_exists($subItem, "permission") OR $subItem->permission === true)
                <li>
                @if (!empty($subItem->vueAction))
                <a href="#" v-on:click="{{$subItem->vueAction}}">{{$subItem->label}}</a>
                @elseif(!empty($item->route) && !empty($subItem->route))
                <a href="{{$util->toRoute($item->route, $subItem->route)}}">{{$subItem->label}}</a>
                @endif


                </li>
                @endif
                @endforeach
                </ul>
                </div>
            </li>
            @else
            <li>
                @if (!empty($item->vueAction))
                <a href="#" v-on:click="{{$item->vueAction}}">
                @elseif(!empty($item->route))
                <a href="{{$util->toRoute($item->route)}}">
                @else
                <a href="#">
                @endif
                @if (!empty($item->icon))
                <i class="fas fa-{{$item->icon}}"></i>
                @else
                    <i class="fas fa-{{$arrayIcon[$iconKey]}}"></i>
                @endif
                <span>{{$item->label}}</span>
                </a>
                </li>
            @endif
            @endif
            @php
            if ($iconKey < 20){
                $iconKey ++;
            }else{
                $iconKey = 0;
                //$iconKey = mt_rand(0,37);
            }
            @endphp
        @endforeach
        {{--Fim de bloco de items de seção de menu--}}
        @endif
        </ul>
        @endif
        @endforeach
    {{--Fim de bloco de seção de menu -----------------------------------------------------------------}}
    {{--Bloco de Itens de menu ------------------------------------------------------------------------}}
        @elseif (!empty($sidebar->items))
        @php
            $iconKey = 0;
        @endphp
        <ul class="mt-3">
            @foreach ($sidebar->items as $key => $item)
            @if (!property_exists($item, "permission") OR $item->permission === true)
                @if (property_exists($item, "subItems"))
                <li class="sidebar-dropdown">
                    <a href="#">
                        @if (!empty($item->icon))
                        <i class="fas fa-{{$item->icon}}"></i>
                        @else
                            <i class="fas fa-{{$arrayIcon[$iconKey]}}"></i>
                        @endif
                    <span>{{$item->label}}</span>
                    </a>
                    <!-- Submenu -->
                    <div class="sidebar-submenu">
                    <ul>
                    @foreach ($item->subItems as $subItem)
                    @if (!property_exists($subItem, "permission") OR $subItem->permission === true)
                    <li>
                    @if (!empty($subItem->vueAction))
                    <a href="#" v-on:click="{{$subItem->vueAction}}">{{$subItem->label}}</a>
                    @elseif(!empty($item->route) && !empty($subItem->route))
                    <a href="{{$util->toRoute($item->route, $subItem->route)}}">{{$subItem->label}}</a>
                    @endif
                    </li>
                    @endif
                    @endforeach
                    </ul>
                    </div>
                </li>
                @else
                <li>
                    @if (!empty($item->vueAction))
                    <a href="#" v-on:click="{{$item->vueAction}}">
                    @elseif(!empty($item->route))
                    <a href="{{$util->toRoute($item->route)}}">
                    @else
                    <a href="#">
                    @endif
                    @if (!empty($item->icon))
                    <i class="fas fa-{{$item->icon}}"></i>
                    @else
                        <i class="fas fa-{{$arrayIcon[$iconKey]}}"></i>
                    @endif
                    <span>{{$item->label}}</span>
                    </a>
                    </li>
                @endif
                @php
                if ($key < 20){
                    $iconKey ++;
                }else{
                    $iconKey = 0;
                    //$iconKey = mt_rand(0,37);
                }
                @endphp
            @endif
            @endforeach
        </ul>
        @endif
    {{--Fim do bloco de Itens de menu ----------------------------------------------------------------------}}
    </div>
</nav>
</div>
@else
@guest
    @if (!empty($sidebar->hiddenConect) && $sidebar->hiddenConect === true)
    @else
    <a id="show-sidebar" class="dropdown btn {{$show_style}} {{$btnStyle}}" id="dropdownLogin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-pressed="true">
        <div class="d-none d-md-block ml-2 mr-2">
        <span class="mr-2" translate="no">{{ __('connect') }}</span>
        <i class="fas fa-bars"></i>
        </div>
        <div class="d-bloc d-md-none">
            <i class="fas fa-bars"></i>
        </div>
    </a>
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
    <div class="container-xl px-3 mt-4 pb-2" translation="no">
        <div class="alert alert-primary {{$border}}" role="alert">
        <div class="content-message alert-heading" style="font-size:calc(0.85em + 0.4vw)"><strong>{{__('Message')}}!</strong></div>
        <hr class="d-none d-sm-block">
        <div class="mb-0" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.18vw);">{{ __('There are no items to display.') }}</div>
        </div>
    </div>
    @endif
@endif

{{--
Baseado em
Autor: https://codepen.io/azouaoui-med
https://github.com/azouaoui-med/pro-sidebar-template

Icons
https://fontawesome.com/icons?d=gallery&m=free
--}}

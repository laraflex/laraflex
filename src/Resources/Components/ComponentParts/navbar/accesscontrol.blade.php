{{-- INÍCIO DOS ITEMS DE LOGIN E REGISTRO ======================== --}}
@php
    $routeLogin = $util->toRoute('login');
    $routeRegister = $util->toRoute('register');
@endphp
<li class="d-flex nav-item dropdown">
    @guest
    {{-- ================== OPÇÃO DE MENU PARA USUÁRIO NÃO LOGADOS =============================--}}
    <a class="nav-link dropdown-toggle-xx px-2 py-2 mt-0 me-3 {{$itemNavbarColor}}" style="{{$font_color}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    {{__('Login')}}
    </a>
    <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdown" style="min-width:300px;{{$subMenuColor}}">
        <li><a class="dropdown-item" href="{{$routeLogin}}">{{__('Login')}}</a></li>
        @if (!empty($navBar->showRegister) && $navBar->showRegister == true)
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{$routeRegister}}">{{__('Register')}}</a></li>
        @endif
    </ul>
    @else
    {{-- =============== OPÇÃO DE MENU PARA USUÁRIO AUTORIZADOS (LOGADOS) ======================--}}
    @php
            if (!empty($navBar->perfil->photoStorage)){
                $photo = $navBar->perfil->photoStorage;
            }
            elseif (!empty($navBar->perfil->photoPath)){
                $photo = $util->toImage($navBar->perfil->photoPath);
            }
            elseif(!empty($navBar->perfil->photo)){
                $photo = $util->toImage($navBar->perfil->photo);
            }else{
                $photo = $util->toImage('local/images/users/perfil1.png');
            }
            $routePerfil = $util->toRoute('perfil/configure');
            $routeSettings = $util->toRoute('settings');
    @endphp
    <a class="nav-link dropdown-toggle-xx px-2 py-0 mb-0 me-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img class="mx-auto rounded-circle" src="{{$photo}}" alt="" style="width:32px; paddingx:0px;">
    </a>
    <div class="dropdown-menu dropdown-menu-lg-end" style="min-width:250px;">
    <div class="border rounded m-2 mt-0" style="background-color: #F0FFF0">
    <img class="mx-auto d-block rounded-circle pt-4 pb-3" src="{{$photo}}" alt="" style="width:60px; paddingx:0px;">
    @if (!empty($navBar->perfil->name))
        <div class="text-center w-100 mb-2">{{$navBar->perfil->name}}</div>
    @endif
    </div>
    <div>
    @if (!empty($navBar->showUserPerfil) && $navBar->showUserPerfil == true)
    <a class="dropdown-item text-center w-100 my-0" href="{{$routePerfil}}"><small>{{__('Customize Profile')}}</small></a>
    @endif
    @if( !empty($navBar->showSetting) && $navBar->showSetting == true)
    <a class="dropdown-item text-center w-100 my-0" href="{{$routeSettings}}"><small>{{__('Settings')}}</small></a>
    @endif
    <div><hr class="dropdown-divider"></div>
    <form method="post" action="{{route('logout')}}">
    @csrf
    <input type="submit" class="btn text-center w-100" value="{{ __('Logout') }}">
    </form>
    </div>
    </div>
    @endguest
</li>

{{--- FIM DOS ITENS DE LOGIN E REGISTRO =============================  --}}

{{--This component should only be added with PHP include--}}
<ul class="pr-3x navbar-nav p-0 float-right">
    <!-- Authentication Links -->
    @guest
    <li class="nav-item dropdown active" >
    <a id="{{$item_navbar_id}}" class="{{$fontWeight}} nav-link dropdown-togglex px-2 {{$navbar_item}}" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
    {{__('Login')}}<span class="caret"></span>
    </a>
    <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="navbarDropdown">
    <a id="{{--$item_navbar_id--}}" class="nav-linkx dropdown-item px-3 {{$navbar_item}}" href="{{ route('login') }}">{{ __('Login') }}</a>
    @if(!empty($navBar->showRegister) && $navBar->showRegister === true)
    <a id="{{--$item_navbar_id--}}" class="nav-linkx dropdown-item px-3 {{$navbar_item}}" href="{{ route('register') }}">{{ __('Register') }}</a>
    </div>
    </li>
    @endif
    {{--Fim de controle de register--}}
    @else
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
    @endphp

    <li class="nav-item dropdown active" >
    <a id="{{$item_navbar_id}}" class="{{$fontWeight}} nav-link dropdown-togglex px-2 {{$navbar_item}}" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
    <img class="mx-auto d-block borderx roundedx rounded-circle" src="{{$photo}}" alt="" style="width:32px; padding:0px;">

    </a>
    <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="navbarDropdown">
    {{--Início de perfil----}}
    <div class="navbar-header dropdown-item bg-white" style="min-width:300px;">
        <div class="user-pic pt-3">
            @if (!empty($photo))
            <img class="mx-auto d-block rounded" src="{{$photo}}" alt="User" style="width:60px;">
            @else
            <img class="mx-auto d-block rounded" src="{{$util->toImage('local/images/users/perfil1.png')}}" alt="User" style="width:60px;">
            @endif
        </div>
        <div class="user-info text-center">
            @if (!empty($navBar->perfil->name))
            @php
                $arrayName = explode(" ", $navBar->perfil->name);
                $num_names = count($arrayName);
            @endphp

            @if ($num_names > 1)
            <div class="user-name center-center mt-2">{{reset($arrayName)}}
            <strong>{{end($arrayName)}}</strong>
            </div>
            @else
            <div class="user-name text-center mt-2">
            <strong>{{ trim(reset($arrayName) )}}</strong>
            </div>
            @endif

            @endif
            <div class="user-role px-0 mx-0 text-center"><small>{{ trim(date("d/m/Y")) }}</small></div>
        </div>
        </div>
    {{--Fim de perfil-------}}
    <a class="dropdown-item text-center mt-2" href="{{ route('logout') }}"
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

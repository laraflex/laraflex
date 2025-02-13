@if (!empty($sidebar->perfil))
@guest
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
            <!--span class="user-role px-0 mx-0 text-center">{{-- trim(date("d/m/Y"))--}} </span>-->

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


@php
   if(!empty($objectHeader)){
       $dropmenu = $objectHeader;
   }


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

    if (!empty($dropmenu->route)){
        $routeLogo = $util->toRoute($dropmenu->route);
    }else{
        $routeLogo = $util->toRoute('home');
    }
@endphp

@if(!empty($dropmenu))

<section id="Navbar">
<nav class="navbar navbar-expand-lg pl-0 pr-0 bg-white" style="border-top: 5px solid {{$styleColor}};">

<div class="container pl-0 pr-0 my-1 w-100" style="margintop:60px;">
{{--Barra superior--}}
<div class="row w-100 m-0 p-0" >

        <div class=" d-none d-lg-block col-lg-3">
        </div>
        <div class="col-12 col-lg-6 text-center">
        <a href="{{$routeLogo}}">
        <img src="{{$util->toImage($dropmenu->imagePath, $dropmenu->image)}}" width="170" height="40">
        </a>
        </div>
        <div class="d-none d-lg-block col-lg-3">

            {{--*******************************************************--}}
            <ul class="navbar-nav float-right" >
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
            <a class="nav-link text-reset" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-reset" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @else
            <li class="nav-item dropdown" >
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:#585858">
            {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">

            <a class="dropdown-item text-reset" href="{{ route('logout') }}"
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
</div>
</div>
</nav>
        {{--Fim de barra superior--}}


<nav class=" {{$styleNav}}" style="background-color: {{$styleColor}}; border-bottom: 1px solid #ccc;border-top: 1px solid #ccc;">

<div class="container">


<div class="navbar m-0 p-0 ">
    {{--Dropmenu--}}
<div class="dropdown" style="width: 95%;">

            <a href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{url('images/icons/menu1.png')}}" class="zoon-in" style="height:40px;">
            </a>

        <div class="dropdown-menu p-0 m-0 shadow w-100" aria-labelledby="dropdownMenuButton" style="widthxx:95%;">


            <div class="row w-100">
                <div class="col-12 col-sm-8 col-lg-10 pt-4">
                    <div class="d-block d-lg-none p-3" >
                        {{------}}

                        <ul class="navbar-nav mr-auto mb-2" >
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav py-0 px-2 w-100">
                            <a class="btn btn-outline-secondary btn-sm px-4" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @else
                            <li class="nav pl-2 pr-2 w-100 ">
                            <a class="btn btn-outline-secondary btn-sm px-4" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                            </li>
                            @endguest
                        </ul>
                        </div>
                    <div class="dropdown-divider d-none d-lg-block mt-3"></div>
                    <div class="row w-100 m-0 p-0 pb-3" >
                        
                        @php
                        if(!empty($dropmenu->items)){
                            $numItems = count($dropmenu->items);
                            $value = $numItems / 4;
                            $valItems = intval($value);
                            if($value > $valItems){
                                $valItems = $valItems + 1;
                            }

                            $count = 0;
                        }
                        @endphp
                        @if(!empty($dropmenu->items))
                        <div class="col-sm-12 col-lg-3 col-xl-3 px-3" >
                        @foreach($dropmenu->items as $key => $item)
                        @php
                        if(empty($item->route)){
                            $route = "#";
                        }else{
                            $route = $util->toRoute($item->route);
                        }                     
                        @endphp
                        @if(!empty($item->divider) && $item->divider == true)
                        <li class="nav pl-2 pr-2 w-100 dropdown-item">
                        <a href="{{$route}}" style="color:#1C1C1C;" class="w-100"><b>{{$item->label}}</b></a></li>
                        <div class="dropdown-divider"></div>
                        @else
                        <li class="nav pl-2 pr-2 w-100 dropdown-item"><a href="{{$route}}" style="color:#1C1C1C;" class="w-100">{{$item->label}}</a></li>
                        @endif
                        @php
                        $control = false;
                        $count++;
                        if($count == $valItems && $numItems != $key + 1){
                            $control = true;
                            $count = 0;
                        }
                        @endphp
                        @if($control == true)
                        </div>
                        <div class="col-sm-12 col-lg-3 col-xl-3 px-3" >
                        @endif
                        @endforeach
                        </div>
                        @endif

                        {{--Início do bloco de itens de menu--
                        @if(!empty($dropmenu->groupItems))
                        @foreach($dropmenu->groupItems as $key => $groupItem)
                            {{--}
                            @if($key == 0)
                            <h5 class="nav mb-2">{{$groupItem->label}}</h5>
                            <div class="dropdown-divider"></div>
                            <ul class="navbar-nav mr-auto">
                            @foreach($groupItem->items as $item)
                            <li class="nav pl-2 pr-2 w-100 dropdown-item"><a href="#" style="color:#1C1C1C;" class="w-100">{{$item->label}}</a></li>
                            @endforeach
                            </ul>
                            </div>
                            @else 
                            --}
                            
                            <div class="col-sm-6 col-lg-3 col-xl-3 px-3" >
                            <h5 class="nav mb-2">{{$groupItem->label}}</h5>
                            <div class="dropdown-divider"></div>
                            <ul class="navbar-nav mr-auto">
                            
                            @foreach($groupItem->items as $item)
                            <li class="nav pl-2 pr-2 w-100 dropdown-item"><a href="#" style="color:#1C1C1C;" class="w-100">{{$item->label}}</a></li>
                            @endforeach
                            
                            </ul>
                            </div>
                           
                        @endforeach
                        @endif
                          --}}
                       
                    </div>
                    {{--Fim do bloco de itens de menu--}}
                </div>
                <div class="d-none d-sm-block col-sm-4 col-lg-2 m-0 p-0 pt-sm-5 pt-lg-3 pb-lg-3 ">
                <img src="{{url('images/app/foto1.jpg')}}" class="img-fluid img-thumbnail">
                </div>

            </div>
        </div>

    </div>
    {{--Fim dropmenu--}}

</div>


</div>
</nav>

</section>
@endif

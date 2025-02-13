
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
            <li class="header-menu pb-2">
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
            @foreach ($section->items as $key => $itemSection)
            @if (!property_exists($itemSection, "permission") OR $itemSection->permission === true)

            @if (property_exists($itemSection, "subItems"))
            @if ($key == 0)
            <li class="sidebar-dropdown border-top border-bottom">
            @else
            <li class="sidebar-dropdown border-bottom">
            @endif
                <a href="#">
                @if (!empty($itemSection->icon))
                <i class="fas fa-{{$itemSection->icon}}"></i>
                @else
                <i class="fas fa-{{$arrayIcon[$iconKey]}}"></i>
                @endif
                <span>{{$itemSection->label}}</span>
                </a>
                <!-- Submenu -->
                <div class="sidebar-submenu">
                <ul>
                @foreach ($itemSection->subItems as $subItem)
                @if (!property_exists($subItem, "permission") OR $subItem->permission === true)
                <li>
                @if (!empty($subItem->vueAction))
                <a href="#" v-on:click="{{$subItem->vueAction}}">{{$subItem->label}}</a>
                @elseif(!empty($itemSection->route) && !empty($subItem->route))
                <a href="{{$util->toRoute($itemSection->route, $subItem->route)}}">{{$subItem->label}}</a>
                @endif
                </li>
                @endif
                @endforeach
                </ul>
                </div>
            </li>
            @else
            @if ($key == 0)
            <li class="border-top border-bottom">
            @else
            <li class="border-bottom">
            @endif

            @if (!empty($itemSection->vueAction))
            <a href="#" v-on:click="{{$itemSection->vueAction}}">
            @elseif(!empty($itemSection->route))
            <a href="{{$util->toRoute($itemSection->route)}}">
            @else
            <a href="#">
            @endif
            @if (!empty($itemSection->icon))
            <i class="fas fa-{{$itemSection->icon}}"></i>
            @else
            <i class="fas fa-{{$arrayIcon[$iconKey]}}"></i>
            @endif
            <span>{{$itemSection->label}}</span>
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

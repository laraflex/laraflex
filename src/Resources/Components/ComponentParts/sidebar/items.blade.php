
@php
$iconKey = 0;
@endphp
<ul class="mt-2">
    @foreach ($sidebar->items as $key => $item)
        @if (!property_exists($item, "permission") OR $item->permission === true)
        @if (property_exists($item, "subItems"))
        @if ($key == 0)
        <li class="sidebar-dropdown {{$border_top}} {{$border_bottom}}">
        @else
        <li class="sidebar-dropdown {{$border_bottom}}">
        @endif
        {{--<li class="sidebar-dropdown">--}}
        <a href="#" >
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
        @if (!property_exists($subItem, "permission") OR $subItem->permission == true)
        <li>
        @if(!empty($item->route) && !empty($subItem->route))
        <a href="{{$util->toRoute($item->route, $subItem->route)}}">{{$subItem->label}}</a>
        @endif
        </li>
        @endif
        @endforeach
        </ul>
        </div>
        </li>
        @else
        @if ($key == 0)
        <li class="{{$border_top}} {{$border_bottom}}">
        @else
        <li class="{{$border_bottom}}">
        @endif
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

        }
        @endphp
        @endif
    @endforeach

</ul>

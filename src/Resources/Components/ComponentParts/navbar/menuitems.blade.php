{{--This component should only be added with PHP include--}}
<li class="nav-item active">
    @if (property_exists($itemMenu, "subItems"))
    <li class="nav-item dropdown active">
    <a id ="{{$item_navbar_id}}" class="{{$fontWeight}} nav-link dropdown-toggle px-2 {{$navbar_item}}" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{ __($itemMenu->label) }}
    </a>
    <div class="dropdown-menu pb-3 shadow-lg px-2 py-3" aria-labelledby="navbarDropdownMenuLink" style="min-width:350px;">
        @php
        // ==========================================================================================================
        $submenu = $itemMenu->subItems;
        // =========================================================================================================
        @endphp
        @foreach ( $submenu as $k => $item )
        @php
        $numItems = count($submenu);
        $border_item = 'border-top: 1px dotted #D8D8D8;';
        if ($k == $numItems - 1){
            $border_item = 'border-top: 1px dotted #D8D8D8; border-bottom: 1px dotted #D8D8D8;';
        }
        @endphp
        <a class="dropdown-item pl-3 py-2"  href="{{$util->toRoute($itemMenu->route,$item->route)}}" style="{{$border_item}}">
        {{ __($item->label) }}
        </a>
        @endforeach
    </div>
    </li>
    @else
    <a id="{{$item_navbar_id}}" class="{{$fontWeight}} nav-link {{$navbar_item}}" href="{{$util->toRoute($itemMenu->route)}}">
    {{ __($itemMenu->label) }}
    </a>
    @endif
</li>

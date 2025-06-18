@foreach ($navBar->items as $key => $itemMenu)
@php
if ($key == 9){
    break;
}
(!empty($itemMenu->label)) ? $itemlabel =  $itemMenu->label: $itemlabel = 'label';
(!empty($itemMenu->route)) ? $route = $util->toRoute($itemMenu->route): $route = '#';
@endphp

@if (property_exists($itemMenu, "subItems"))
    <li class="nav-item dropdown" style="max-width: 350px;">
    <a class="nav-link dropdown-toggle  {{$itemNavbarColor}}" style="{{$font_color}}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{$itemlabel}}
    </a>
    <ul class="dropdown-menu px-2" style="{{$subMenuColor}}; z-index:150">
    @foreach ($itemMenu->subItems as $k => $subMenu )
    @php
        (!empty($subMenu->label)) ? $subLabel = $subMenu->label: $subLabel = 'label';
        (!empty($subMenu->route)) ? $subRoute = $util->toRoute($itemMenu->route,$subMenu->route): $subRoute = '#';
    @endphp
    <li><a class="dropdown-item pe-lg-5 me-2 " href="{{$subRoute}}" style="z-index:150">{{$subLabel}}</a></li>
    @endforeach
    </ul>
    </li>
@else
<li class="nav-item" style="max-width: 350px;">
    <a class="nav-link {{$itemNavbarColor}}" aria-current="page" href="{{$route}}" style="{{$font_color}}">{{$itemlabel}}</a>
</li>
@endif
@endforeach

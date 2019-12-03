
@if(!empty($object))
    @php
        $footer = $object;
    @endphp
@endif

@if (!empty($footer->items))

<!-- Section footer -------------------------------------------->
<footer id="footer" class="d-none d-sm-block">
    <div class="pl-3 pt-2 mb-0" style="border-top: 1px solid #ccc; {{$bgColor}} {{$fontColor}}">
    <div class="container pt-4 pb-5">
    <div class="row w-100 m-0 p-0">
    @foreach($footer->items as $key => $item)
    <div class="col-sm pt-0">
    <h5 class="nav mb-2">{{__($key)}}</h5>
    <ul class="navbar-nav mr-auto">
    @foreach($item as $listItem)
    @if(!empty($listItem->route) && $listItem->route == '#')
    <li class="nav"><a href="#" style="{{$fontColor}}">{{$listItem->label}}</a></li>
    @elseif(!empty($listItem->route))
    @php
    $route = $util->toRoute($util->slug($key, '-'), $listItem->route);
    @endphp
    <li class="nav"><a href="{{$route}}" style="{{$fontColor}}">{{$listItem->label}}</a></li>
    @endif
    @endforeach
    </ul>
    </div>
    @endforeach
    </div>
    </div>
    </div>
</footer>
<!--End Section ------------------------------------------------>
@else
<div class="text-center p-4 mt-0 mb-3 {{$border}}">
        <h5>{{ __('There are no items to display.') }}</h5>
    </div>
@endif

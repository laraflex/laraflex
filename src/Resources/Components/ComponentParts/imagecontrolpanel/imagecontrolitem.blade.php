 {{--@props(['image', 'route','label','icon', 'collumnConfig', 'border']) --}}
<div class="{{$collumnConfig}} p-0 m-0">
<div class="m-2 m-md-1">
<div class="card bg-dark {{$border}}" style="background-image: url({{$image}});background-repeat:round; min-height:8em">
    @if (!empty($route))
    <a href="{{$route}}">
    @else
    <a href="#" >
    @endif
    <div id="item-card" class="card-img-overlay text-center">
    <i class="fas {{$icon}} mt-2 mb-1" style="font-size: 150%"></i>
    @if ($label)
    <div class="card-title mt-1" style="font-size:calc(13px + 0.10vw); line-height: 1.2"><b>{{$label}}</b></div>
    @endif
    </div>
    </a>
</div>
</div>
</div>

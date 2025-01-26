@props(['logo', 'route'])
@if (!empty($route))
<{{$route}}>
<div class="py-2 pt-sm-5 pt-lg-3 pb-lg-2 d-none d-sm-block">
<img src="{{$logo}}" style="width:calc(170px + 3.5vw); height:calc(40px + 0.7vw);"/>
</div>
</a>
@else
<div class="py-2 pt-lg-3 pb-lg-2 d-none d-sm-block">
<img src="{{$logo}}" style="width:calc(170px + 3.5vw); height:calc(40px + 0.7vw);"/>
</div>
@endif

<<<<<<< HEAD
@props(['logo', 'routeLogo','size'])
@php
if ($size == 'large'){
    $style = "width:calc(150px + 14vw); height:calc(35px + 1.8vw);";
}else{
    $style = "width:calc(170px + 3.5vw); height:calc(40px + 0.7vw);";
}

@endphp
@if (!empty($routeLogo))
<a href="{{$routeLogo}}"">
<div class="py-2 pt-sm-5 pt-lg-3 pb-lg-2">
<img src="{{$logo}}" style="{!!$style!!}"/>
</div>
</a>
@else
<div class="py-2 pt-lg-3 pb-lg-2">
<img src="{{$logo}}" style="{!!$style!!}"/>
=======
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
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da
</div>
@endif

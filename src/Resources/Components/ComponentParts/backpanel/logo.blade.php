{{--@props(['logo', 'routeLogo','size'])--}}
@php

if ($size == 'large'){
    $style = "width:calc(120px + 18vw); height:calc(28px + 2.0vw);";
}else{
    $style = "width:calc(80px + 14vw); height:calc(25px + 1.8vw);";
}

@endphp
<div class="p-2 p-lg-3"></div>
@if (!empty($routeLogo))
<a href="{{$routeLogo}}"">
<div class="py-2 pt-sm-5 pt-lg-3 pb-lg-2">
<img src="{{$logo}}" style="{!!$style!!}"/>
</div>
</a>
@else
<div class="py-2 pt-lg-3 pb-lg-2">
<img src="{{$logo}}" style="{!!$style!!}"/>
</div>
@endif


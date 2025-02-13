{{--This component should only be added with PHP include--}}
<div class="mediacards-title text-center pt-2 pb-2" style="font-size:calc(1.1em + 0.6vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
    {{$mediacards->title}}</div>
@if (!empty($mediacards->legend))
    <div class="mediacards-shared text-center pb-2" style="font-size:calc(0.76em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
    <span style="color:gray">{{$mediacards->legend}}</span></div>
@endif
<div class="mt-3">

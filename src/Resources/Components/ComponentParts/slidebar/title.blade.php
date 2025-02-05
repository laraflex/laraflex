@props(['title','legend','position','font_family_title','font_family' ])
@if(!empty($title))
<div class="slidebar-title {{$position}} pt-2 pb-2" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
{{$title}}</div>
@endif
@if (!empty($legend))
<div class="slidebar-shared {{$position}} pb-1 pb-sm-2" style="font-size:calc(0.78em + 0.29vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
<span style="color:gray">{{$legend}}</span></div>
@endif

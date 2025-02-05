@props(['title','legend','font_family','font_family_title','position'])
@if(!empty($title))
<div class="groupcards-title mt-1 {{$position}} pt-2 pb-1 pb-sm-3 pr-2 pl-2" style="font-size:calc(0.7em + 1.1vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
    {{$title}}</div>
@endif
@if (!empty($legend))
<div class="slidebar-shared {{$position}} pb-2 pb-sm-3 pl-2" style="font-size:calc(0.78em + 0.29vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
<span style="color:gray">{{$legend}}</span></div>
@endif

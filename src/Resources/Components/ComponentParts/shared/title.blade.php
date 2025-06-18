@if(!empty($title))
<div class="groupcards-title mt-1 mt-md-3 {{$position}} py-2 mb-0 mb-md-2 pr-2 pl-2" style="font-size:calc(0.7em + 1.1vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
    {{$title}}</div>
@endif
@if (!empty($legend))
<div class="slidebar-shared {{$position}} pb-2 pb-sm-3 pl-2" style="font-size:calc(0.78em + 0.29vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
<span style="color:gray">{{$legend}}</span></div>
@endif

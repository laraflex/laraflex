@props(['title', 'legend', 'font_family_title', 'font_family'])
<div class="imagecontrolpanel-title text-center pt-3 pb-2" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
{{$title}}</div>
@if (!empty($legend))
<div class="imagecontrolpanel-shared text-center pb-3" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
<span>{{$legend}}</span></div>
@else
<div class="pt-2"></div>
@endif

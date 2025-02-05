@props(['title','font_family_title' ])
@if(!empty($title))
<div class="mt-1 text-center pt-0 pb-3" style="font-size:calc(1.0em + 0.75vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
{{$title}}</div>
@endif

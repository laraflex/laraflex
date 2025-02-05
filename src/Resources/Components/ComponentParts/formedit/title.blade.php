@props(['title', 'legend', 'font_color', 'font_family_title', 'font_family'])
<div class="pt-2 pb-3 text-center">
@if (!empty($title))
<div class="form-title text-center pt-1 pb-2" style="font-size:calc(1.1em + 0.6vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
{{$title}}</div>
@endif
@if (!empty($legend))
<div class="form-item-shared text-center pb-md-2" style="font-size:calc(0.76em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
<span class="{{$font_color}}">{{__($legend)}}</span></div>
@endif
</div>

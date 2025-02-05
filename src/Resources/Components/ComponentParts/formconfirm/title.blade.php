@props(['title', 'legend'])
<div class="pt-2 pb-3 text-left">
    @if (!empty($title))
    <div class="form-title text-left pt-2 pb-2" style="font-size:calc(1.1em + 0.6vw);line-height:calc(14px + 1.3vw);">
    {{$title}}</div>
    @endif
    @if (!empty($legend))
    <div class="form-item-shared text-left" style="font-size:calc(0.76em + 0.25vw);line-height:calc(14px + 0.3vw);">
    <span style="color:gray">{{$legend}}</span></div>
    @endif
</div>

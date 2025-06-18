@props(['content', 'font_family'])
<div class="contentbox-shared mt-3" style="line-height: calc(1.1em + 0.6vw); font-size:calc(14px + 0.21vw); text-align:justify; {{$font_family}}">
    {{--!!$content!!--}}
    {!!$content!!}
</div>

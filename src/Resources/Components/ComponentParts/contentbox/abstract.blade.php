@props(['abstract', 'allVisible', 'font_family'])
{{--Resumo visíveis em mobiles ou não--}}
@if (!empty($allVisible) && $allVisible === true)
<div class="">
@else
<div class="d-none d-sm-block">
@endif
<div class="pb-3 mt-3" style="line-height: calc(1.1em + 0.6vw); font-size:calc(14px + 0.21vw);{{$font_family}}"><b>{{__('Abstract')}}</b></div>
<div class="contentbox-shared text-justify pb-2" style="line-height: calc(1.1em + 0.6vw); font-size:calc(14px + 0.21vw);{{$font_family}}">
{{$abstract}}
</div>
</div>

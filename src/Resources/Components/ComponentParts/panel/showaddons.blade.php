@props(['stylePanel','addionTitle','showAddons','panelData','font_family','font_family_title' ])
@php
    $style_font_title = 'font-size:calc(0.96em + 0.25vw);line-height:calc(1.3em + 0.3vw);';
    $style_font = 'font-size:calc(0.8em + 0.28vw);line-height:calc(1.3em + 0.35vw);';
@endphp
<div class="px-2 px-lg-3 px-xl-0">
<div class="w-100 p-3 p-sm-4 p-lg-5 mb-4 mt-3 text-justify {{$stylePanel}}">
    @if(!empty($addionTitle))
    <div style="{{$style_font_title}}{{$font_family_title}}">{{$addionTitle}}</div>
    @endif
    @foreach($showAddons as $item)
    <p class="mt-2 mt-sm-3" style="{{$style_font}}{{$font_family}}">{{$panelData->$item}}</p>
    @endforeach
</div>
</div>

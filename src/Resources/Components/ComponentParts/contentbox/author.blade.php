@props(['authorName', 'photo', 'font_family'])
<div class="text-left mt-3" style="width: calc(200px + 10vw);">
@if (!empty($photo))
<img src="{{$photo}}" class="img-thumbnail mb-2 mt-2" style="width:30%">
@endif
<p class=" contentbox-shared card-text" style="line-height: calc(1.1em + 0.6vw);font-size:calc(0.8em + 0.18vw);{{$font_family}}">Autor: {{$authorName}}</p>
</div>

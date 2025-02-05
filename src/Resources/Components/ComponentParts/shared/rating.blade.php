@props(['util','item','font_family'])
<div class="mt-2" style="font-size:calc(11px + 0.25vw);line-height:1.3;{{$font_family}}">
@for ($i = 1; $i <= intval($item->rating); $i++)
<img src="{{$util->toImage('local/images/icons', 'star.png')}}" width="13px" height="12px" class="m-0 mb-1" />
@endfor
@if ($item->rating != intval($item->rating))
<img src="{{$util->toImage('local/images/icons', 'starsmall.png')}}" width="13px" height="12px" class="m-0 mb-1" />
@endif
</div>

@props(['rating', 'icon', 'smallIcon'])
<div>
@for ($i = 1; $i <= intval($rating); $i++)
<img src="{{$icon}}" width="13px" height="12px" class="m-0 mb-1" />
@endfor
@if ($rating != intval($rating))
<img src="{{$smallIcon}}" width="13px" height="12px" class="m-0 mb-1" />
@endif
</div>

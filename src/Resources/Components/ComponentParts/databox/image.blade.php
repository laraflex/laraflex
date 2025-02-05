@props(['label', 'image'])
<div class="col-sm-12 p-1 pt-2">
<span class="pl-2"><small><b>{{$label}}</b></small></span>
<div class="p-0" style="max-width: 250px;">
<img src="{{$image}}" class="image-fluid img-thumbnail d-none d-sm-block" style="max-width: 150px;">
<img src="{{$image}}" class="image-fluid img-thumbnail d-block d-sm-none" style="max-width: 100px;">
</div>
</div>

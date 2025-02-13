@if (in_array('image', $mediacards->showItems))
@php
if (!empty($item->imageStorage)){
    $image = $item->imageStorage;
}
elseif (!empty($item->imagePath)){
    $image = $util->toImage($item->imagePath);
}
elseif (!empty($item->image)){
    $image = $util->toImage($item->image);
}else{
    $image = $util->toImage('local/images/app/foto01.jpg');
}
@endphp
<div class="{{$imageMargin}}" style="background-color:#000000;">
<img src="{{$image}}" class="mediacards-img img-fluid ">
<img class="icon_play_mediacards rounded-circle" src="{{$util->toImage('local/images/icons','black_white_play.png')}}" style="top:26%;"/>
</div>
@else
<div class="{{$imageMargin}}" style="background-color:#000000;">
<img src="{{$util->toImage('local/images/app','foto01.jpg')}}" class="mediacards-img img-fluid">
<img class="icon_play_mediacards rounded-circle" src="{{$util->toImage('local/images/icons','black_white_play.png')}}" style="top:26%;"/>
</div>
@endif

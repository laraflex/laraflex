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

$icon_config = 'background-color: transparent; position: absolute; top: 43%; left:45%; width:30px; height:30px; background-color: rgb(255,255,255,0.5);z-index:200;'


@endphp
<div class="{{$imageMargin}}" style="background-color:#000000;position:relative">
<img src="{{$image}}" class="mediacards-img img-fluid ">
<img class="icon_play_mediacards rounded-circle" src="{{$util->toImage('local/images/icons','black_white_play.png')}}" style="top:26%; {{$icon_config}}"/>
</div>
@else
<div class="{{$imageMargin}}" style="background-color:#000000; position:relative">
<img src="{{$util->toImage('local/images/app','foto01.jpg')}}" class="mediacards-img img-fluid">
<img class="icon_play_mediacards rounded-circle" src="{{$util->toImage('local/images/icons','black_white_play.png')}}" style="top:26%; {{$icon_config}}"/>
</div>
@endif

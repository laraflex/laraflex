@php
if (!empty($objectHeader)){
    $imageBar = $objectHeader;
}elseif(!empty($objeto)){
    $imageBar = $objeto;
}elseif(!empty($object)){
    $imageBar = $object;
}
$image = $util->toImage($imageBar->imagePath, $imageBar->image);
if(!empty($imageBar->height)){
    $heightImage = intval($imageBar->height);
    $height = 'height:' . $imageBar->height . ';';
}else{
    $heightImage = 200;
    $height = 'height:200px;';
}
$ptTmp = '';
$titleSize = false;
if(!empty($imageBar->height) && $heightImage <= 110){
    $pt = 'pt-3';
}elseif(!empty($imageBar->height) && $heightImage <= 145){
    $pt = 'pt-4';
}elseif(!empty($imageBar->height) && $heightImage <= 200){
    $pt = 'pt-5';
}else{
    $pt = 'pt-5';
    $ptTmp = 'pt-4';
}
if(!empty($imageBar->height) && $heightImage > 180){
    $titleSize = true;
}

@endphp

@if(!empty($imageBar))
<div class="imageBar">
@if(!empty($imageBar->route))
<a href="{{$util->toRoute($imageBar->route)}}">
@endif
@if(!empty($imageBar->mobile) && $imageBar->mobile == true)
<div class="pb-3 {{$pt}}" data-background-color style="background-image: url('{{$image}}');background-repeatx:round;background-size:cover;border-bottom:1px solid #cccccc;{{$height}}">
@else
<div class="d-none d-sm-block pb-3 {{$pt}}" data-background-color style="background-image: url('{{$image}}');background-repeatx:round;background-size:cover;border-bottom:1px solid #cccccc;{{$height}}">
@endif
@php
if(!empty($imageBar->fontColor)){
    $color = $imageBar->fontColor;
}else{
    $color = 'white';
}
if(!empty($imageBar->textAlign)){
    $textAlign = 'text-' . $imageBar->textAlign;
}else{
    $textAlign = 'text-left';
}

@endphp
<div class="container px-4 {{$ptTmp}} {{$textAlign}}" style="color:{{$color}};">

<div class="mx-4 d-none d-lg-block" id="content">
@if($titleSize == true)
<h1 class="" style="text-shadow: 2px 2px 2px #6E6E6E;font-weight:normal">{{$imageBar->title}}</h1>
@else
<h2 class="" style="text-shadow: 2px 2px 2px #6E6E6E;font-weight:normal">{{$imageBar->title}}</h2>
@endif
<p>{{$imageBar->text}}<p>
</div>
{{--------------------}}
<div class="d-block d-lg-none" id="content">
<h3 class="d-none d-sm-block d-lg-none" style="2px 2px 2px #6E6E6E;font-weight:normal">{{$imageBar->title}}</h3>
<h5 class="d-block d-sm-none" style="2px 2px 2px #6E6E6E;font-weight:normal">{{$imageBar->title}}</h5>

<p>{{$imageBar->text}}<p>
</div>

</div>

@if(!empty($imageBar->route))
</a>
@endif
</div>

@endif

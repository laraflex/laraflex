@php
if (!empty($objectHeader)){
    $imageBar = $objectHeader;
}elseif(!empty($objeto)){
    $imageBar = $objeto;
}elseif(!empty($object)){
    $imageBar = $object;
}
if (empty($imageBar)){
    return NULL;
}
$image = $util->toImage($imageBar->imagePath, $imageBar->image);
//-> Controle de fonte de texto---}}

        if (!empty($imageBar->fontFamily->title)){
            $font_family_title = 'font-family:'.$imageBar->fontFamily->title;
        }else{
            $font_family_title = '';
        }
        if (!empty($imageBar->fontFamily->shared)){
            $font_family = 'font-family:'.$imageBar->fontFamily->shared;
        }else{
            $font_family = '';
        }

//->-------------------------------}}
if(!empty($imageBar->height)){
    $heightImage = intval($imageBar->height);
    $height = 'height:' . $imageBar->height . ';';
}else{
    $heightImage = 200;
    $height = 'height:200px;';
}
$ptTmp = '';
$titleSize = false;
$pb_text = 'pb-1';
$ptTmp = 'pt-4';
$line_height = '14px';
$font_size_base =  '1em';
$pb = "pb-3";
if(!empty($imageBar->height) && $heightImage <= 110){
    $pt = 'pt-4';
    $pb = "pb-0";
    $pb_text = 'pb-0';
    $ptTmp = 'pt-0';
    $line_height = '11px';
    $font_size_base = '0.85em';
}elseif(!empty($imageBar->height) && $heightImage <= 145){
    $pt = 'pt-4';
    $ptTmp = 'pt-1';
}elseif(!empty($imageBar->height) && $heightImage <= 200){
    $pt = 'pt-5';
    $pb_text = 'pb-2';
    $ptTmp = 'pt-4';
}else{
    $pt = 'pt-5';
    $ptTmp = 'pt-4';
    $pb_text = 'pb-2';
}
if(!empty($imageBar->height) && $heightImage > 199){
    $titleSize = true;
}

@endphp

@if(!empty($imageBar))
<div class="imageBar">
@if(!empty($imageBar->route))
<a href="{{$util->toRoute($imageBar->route)}}">
@endif
@if(!empty($imageBar->mobile) && $imageBar->mobile == true)
<div class="{{$pb}} {{$pt}}" data-background-color style="background-image: url('{{$image}}');background-repeatx:round;background-size:cover;border-bottom:1px solid #cccccc;{{$height}}">
@else
<div class="d-none d-sm-block {{$pb}} {{$pt}}" data-background-color style="background-image: url('{{$image}}');background-repeatx:round;background-size:cover;border-bottom:1px solid #cccccc;{{$height}}">
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
@if (!empty($imageBar->title))
@php
    $num_char = strlen($imageBar->title);
    if ($num_char > 49){
        $imageBar->title = substr($imageBar->title, 0, 49) . "...";
    }
    $num_char_text = strlen($imageBar->text);
    if ($num_char_text > 104){
        $imageBar->text = substr($imageBar->text, 0, 104) . "...";
    }

@endphp

<div class="container mt-0 mb-0 px-4 {{$ptTmp}} {{$textAlign}}" style="color:{{$color}};">

<div class="p-0" id="content">


{{--
<div class="mx-4 d-none d-lg-block" id="content">
--}}
@if($titleSize == true)
<div class="imagebar-title imagebar-title" style="text-shadow: 2px 2px 2px #6E6E6E;font-size:calc({{$font_size_base}} + 1vw);line-height:calc({{$line_height}} + 1.3vw);{{$font_family_title}}">{{$imageBar->title}}</div>
@else
<div class="imagebar-title" style="text-shadow: 2px 2px 2px #6E6E6E;font-size:calc({{$font_size_base}} + 0.8vw);line-height:calc({{$line_height}} + 1.0vw);{{$font_family_title}}">{{$imageBar->title}}</div>
@endif
@if (!empty($imageBar->text))
<div class="imagebar-share mt-1" style="text-shadow: 2px 2px 2px #6E6E6E;line-height:calc(0.98em + 0.6vw); font-size:calc(0.83em + 0.25vw);{{$font_family}}"><strong>{{$imageBar->text}}</strong></div>
@endif

</div>
</div>
@endif
@if(!empty($imageBar->route))
</a>
@endif
</div>

@endif

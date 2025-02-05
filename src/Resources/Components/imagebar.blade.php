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

    if (!empty($imageBar->imageStorage)){
        $image = $imageBar->imageStorage;
    }
    elseif (!empty($imageBar->imagePath)){
        $image = $util->toImage($imageBar->imagePath);
    }
    elseif(!empty($imageBar->image)){
        $image = $util->toImage($imageBar->image);
    }else{
        $image = NULL;
    }
@endphp
@if(!empty($image))
@php
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
    $value = $heightImage - 100;
    $height = 'height:calc(' . $value . 'px + 12vw);';
}else{
    $heightImage = 200;
    $height = 'height:calc(80px + 10vw);';

    //$height = 'height:200px;';
}
$ptTmp = '';
$titleSize = false;
$line_height = '14px';
$font_size_base =  '0.9em';
$mTopText = 'mt-2';
if(!empty($imageBar->height) && $heightImage <= 110){
    $mTopText = '';
    $line_height = '11px';
    $font_size_base = '0.85em';
}elseif(!empty($imageBar->height) && $heightImage <= 151){
    $mTopText = 'mt-1';
    $font_size_base = '0.9em';
}
if(!empty($imageBar->height) && $heightImage > 199){
    $titleSize = true;
}
@endphp
<div id="imagebar" class="imageBar">
    @if ($imageBar->type == 'content')
    <div class="container-xl px-3 mt-1 mt-sm-3 mt-md-4">
    @elseif (!empty($imageBar->cssClass) && $imageBar->cssClass == 'container')
    <div class="container-xl px-0">
    @else
    <div>
    @endif


    <div class="imagebar-image" data-background-color style="background-image: url('{{$image}}');background-repeatx:round;background-size:cover;border-bottom:1px solid #cccccc; {{$height}}">


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

@php
if (!empty($imageBar->title)) {
    $num_char = strlen($imageBar->title);
    if ($num_char > 49){
        $imageBar->title = substr($imageBar->title, 0, 49) . "...";
    }
    if (!empty($imageBar->text)) {
        $num_char_text = strlen($imageBar->text);
        if ($num_char_text > 104){
            $imageBar->text = substr($imageBar->text, 0, 104) . "...";
        }
    }

}
@endphp
@if (!empty($imageBar->fadeImage) && $imageBar->fadeImage === true)
<div class="imagebar-bgcolor" style="width:100%; height:100%; background-color: rgba(0,0,0,0.2);">
@else
<div class="imagebar-bgcolor" style="width:100%; height:100%;">
@endif

@if (!empty($imageBar->logo))


@endif

@if (!empty($imageBar->title))


<div class="container-xl mt-0 mb-0 px-0 {{$textAlign}}" style="width:100%; height:100%; position:relative;">
<div class="p-0 mx-0" id="content" style="margin: 0; position: absolute; top: 50%; transform: translate(-50%, -50%);left: 50%; margin-right: -50; width:100%">
@if ($imageBar->type == 'content')
<div id="imagebar-panel" class="px-4">
@else
<div id="imagebar-panel" class="px-5 pt-2 pt-sm-5">
@endif
@if(!empty($imageBar->route))
<a href="{{$util->toRoute($imageBar->route)}}">
@else
<a>
@endif
@if($titleSize == true)
<div class="imagebar-title imagebar-title" style="text-shadow: 2px 2px 2px #6E6E6E;font-size:calc({{$font_size_base}} + 1.0vw);line-height:calc({{$line_height}} + 1.3vw);color:{{$color}};{{$font_family_title}}">
{{$imageBar->title}}</div>
@else
<div class="imagebar-title" style="text-shadow: 2px 2px 2px #6E6E6E;font-size:calc({{$font_size_base}} + 1.0vw);line-height:calc({{$line_height}} + 1vw);color:{{$color}};{{$font_family_title}}">
{{$imageBar->title}}</div>
@endif
@if (!empty($imageBar->text))
@if(!empty($imageBar->route))
<a href="{{$util->toRoute($imageBar->route)}}" >
@else
<a>
@endif
<div class="imagebar-share mt-1 d-none d-sm-block {{$mTopText}}" style="text-shadow: 2px 2px 2px #6E6E6E;line-height:calc(0.98em + 0.6vw); font-size:calc(10px + 0.47vw);color:{{$color}};{{$font_family}}">
<strong>{{$imageBar->text}}</strong>
</div>
</a>
@endif
</div>
</div>
</div> {{-- controle--}}
</div>
@endif
</div>
</div>
@else
@if (!empty($blogcards->nullable) && $blogcards->nullable === true)
    <div class="text-center mt-2 mb-2"></div>
@else
 {{--messageNull component shered ==========================================--}}
 <x-laraflex::shared.messagenull />s

@endif

@endif

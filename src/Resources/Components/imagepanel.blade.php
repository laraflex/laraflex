@php
if (!empty($objectHeader)){
    $imagePanel = $objectHeader;
}
if(!empty($imagePanel->imageClass) && $imagePanel->imageClass == "container"){
    $imageClass = "container-xl";
}else{
    $imageClass = "";
}
if(!empty($imagePanel->textAlign)){
    $textAlign = 'text-' . $imagePanel->textAlign;
}else{
    $textAlign = 'text-left';
}
@endphp

{{--> Controle de fonte de texto---}}
@php
        if (!empty($imagePanel->fontFamily->title)){
            $font_family_title = 'font-family:'.$imagePanel->fontFamily->title;
        }else{
            $font_family_title = '';
        }
        if (!empty($imagePanel->fontFamily->shared)){
            $font_family = 'font-family:'.$imagePanel->fontFamily->shared;
        }else{
            $font_family = '';
        }
        if (!empty($imagePanel->imageStorage)){
            $image = $imagePanel->imageStorage;
        }
        elseif (!empty($imagePanel->imagePath)){
            $image = $util->toImage($imagePanel->imagePath);
        }
        elseif (!empty($imagePanel->image)){
            $image = $util->toImage($imagePanel->image);
        }
        else{
            $image = NULL;
        }
@endphp
{{-------------------------------}}
@if(!empty($imagePanel) && !empty($image))
<div id="ImagePanel" class="{{$imageClass}} px-0 shadow" data-ride="carousel" style="border-bottom:1px solid #cccccc;">
<div class="carousel-inner pl-0 pr-0 ">
<div class="carousel-item active">

 {{--Image bacground component Imagepanel ====================================--}}
    <img src="{{$image}}" class="img-fluid w-100">

    <div class="container-xl">
        @php
            if(!empty($imagePanel->fontColor) && strtoupper($imagePanel->fontColor) == "#FFFFFF"){
                $fontColor = 'color:white; text-shadow: 2px 2px 3px #6E6E6E;';
                $btnColor = 'btn-outline-light';
                $imagebutton = 'imagebutton';
            }elseif(!empty($imagePanel->fontColor) && $imagePanel->fontColor == 'white'){
                $fontColor = 'color:' . $imagePanel->fontColor . '; text-shadow: 2px 2px 3px #6E6E6E;';
                $btnColor = 'btn-outline-light';
                $imagebutton = 'imagebutton';
            }elseif(!empty($imagePanel->fontColor) && $imagePanel->fontColor != 'white'){
                $fontColor = 'color:' . $imagePanel->fontColor . '; text-shadow: 2px 2px 3px #c0c0c0;';
                $btnColor = 'btn-outline-dark';
                $imagebutton = 'imagebutton-dark';
            }else{
                $fontColor = 'color:white; text-shadow: 2px 2px 3px #6E6E6E;';
                $btnColor = 'btn-outline-light';
                $imagebutton = 'imagebutton';
            }
            if (!empty($imagePanel->title)){
                $title = $imagePanel->title;
            }else{
                $title = NULL;
            }
            if (!empty($imagePanel->legend)){
                $legend = $imagePanel->legend;
            }else{
                $legend = NULL;
            }
            if (!empty($imagePanel->route)){
                $route = $util->toRoute($imagePanel->route);
            }else{
                $route = '#';
            }
            if (!empty($imagePanel->btnLabel)){
                $btnLabel = $imagePanel->btnLabel;
            }else{
                $btnLabel = NULL;
            }

        @endphp
        {{--content components Imagepanel ====================================--}}
        {{--@props(['textAlign', 'title', 'text', 'btnLabel', 'btnColor', 'route', 'imagebutton', 'fontColor', 'font_family', 'font_family_title'])--}}
        @include('laraflex::ComponentParts.imagepanel.content')

    </div>
</div>
</div>
</div>

@else
 {{--messageNull component Blogcardes ==========================================--}}
<x-laraflex::shared.messagenull />

@endif

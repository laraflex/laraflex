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

@if(!empty($imagePanel) && !empty($imagePanel->image))
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
@endphp
{{-------------------------------}}

<div id="ImagePanel" class="{{$imageClass}} px-0 shadow" data-ride="carousel" style="border-bottom:1px solid #cccccc;">
<div class="carousel-inner pl-0 pr-0 ">
<div class="carousel-item active">
    @php 
    if (!empty($imagePanel->imagePath)){
        $image = $util->toImage($imagePanel->imagePath, $imagePanel->image);
    }else{
        $image = $util->toImage($imagePanel->image);
    }
    @endphp

    <img src="{{$image}}" class="img-fluid w-100">
    <div class="container-xl">
        @php
            if(!empty($imagePanel->fontColor) && strtoupper($imagePanel->fontColor) == "#FFFFFF"){
                $fontColor = 'color:white; text-shadow: 2px 2px 3px #6E6E6E;';
                $btnColor = 'btn-outline-light';
                $imagebutton = 'imagebutton';
            }elseif(!empty($imagePanel->fontColor) && $imagePanel->fontColor != 'white'){
                $fontColor = 'color:' . $imagePanel->fontColor . '; text-shadow: 2px 2px 3px #FFFFFF;';
                $btnColor = 'btn-outline-dark';
                $imagebutton = 'imagebutton-dark';
            }else{
                $fontColor = 'color:white; text-shadow: 2px 2px 3px #6E6E6E;';
                $btnColor = 'btn-outline-light';
                $imagebutton = 'imagebutton';
            }
        @endphp
        <div class="carousel-caption {{$textAlign}} pxx-0 pxx-lg-2  px-xl-5 pb-2 pb-lg-3 pb-xl-5">
            @if(!empty($imagePanel->title))
        <div style="{{$fontColor}} font-size:calc(1.1em + 1.3vw);{{$font_family_title}}"><span translate="no">{{$imagePanel->title}}</span></div>
            @endif
            @if(!empty($imagePanel->text))
            @php
                $num_char = strlen($imagePanel->text);
                if ($num_char > 110){
                    $imagePanel->text = substr($imagePanel->text, 0, 115) . "...";
                }
            @endphp
            <div class="d-none d-sm-block imagepanel-shared mb-1 mb-md-2 mb-xl-3 mt-0 mt-sm-1 mt-md-2 mt-lg-3" style="{{$fontColor}};line-height:calc(0.96em + 0.9vw); font-size:calc(0.85em + 0.4vw);{{$font_family}}"><span spantranslate="no">{{$imagePanel->text}}</span></div>
            @endif
            @if($imagePanel->btnLabel)
            <p><a class="imagepanel-shared btn mt-2 px-3 mt-0 mt-sm-2 mt-md-3 mt-lg-4 {{$btnColor}}" href="{{$util->toRoute($imagePanel->route)}}" id="{{$imagebutton}}" role="button">{{$imagePanel->btnLabel}}</a></p>
            @endif
        </div>
    </div>
</div>
</div>
</div>
@endif

@php
if (!empty($objectHeader)){
    $imagePanel = $objectHeader;
}
if(!empty($imagePanel->imageClass) && $imagePanel->imageClass == "container"){
    $imageClass = "container";
}else{
    $imageClass = "";
}
if(!empty($imagePanel->textAlign)){
    $textAlign = 'text-' . $imagePanel->textAlign;
}else{
    $textAlign = 'text-left';
} 
    
@endphp

@if(!empty($imagePanel))
<div id="ImagePanel" class="d-none d-lg-block" data-ride="carousel" style="border-bottom:1px solid #cccccc;background-image:url('{{$util->toImage($imagePanel->imagePath, $imagePanel->image)}}');background-repeat:round">
<div class="carousel-inner pl-0 pr-0 {{$imageClass}}">
<div class="carousel-item active">
    <img src="{{$util->toImage($imagePanel->imagePath, $imagePanel->image)}}" class="img-fluid w-100">
    <div class="container" >
        @php 
            if(!empty($imagePanel->fontColor) && $imagePanel->fontColor != 'white'){
                $fontColor = 'color:' . $imagePanel->fontColor;
                $btnColor = 'btn-outline-secondary';
            }else{
                $fontColor = 'color:white';
                $btnColor = 'btn-outline-light';
            }
        @endphp  
        <div class="carousel-caption {{$textAlign}} px-lg-0  px-xl-5 pb-lg-0 pb-xl-5">
            @if(!empty($imagePanel->title))
            <h1 style="text-shadow: 2px 2px 2px #6E6E6E;font-weightx:normal; {{$fontColor}}">{{$imagePanel->title}}</h1>
            @endif
            @if(!empty($imagePanel->text))
            <h5 style="{{$fontColor}}">{{$imagePanel->text}}</h5>
            @endif
            @if($imagePanel->btnLabel)
            <p><a class="btn mt-2 {{$btnColor}}" href="{{$util->toRoute($imagePanel->route)}}" role="button">{{$imagePanel->btnLabel}}</a></p>
            @endif
        </div>
    </div>
</div>
</div>
</div>
@endif
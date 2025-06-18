@php
if (!empty($objectHeader)){
    $carousel = $objectHeader;
}
@endphp
@if (!empty($carousel->images))
@php

    if (!empty($defaultConfig['transparentTheme']) && $defaultConfig['transparentTheme'] == true){
        $carouselHeight = 'height: calc(8rem + 38vw);';
    }else{
        $carouselHeight = 'height: calc(8rem + 33vw);'; //'height: 36rem;';
    }
    $fontSizeTitle = 'font-size:calc(0.5em + 2.3vw);';

    if (!empty($carousel->fontColor)) {

            if ($carousel->fontColor == 'white' OR $carousel->fontColor == '#FFFFFF'){
                $fontStyleColor = 'color: #FFFFFF; text-shadow: 2px 2px 2px #272424;';
                $btnClassStyle = 'btn-light';
                $btnColor = '';
            }elseif ($carousel->fontColor == 'dark' OR $carousel->fontColor == '#000000'){
                $fontStyleColor = 'color: #000000; text-shadow: 2px 2px 2px #8a8888;';
                $btnClassStyle = 'btn-dark';
                $btnColor = '';
            }else{
                $fontStyleColor = 'color:' . $carousel->fontColor . '; text-shadow: 2px 2px 2px #8a8888;';
                $btnClassStyle = 'btn-secondary';
                $btnColor = 'background-color:' .$carousel->fontColor. ';';
            }
    }else {
        $fontStyleColor = 'color: #FFFFFF; text-shadow: 3px 3px 2px #272424;';
        $btnClassStyle = 'btn-light';
        $btnColor = '';
    }
    $position = '';
    if (!empty($carousel->position)){
        if ($carousel->position == 'left'){
            $position = 'text-start';
        }elseif($carousel->position == 'right'){
            $position = 'text-end';
        }
    }
@endphp

<div id="myCarousel" class="carousel slide mb-0 mb-md-2" data-bs-ride="carousel" style="z-index:0">
    {{--CONTENT ITEMS OF CAROUSEL--}}
    <div class="carousel-inner">
        @foreach ($carousel->images as $key => $images)
        @php
            $bgImage = 'background-image: url(' . $util->toImage($images) . '); background-size:cover;';
            if ($key == 0){
                $active = 'active';
            }else{
                $active = '';
            }
        @endphp
        <div class="carousel-item mb-1 mb-md-1 {{$active}}" style="{{$bgImage}} {{$carouselHeight}}">
        <div class="container" style="z-index:10">
        <div class="carousel-caption {{$position}}">
        @if (!empty($carousel->titles[$key]))
            <div class="" style="{{$fontStyleColor}} {{$fontSizeTitle}}">{{$carousel->titles[$key]}}.</div>
        @if (!empty($carousel->legends[$key]))
            <p class="d-none d-sm-block" style="{{$fontStyleColor}}">{{$carousel->legends[$key]}}.</p>
            <div class="p-2 p-md-3 p-lg-4 d-block d-sm-none"></div>
        @else
        <div class="p-2 p-md-3 p-lg-4"></div>
        @endif
        @if (!empty($carousel->routes[$key]))
        @php
            $route = $util->toRoute($carousel->routes[$key]);
        @endphp
            <p><a class="btn {{$btnClassStyle}}" href="{{$route}}" style="{{$btnColor}}">{{__('know more')}}</a></p>
        @else
        <div class="p-3 p-lg-4"></div>
        @endif
        @endif
        <div class="p-0 p-md-2 p-lg-4"></div>
        </div>
        </div>
        </div>
        @endforeach
    </div>
    {{--END CONTENT ITEMS OF CAROUSEL--}}

<button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="visually-hidden">Previous</span> </button>
<button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="visually-hidden">Next</span> </button>
</div>

@endif

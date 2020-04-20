@if (!empty($objeto))
@php
    $lightbox = $objeto;
@endphp
@elseif(!empty($object))
@php
    $lightbox = $object;
@endphp
@endif

@if (!empty($lightbox) && !empty($lightbox->items))

@php
    if (!empty($lightbox->fontFamily->title)){
        $font_family_title = 'font-family:'.$lightbox->fontFamily->title .';';
    }else{
        $font_family_title = '';
    }
    if (!empty($lightbox->fontFamily->shared)){
        $font_family = 'font-family:'.$lightbox->fontFamily->shared .';';
    }else{
        $font_family = '';
    }
@endphp


<section id="lightbox" class="mb-3">

@if(!empty($lightbox->title))
<div class="lightbox-title text-center pt-3 pb-0" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
{{$lightbox->title}}</div>
@endif
@if (!empty($lightbox->legend))
    <div class="lightbox-shared text-center mt-1" style="font-size:calc(0.76em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
    <span style="color:gray">{{$lightbox->legend}}</span></div>
@endif


{{--<div class="justify-content-center pt-1 pt-sm-2 pb-2 mt-3 mb-4 {{$border}}">--}}
    @if (!empty($lightbox->border) && $lightbox->border === true)
    <div class="border rounded mt-3">
    @else
    <div class="mt-3">
    @endif


    <div class="row w-100 m-0 p-0">
    {{--Add items ------------------------------------------------}}
    @if(!empty($lightbox->items))
    @foreach($lightbox->items as $item)

    <div class="col-6 col-sm-4 col-lg-3 p-0 m-0">
    <div class="p-2 p-md-3 m-1 mb-2 mb-md-3{{$border}}">

    <a href="{{$util->toPath($lightbox->imagePath, $item->image)}}" data-toggle="lightbox" data-gallery="gallery" class=" m-0">

    {{--Bloco de imagem ------------------------------------------------}}
    @if (!empty($lightbox->imagePath) && !empty($item->image))
    <img src="{{$util->toImage($lightbox->imagePath, $item->image)}}" class="img-fluid">
    @else
    <img src="{{$util->toImage('images/app', 'image-laracast.jpg')}}" class="img-fluid">
    @endif
    {{--End Bloco de imagem ------------------------------------------------}}

    @if(!empty($item->title) && in_array('title', $lightbox->showItems))
    <div class="lightbox-item-shared text-left text-dark mt-2 ml-1" style="font-size:calc(0.74em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
    {{$item->title}}</div>
    @endif
    @if(!empty($item->label) && in_array('label', $lightbox->showItems))
    <div class="lightbox-item-shared text-dark ml-1 mt-1" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
    <small>{{$item->label}}</small></div>
    @endif
    </a>
    </div>
    </div>
    @endforeach
    @endif
    {{--End items ------------------------------------}}
    </div>

    </div>
</section>
@else
@if (!empty($lightbox->nullable) && $lightbox->nullable === true)
    <div class="text-center mt-2 mb-2"></div>
@else
    <div class="text-center p-4 mt-3 mb-3 {{$border}}">
    <h5>{{ __('There are no items to display.') }}</h5>
    </div>
@endif
@endif

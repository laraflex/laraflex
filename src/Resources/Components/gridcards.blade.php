@if (!empty($objeto))
@php
    $gridcards = $objeto;
@endphp
@elseif(!empty($object))
@php
    $gridcards = $object;
@endphp
@endif

@if (!empty($gridcards) && !empty($gridcards->items))

@php
    if (!empty($gridcards->fontFamily->title)){
        $font_family_title = 'font-family:'.$gridcards->fontFamily->title .';';
    }else{
        $font_family_title = '';
    }
    if (!empty($gridcards->fontFamily->shared)){
        $font_family = 'font-family:'.$gridcards->fontFamily->shared .';';
    }else{
        $font_family = '';
    }
@endphp


<section id="gridcards" class="mb-2 mt-3">

@if(!empty($gridcards->title))
<div class="gridcards-title text-center pt-1 pb-0" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
{{$gridcards->title}}</div>
@endif
@if (!empty($gridcards->legend))
    <div class="gridcards-shared text-center" style="font-size:calc(0.76em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
    <span style="color:gray">{{$gridcards->legend}}</span></div>
@endif

    @if (!empty($gridcards->border) && $gridcards->border === true)
    <div class="border rounded mt-3">
    @else
    <div class="mt-3">
    @endif



    <div class="row w-100 m-0 p-0">
    {{--Add items ------------------------------------------------}}
    @if(!empty($gridcards->items))
    @foreach($gridcards->items as $item)



    <div class="col-6 col-sm-4 col-lg-3 p-0 m-0">
        <div class="p-2 p-md-3 m-1 mb-2 mb-md-3 {{$border}}">




    {{--Bloco de imagem ------------------------------------------------}}
    @if (!empty($gridcards->imagePath) && !empty($item->image))
    {{--<div style="height:calc(10vw); background-image: url('{{$util->toImage($gridcards->imagePath, $item->image)}}');background-size:cover"></div>--}}
    <img src="{{$util->toImage($gridcards->imagePath, $item->image)}}" class="img-fluid" ">
    @else
    <img src="{{$util->toImage('images/app', 'image-laracast.jpg')}}" class="img-fluid">
    @endif
    {{--End Bloco de imagem ------------------------------------------------}}

    @if(!empty($item->title))
    <div class="gridcards-item-shared text-left text-dark mt-2 ml-1" style="font-size:calc(0.76em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
    {{$item->title}}</div>
    @endif


    @if(!empty($item->label))
    <div class="gridcards-item-shared text-dark ml-1 mt-1" style="font-size:calc(0.70em + 0.3vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
    <small>{{$item->label}}</small></div>
    @endif


    {{--Button --------------------}}
    @if (!empty($gridcards->route))
        @php
           if (!empty($gridcards->target) && $gridcards->target == 'blank'){
               $target = 'target="_blank"';
           }else{
               $target = '';
           }
        @endphp
    <a class="btn btn-sm btn-outline-secondary mt-2" href="{{$util->toRoute($gridcards->route, $item->id)}}" role="button" rel="noopener noreferrer" {!!$target!!}>{{__('Read more')}}</a>
    @endif
    {{--End button ----------------}}

    </div>
    </div>
    @endforeach
    @endif
    {{--End items ------------------------------------}}
    </div>

    {{--button read more-------------------------------}}
    @if (!empty($gridcards->readMore->label) && !empty($gridcards->readMore->route))
    <div class="text-center mt-3">
    <a class="btn btn-sm btn-outline-secondary mb-4 px-5" href="{{$util->toRoute($gridcards->readMore->route)}}" role="button">{{$gridcards->readMore->label}}</a>
    </div>
    @endif
    {{--End button read more --------------------------}}

    </div>
</section>
@else
@if (!empty($gridcards->nullable) && $gridcards->nullable === true)
    <div class="text-center mt-2 mb-2"></div>
@else
    <div class="text-center p-4 mt-3 mb-3 {{$border}}">
    <h5>{{ __('There are no items to display.') }}</h5>
    </div>
@endif
@endif

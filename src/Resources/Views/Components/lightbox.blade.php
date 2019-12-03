@if (!empty($objeto))
@php
    $lightbox = $objeto;
@endphp
@elseif(!empty($object))
@php
    $lightbox = $object;
@endphp
@endif

@if (!empty($lightbox))

<section id="lightbox">

<div class="justify-content-center pt-3 pb-2 mt-3 mb-4 hiflex {{$border}}">
    @if(!empty($lightbox->title))
    <h3 class="text-center pt-2 pb-3">{{$lightbox->title}}</h3>
    @endif
    {{----------------------------------------}}
    @if(!empty($lightboxMessage))
    <h6 class="pb-3 text-center ml-3 mr-3">{{$lightboxMessage}}</h6>
    @endif
    @if(!empty($lightboxAlert))
    @php
    $alertColor = 'alert-primary';
    $color = array('primary', 'secundary', 'success', 'danger', 'warning', 'info', 'light', 'dark');
    if($colorTmp = stristr($lightboxAlert, ':')){
    $lightboxAlert =  str_replace($colorTmp, '', $lightboxAlert);
    $colorTmp = str_replace(':', '', $colorTmp);
    if(in_array($colorTmp, $color)){
        $alertColor = 'alert-' . $colorTmp;
    }
    }
    @endphp
    <div class="alert ml-3 mr-3 {{$alertColor}}" role="alert">
    {{$lightboxAlert}}
    </div>
    @endif
    {{-------------------------------------------}}
    <div class="ml-3 mr-3">
    <div class="row w-100 ml-0 p-1">
    {{--Add items ------------------------------------------------}}
    @if(!empty($lightbox->items))
    @foreach($lightbox->items as $item)
    {{--Movies for youtube ------------------}}
    @if(!empty($item->media) && $item->media == 'youtube')
    <a href="{{$item->url}}" data-toggle="lightbox" data-width="1280" data-gallery="media" class="col-6 col-sm-3 border p-1 m-0">
    {{--Movies for Vimeo ---------------------}}
    @elseif(!empty($item->media) && $item->media == 'vimeo')
        @php
            $codeVimeo = substr($item->url, 18);
            $player = 'https://player.vimeo.com/video/' . $codeVimeo;
        @endphp
    <a href="{{$item->url}}" data-remote="{{$player}}" data-toggle="lightbox" data-width="1280" data-gallery="media" class="col-6 col-sm-3 border p-1 m-0">
    @else
    {{--For images ----------------------------}}
    <a href="{{$util->toPath($item->filePath, $item->fileName)}}" data-toggle="lightbox" data-gallery="gallery" class="col-6 col-sm-3 border p-1 m-0">
    @endif
    <img src="{{$util->toPath($item->filePath, $item->fileName)}}" class="img-fluid">
    @if(!empty($item->title))
    <div class="text-left text-dark mt-2 ml-1" style="line-height: 1.2">{{$item->title}}</div>
    @endif
    @if(!empty($item->label))
    <div class="text-dark ml-1"><small>{{$item->label}}</small></div>
    @endif
    </a>
    @endforeach
    @endif
    {{--End items ------------------------------------}}
    </div>
    </div>
    </div>
</section>
@endif

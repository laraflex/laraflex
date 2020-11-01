@if (!empty($objeto))
@php
    $mediacards = $objeto;
@endphp
@elseif(!empty($object))
@php
    $mediacards = $object;
@endphp
@endif
@if (!empty($mediacards) && !empty($mediacards->items))

@php
    if (!empty($mediacards->fontFamily->title)){
        $font_family_title = 'font-family:'.$mediacards->fontFamily->title .';';
    }else{
        $font_family_title = '';
    }
    if (!empty($mediacards->fontFamily->shared)){
        $font_family = 'font-family:'.$mediacards->fontFamily->shared .';';
    }else{
        $font_family = '';
    }
@endphp

@if (!empty($objectConfig->onePage) && $objectConfig->onePage === true)
    <section id="mediacards" class="m-0 p-0 mx-0 pb-3 pb-lg-4 pt-1 pt-sm-2">
@else
    <section id="mediacards" class="m-0 p-0 mx-0 pb-3 pb-sm-3 pt-1 pt-sm-3">
@endif
<div class="container-xl px-0">
<div class="mx-0 mb-0 mt-1 px-2 px-lg-3 px-xl-0">
@if (!empty($mediacards->seeMore))
    <div class="row m-0 p-0">
        <div class="col-12 col-sm-9 p-0">
            @if(!empty($mediacards->title))
            <div class="mediacards-title text-left pt-3 pb-2 pl-3" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
            {{$mediacards->title}}</div>
            @if (!empty($mediacards->legend))
                <div class="mediacards-shared text-left pb-3 pl-3" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
                <span>{{$mediacards->legend}}</span></div>
            @endif
            @endif
        </div>
        <div class="col-0 col-sm-3 text-right p-0 pr-2 d-none d-sm-block align-text-bottomx" style="width: 100%;">
            @if(!empty($mediacards->legend) && !empty($mediacards->title))
            <div class="py-2 mb-sm-1 py-xl-2"></div>
            <div class="pt-1 pt-md-2 pt-lg-3 pr-3 pr-lg-4 align-text-bottom" style="height: 100%;">
            <a href="{{$util->toRoute($mediacards->seeMore)}}" class="btn btn-dark m-0">
            {{__('See more')}}
            </a>
            </div>
            @else
            <div class="pb-sm-3 pt-1 pt-md-2 pt-lg-3 pr-3 pr-lg-4 align-text-bottom" style="height: 100%;">
            <a href="{{$util->toRoute($mediacards->seeMore)}}" class="btn btn-dark m-0">
            {{__('See more')}}
            </a>
            </div>
            @endif

        </div>
    </div>

<div class="mt-0">

@elseif(!empty($mediacards->title))
<div class="mediacards-title text-center pt-2 pb-2" style="font-size:calc(1.1em + 0.6vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
{{$mediacards->title}}</div>

@if (!empty($mediacards->legend))
    <div class="mediacards-shared text-center pb-2" style="font-size:calc(0.76em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
    <span style="color:gray">{{$mediacards->legend}}</span></div>
@endif
<div class="mt-3">
@endif

@php
if (!empty($mediacards->styles->margin) && $mediacards->styles->margin === true){
    $imageMargin = 'mx-2 mt-2';
}else{
    $imageMargin = '';
}

    $visibility = ['d-block ', 'd-block ', 'd-block ', 'd-block', 'd-none d-sm-block d-lg-none', 'd-none d-sm-block d-lg-none'];
    $array_margin_bottom = ['mb-3 mb-lg-0','mb-3 mb-lg-0','mb-sm-3 mb-lg-0','mb-0', 'mb-0','mb-0'];
    $margin_bottom = 'mb-2 mb-md-3';
    $num_limit = 6;
    $showLimit = false;

    if (!empty($mediacards->seeMore)){
        $showLimit = true;
    }else{
        $showLimit = false;
    }

@endphp

    <div class="row w-100 m-0 p-0">
    {{--Add items ------------------------------------------------}}
    @if(!empty($mediacards->items))
    @foreach($mediacards->items as $key => $item)

    @php
    if ($showLimit === true && $key >= $num_limit){
    break;
    }

    if ($showLimit === true){
        $margin_bottom = $array_margin_bottom[$key];
    }
    @endphp

    @if (!empty($mediacards->styles->bgEffect)  && $mediacards->styles->bgEffect)
    <div id="mediacards-box" class="col-6 col-sm-4 col-md-4 col-lg-3  {{$margin_bottom}} p-0">
    @else
    <div id="mediacards-box-default" class="col-6 col-sm-4 col-md-4 col-lg-3  {{$margin_bottom}} p-0">
    @endif
    @if (!empty($item->url))
    {{--Movies for youtube ------------------}}
    @if(!empty($item->media) && $item->media == 'youtube')
    <a href="{{$item->url}}" data-toggle="lightbox" data-width="1280" data-gallery="media" class=" m-0">
    {{--Movies for Vimeo ---------------------}}
    @elseif(!empty($item->media) && $item->media == 'vimeo')
        @php
            $codeVimeo = substr($item->url, 18);
            $player = 'https://player.vimeo.com/video/' . $codeVimeo;
        @endphp
    <a href="{{$item->url}}" data-remote="{{$player}}" data-toggle="lightbox" data-width="1280" data-gallery="media" class=" m-0">
    @endif
    @else
    <a>
    @endif

    @if ($showLimit === true)
    <div class="mx-1 h-100 pb-3 {{$border}} {{$visibility[$key]}}">
    @else
    <div class="mx-1 h-100 pb-3 {{$border}}">
    @endif
        {{--Bloco de imagem ------------------------------------------------}}


        @if (in_array('image', $mediacards->showItems))
        @php
        if (!empty($item->imageStorage)){
            $image = $item->imageStorage;
        }
        elseif (!empty($item->imagePath)){
            $image = $util->toImage($item->imagePath);
        }
        elseif (!empty($item->image)){
            $image = $util->toImage($item->image);
        }else{
            $image = $util->toImage('local/images/app/foto01.jpg');
        }
        @endphp

        <div class="{{$imageMargin}}" style="background-color:#000000;">
        <img src="{{$image}}" class="mediacards-img img-fluid">
        <img class="icon_play_mediacards rounded-circle" src="{{$util->toImage('local/images/icons','black_white_play.png')}}" style="top:26%;"/>
        </div>
        @else
        <div class="{{$imageMargin}}" style="background-color:#000000;">
        <img src="{{$util->toImage('local/images/app','foto01.jpg')}}" class="mediacards-img img-fluid">
        <img class="icon_play_mediacards rounded-circle" src="{{$util->toImage('local/images/icons','black_white_play.png')}}" style="top:26%;"/>
        </div>
        @endif
        {{--End Bloco de imagem ------------------------------------------------}}
        <div class="px-2 px-md-3 pt-2 pt-md-2">
        @if(!empty($item->title) && in_array('title', $mediacards->showItems))
        <div class="mediacards-item-shared text-left text-dark mt-2 ml-1" style="font-size:calc(0.76em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
        {{$item->title}}</div>
        @endif
        @if(!empty($item->label) && in_array('label', $mediacards->showItems))
        <div class="mediacards-item-shared text-dark ml-1 mt-1" style="font-size:calc(0.70em + 0.3vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
        <small>{{$item->label}}</small></div>
        @endif
        {{--Adicionando rating --------------------------------------------------}}
        @if(!empty($item->rating) && in_array('rating', $mediacards->showItems))
        <div class="pt-2 pl-1" style="font-size:calc(11px + 0.25vw);line-height:1.3;color:#000000;{{$font_family}}">
        {{$item->rating}}
        @for ($i = 1; $i <= intval($item->rating); $i++)
        <img src="{{$util->toImage('local/images/icons', 'star.png')}}" width="13px" height="12px" class="m-0 mb-1" />
        @endfor
        @if ($item->rating != intval($item->rating))
        <img src="{{$util->toImage('local/images/icons', 'starsmall.png')}}" width="13px" height="12px" class="m-0 mb-1" />
        @endif
        </div>
        @endif
        {{--Fim de rating --------------------------------------------------------}}
        </div>
    </div>
    </a>
    </div>
    @endforeach
    @endif
    {{--End items ------------------------------------}}
    </div>

    {{--Bloco de see more ---------------------------}}
    @if (!empty($mediacards->seeMore))
    <div class="pl-3 pl-lg-4 mt-3 d-block d-sm-none">
        <a href="{{$util->toRoute($mediacards->seeMore)}}" class="btn btn-sm btn-dark m-0">
        <span class="px-2">{{__('See more')}}</span>
        </a>
    </div>
    {{--pagination--------------------------------------}}
    @elseif (!empty($mediacards->paginate))
    <div id="default-paginator" class="text-center nav justify-content-center pt-sm-2" aria-label="Page" translator>
    {!!$mediacards->paginate->links('components.bootstrap')!!}
    </div>
    @endif
    {{--Fim de bloco seeMore--}}

    </div>
    </div>
    {{--Icon de retorno ao topo da página--}}
    @if (!empty($objetoConfig->onePage) && $objetoConfig->onePage === true)
    <div class="w-100 pb-sm-3 pt-sm-3 d-none d-sm-block pl-5 container-xl">
    <a href="#top">
    <img src="{{$util->toImage('local/images/icons', 'setadupla.png')}}" width="26" height="26" class="float-left rounded d-block">
    </a>
    </div>
    @endif
    {{--End Icon de retorno ao topo da página--}}

    </div>
</section>
@else
@if (!empty($mediacards->nullable) && $mediacards->nullable === true)
    <div class="text-center mt-2 mb-2"></div>
@else
<div class="container-xl px-3 mt-4 pb-2" translation="no">
    <div class="alert alert-primary {{$border}}" role="alert">
    <div class="content-message alert-heading" style="font-size:calc(0.85em + 0.4vw)"><strong>{{__('Message')}}!</strong></div>
    <hr class="d-none d-sm-block">
    <div class="mb-0" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.18vw);">{{ __('There are no items to display.') }}</div>
    </div>
</div>
@endif
@endif

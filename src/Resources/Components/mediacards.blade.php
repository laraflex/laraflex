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
{{--SEEMORE COMPONENT MEDIACARDS ============================================--}}
@include('laraflex::ComponentParts.mediacards.seemore')

@elseif(!empty($mediacards->title))
{{--TITLE COMPONENT MEDIACARDS ============================================--}}
@include('laraflex::ComponentParts.mediacards.title')

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
    {{--ADD IMAGES IN COMPONENT MEDIACARDS ============================================--}}
    @include('laraflex::ComponentParts.mediacards.image')

    {{--ADD MEDIAITEMS IN COMPONENT MEDIACARDS ============================================--}}
    @include('laraflex::ComponentParts.mediacards.mediaitems')

    </div>
    </a>
    </div>
    @endforeach
    @endif
    {{--End items ------------------------------------}}
    </div>

{{--Icon de retorno ao topo da página--}}
@if (!empty($mediacards->onePage) && $mediacards->onePage === true)
{{--ONEPAGE COMPONENT SHARED ============================================--}}
@include('laraflex::ComponentParts.shared.onepage')

@endif

    {{--Bloco de see more ---------------------------}}
    @if (!empty($mediacards->seeMore))
    @php
        $seeMore = $mediacards->seeMore;
    @endphp
     {{--@props(['seeMore'])--}}
     <x-laraflex::shared.seemore :seeMore="$seeMore" />

    {{--pagination--------------------------------------}}
    @elseif (!empty($mediacards->paginate))
    @php
        $paginates = $gridcards->paginate->links('components.bootstrap');
    @endphp
    {{--@props(['paginates'])--}}
    <x-laraflex::shared.paginate :paginates="$paginates" />

    @endif
    </div>
    </div>






    {{--End Icon de retorno ao topo da página--}}
</div>
</section>
@else
@if (!empty($mediacards->nullable) && $mediacards->nullable === true)
    <div class="text-center mt-2 mb-2"></div>
@else
{{--messageNull component Blogcardes ==========================================--}}
<x-laraflex::shared.messagenull />

@endif
@endif

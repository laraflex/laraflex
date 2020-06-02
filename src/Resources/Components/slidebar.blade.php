@if (!empty($objeto))
    @php
        $slidebar = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $slidebar = $object;
    @endphp
@endif

@if (!empty($slidebar) && !empty($slidebar->items))
    @php
    if (!empty($slidebar->fontFamily->title)){
        $font_family_title = 'font-family:'.$slidebar->fontFamily->title .';';
    }else{
        $font_family_title = '';
    }
    if (!empty($slidebar->fontFamily->shared)){
        $font_family = 'font-family:'.$slidebar->fontFamily->shared .';';
    }else{
        $font_family = '';
    }

    @endphp
{{--
<section id="table" class="pb-1 pt-0 mt-3 pb-3 mb-2">
<div class="container-xl px-0">
<div class="mx-0 pb-0 mt-1 px-2 px-lg-3 px-xl-0">
--}}

@if (!empty($objectConfig->onePage) && $objectConfig->onePage === true)
    <section id="slidebar" class="m-0 p-0 mx-0 pb-2 pb-sm-3 pt-1 pt-sm-2">
@else
    <section id="slidebar" class="m-0 p-0 mx-0 pb-2 pb-sm-2 pt-1 pt-sm-3">
@endif

<div class="container-xl px-0">
<div class="mx-0 mb-0 pt-sm-2 px-2 px-lg-3 px-xl-0 pb-3">

@if (!empty($slidebar->seeMore))
<div class="row">
<div class="col-12 col-sm-8">
    @if(!empty($slidebar->title))
    <div class="slidebar-title text-left pb-2 pb-lg-2 pl-2" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
    {{$slidebar->title}}</div>
    @endif
    @if (!empty($slidebar->legend))
    <div class="slidebar-shared text-left pb-2 pl-2" style="font-size:calc(0.78em + 0.29vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
    <span style="color:gray">{{$slidebar->legend}}</span></div>
    @endif
</div>

    <div id="btn-flex" class="slidebar-btn-flex col-sm-4 text-right d-none d-sm-block">
        @if(!empty($slidebar->legend) && !empty($slidebar->title))
            <div class="pt-2 pt-lg-2 pt-xl-3"></div>
            <div class="pr-3 pr-lg-4 align-text-bottom" style="height: 100%;">
            <a href="{{$util->toRoute($slidebar->seeMore)}}" class="btn btn-dark m-0">
            {{__('See more')}}
            </a>
            </div>
            @else
            <div class=" pb-2 pt-md-2x pt-lg-3x pr-3 pr-lg-4 align-text-bottom" style="height: 100%;">
            <a href="{{$util->toRoute($slidebar->seeMore)}}" class="btn btn-dark m-0">
            {{__('See more')}}
            </a>
            </div>
        @endif

    </div>
</div>
@else
    @if(!empty($slidebar->title))
    <div class="slidebar-title text-center pt-2 pb-2" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
    {{$slidebar->title}}</div>
    @endif
    @if (!empty($slidebar->legend))
    <div class="slidebar-shared text-center pb-2" style="font-size:calc(0.78em + 0.29vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
    <span style="color:gray">{{$slidebar->legend}}</span></div>
    @endif
@endif
    {{--<div class="mt-0 border rounded shadow">--}}
    <div id="js_variablewidth" class="slider js_variablewidth variablewidth p-0 mb-0 mt-1">
    <div class="frame js_frame p-0 m-0">
    <ul class="slides js_slides p-0 m-0">
    @if (!empty($slidebar->items))
    @foreach($slidebar->items as $item)
    <li class="js_slide align-top {{$border}}">
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

    <div class="slideItem h-100 " style="background-image: url('{{$util->toImage($slidebar->imagePath, $item->image)}}');background-size:cover;">
    <div class="slide-bgcolor h-100">
    <div class="p-2 w-100 m-0" style="white-spacex: pre-line; background-color: rgb(0,0,0,0.4); font-size: calc(0.8em + 0.3vw); line-height: 1.3;">
    <span style="white-space: pre-line;"">{{$item->title}}</span>
    </div>
    </div>
    </div>
    </a>
    <img class="icon_play rounded-circle" src="images/icons/black_white_play.png" />
    </li>
    @endforeach
    @endif
    </ul>
    </div>
    <span class="js_prev prev mr-0 pr-0 "><span class="badge badge-pill badge-light" style="background-color:rgb(255,255,255,0.6)">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 501.5 501.5"><g><path fill="#2E435A" d="M302.67 90.877l55.77 55.508L254.575 250.75 358.44 355.116l-55.77 55.506L143.56 250.75z"/></g></svg></span>
    </span>
    <span class="js_next next mr-0 pr-0"><span class="badge badge-pill badge-light" style="background-color:rgb(255,255,255,0.6)">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 501.5 501.5"><g><path fill="#2E435A" d="M199.33 410.622l-55.77-55.508L247.425 250.75 143.56 146.384l55.77-55.507L358.44 250.75z"/></g></svg></span>
    </span>
    </div>
@if (!empty($slidebar->seeMore))
<div class="slidebar-btn-flex pt-3 d-block d-sm-none pl-2">
<a href="{{$util->toRoute($slidebar->seeMore)}}" class="btn btn-dark btn-md px-3 py-1" role="button" aria-pressed="true">{{ __('See more') }}</a>
</div>
{{--pagination--------------------------------------}}
@elseif (!empty($slidebar->paginate))
<div id="default-paginator" class="text-center nav justify-content-center pt-sm-2" aria-label="Page" translator>
{!!$slidebar->paginate->links()!!}
</div>

{{--End Pagination----------------------------------}}
@endif
</div>
</div>

{{--Icon de retorno ao topo da página--}}
@if (!empty($objetoConfig->onePage) && $objetoConfig->onePage === true)
<div class="w-100 pb-sm-3 d-none d-sm-block pl-5 container-xl">
    <a href="#top">
    <img src="{{$util->toImage('images/icons', 'setadupla.png')}}" width="26" height="26" class="float-left rounded d-block">
    </a>
    </div>
@endif
{{--End Icon de retorno ao topo da página--}}

</section>

@else
@if (!empty($slidebar->nullable) && $slidebar->nullable === true)
    <div class="text-center mt-2 mb-2"></div>
@else
    <div class="text-center p-4 mt-3 mb-3 {{$border}}">
    <h5>{{ __('There are no items to display.') }}</h5>
    </div>
@endif
@endif

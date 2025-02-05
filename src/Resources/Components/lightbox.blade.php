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
    $lightbox_text_align = 'text-center';
    if (!empty($lightbox->showLimit) && $lightbox->showLimit){
        $lightbox_text_align = 'text-right';
    }
    if (empty($lightbox->paginate)){
        $seeMore = true;
    }

    $margen_bottom = '';
@endphp

@if (!empty($objectConfig->onePage) && $objectConfig->onePage === true)
    <section id="lightbox" class="m-0 p-0 mx-0 pb-2 pb-sm-3 pt-1 pt-sm-3 mt-2">
@else
    <section id="lightbox" class="m-0 p-0 mx-0 pb-2 pb-sm-2 pt-1 pt-sm-3 mt-2">
@endif

@if (empty($lightbox->cssClass) OR $lightbox->cssClass == 'container')
<div class="container-xl px-0">
@else
<div class="px-2">
@endif
<div class="mx-0 mb-0 px-2 px-lg-3 px-xl-0">

@if (!empty($seeMore))
<div class="row m-0 p-0">
    <div class="col-12 col-sm-9 p-0">
        @if(!empty($lightbox->title))
        <div class="lightbox-title text-left pb-2 pl-3" style="font-size:calc(0.9em + 0.8vw);{{$font_family_title}}">
        {{$lightbox->title}}</div>
        @if (!empty($lightbox->legend))
            <div class="lightbox-shared text-left pb-3 pl-3" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
            <span>{{$lightbox->legend}}</span></div>
        @endif
        @endif
    </div>
<<<<<<< HEAD

=======
    {{--
    <div class="col-0 col-sm-3 text-right pr-2 d-none d-sm-block     " style="width: 100%;">
        @if(!empty($lightbox->legend) && !empty($lightbox->title))
            <div class="pt-0 pt-sm-2 mb-sm-1 py-xl-2"></div>
            <div class="pt-sm-1 pt-lg-2 pt-xl-1 pr-3 pr-lg-4 align-text-bottom" >
            <a href="{{$util->toRoute($lightbox->seeMore)}}" class="btn btn-dark m-0">
            {{__('See more')}}
            </a>
            </div>
            @else
            <div class=" pt-0 pt-md-0 pt-lg-1 pr-3 pr-lg-4 align-text-bottom">
            <a href="{{$util->toRoute($lightbox->seeMore)}}" class="btn btn-dark m-0 mb-sm-3">
            {{__('See more')}}
            </a>
            </div>
        @endif

    </div>
    --}}
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da
</div>
@else
    @if(!empty($lightbox->title))
    <div class="lightbox-title {{$lightbox_text_align}} pt-0 pb-0 pb-sm-2 px-3" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
    {{$lightbox->title}}</div>
    @if (!empty($lightbox->legend))
        <div class="lightbox-shared {{$lightbox_text_align}} p-2 pb-sm-3 px-3" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
        <span>{{$lightbox->legend}}</span></div>
    @endif
    @endif
@endif
    @if (!empty($lightbox->border) && $lightbox->border === true)
    <div class="border rounded mt-0">
    @else
    <div class="mt-0">
    @endif
    <div class="row w-100 m-0 p-0">
    {{--Add items ------------------------------------------------}}
    @if(!empty($lightbox->items))
    @php
        $visibility = ['d-block', 'd-block', 'd-block', 'd-block', 'd-none d-sm-block d-lg-none', 'd-none d-sm-block d-lg-none'];
        $num_limit = 6;
        $num_items = collect($lightbox->items)->count();
        if ($num_items >= 8){
            $visibility = ['d-block', 'd-block', 'd-block', 'd-block', 'd-none d-sm-block ', 'd-none d-sm-block', 'd-none d-lg-block', 'd-none d-lg-block'];
            $num_limit = 8;
        }
        if (empty($objectConfig->contentClass) OR $objectConfig->contentClass == 'container'){
            $column = 'col-6 col-sm-4 col-lg-3';
        }elseif (empty($lightbox->cssClass) OR $lightbox->cssClass == 'container'){
           $column = 'col-6 col-sm-4 col-lg-3';
        }else{
            $column = 'col-6 col-sm-4 col-lg-3 col-xl-2';
            $visibility = ['d-block', 'd-block', 'd-block', 'd-block', 'd-none d-sm-block d-lg-none d-xl-block', 'd-none d-sm-block d-lg-none d-xl-block'];
            $num_limit = 6;
        }

        $showLimit = false;
        if (!empty($seeMore)){
            $showLimit = true;
        }elseif(!empty($lightbox->showLimit) && $lightbox->showLimit === true){
            $showLimit = true;
        }
    @endphp
    {{--Rotina de renderização dos itens --}}
    @foreach($lightbox->items as $key => $item)

    @php
    if(!empty($item->title) && in_array('title', $lightbox->showItems)){
        $margen_grid = 'mb-2 mb-sm-3';
    }else{
        $margen_grid = 'mb-2';

    }
    if ($showLimit === true){
        if (!empty($num_limit) && $key >= $num_limit){
            $visibility[] = 'd-none';
        }
        if ($key < 4){
            $margen_bottom = $margen_grid;
        }elseif($key >= 4 && $key < 8){
            if ($key < 6){
                $margen_bottom = 'mb-0 mb-sm-3';
            }else{
                $margen_bottom = 'mb-0 mb-lg-3';
            }

        }else{
            $margen_bottom = 'mb-0';
        }
    }
    @endphp

    @if ($showLimit === true)
    <div class="{{$column}} p-0 {{$margen_bottom}}">
    <div class="mx-1 h-100 {{$border}} {{$visibility[$key]}}">
    @else
    <div class="{{$column}} p-0 mb-2 mb-sm-3">
    <div class="mx-1 h-100 {{$border}}">
    @endif
    @php
    if (!empty($lightbox->styles->margin) && $lightbox->styles->margin === true){
        $margin = 'm-2 m-md-3';
        $paddingText = 'pt-1 pt-md-0 pb-3';
    }else{
        $margin = '';
        $paddingText = 'pt-3 pb-3';
    }
    @endphp
    {{--Bloco de imagem ------------------------------------------------}}
    @if (!empty($lightbox->styles->bgEffect) && $lightbox->styles->bgEffect === true)
    <div class="lightboxPanel {{$margin}}" style="background-color: #000000;">
    @else
    <div class="{{$margin}}">
    @endif

    @if (!empty($item->imageStorage))
    <a href="{{$item->imageStorage}}" data-width="1280" data-toggle="lightbox" data-gallery="gallery">
    <img src="{{$item->imageStorage}}" class="img-fluid" />
    </a>
    @elseif (!empty($item->imagePath))
    <a href="{{$util->toPath($item->imagePath)}}" data-width="1280" data-toggle="lightbox" data-gallery="gallery">
    <img src="{{$util->toImage($item->imagePath)}}" class="img-fluid" />
    </a>
    @elseif(!empty($item->image))
    <a href="{{$util->toPath($item->image)}}" data-width="1280" data-toggle="lightbox" data-gallery="gallery">
    <img src="{{$util->toImage($item->image)}}" class="img-fluid" />
    </a>
    @endif

    </div>
    {{--End Bloco de imagem ------------------------------------------------}}

    {{--Bloco complementar --------}}
    @if(!empty($item->title) && in_array('title', $lightbox->showItems))
    <div class="px-3 {{$paddingText}}">
    <div class="lightbox-item-shared text-left text-dark         mt-2x ml-1x" style="font-size:calc(0.74em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
    {{$item->title}}
    </div>
        @if(!empty($item->label) && in_array('label', $lightbox->showItems))
        <div class="lightbox-item-shared text-dark      ml-1x mt-1x" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
        <small>{{$item->label}}</small>
        </div>
        @endif
    </div>
    @endif
    {{-----------------------------}}
    </div>
    </div>
    @endforeach
    @endif
    {{--End items ------------------------------------}}
    </div>
    </div>
    {{--Bloco de see more ---------------------------}}

    @if (!empty($seeMore))
<<<<<<< HEAD

=======
    {{--
    <div class="pl-3 pl-lg-4 mt-2 d-block d-sm-none">
        <a href="{{$util->toRoute($lightbox->seeMore)}}" class="btn btn-sm btn-dark m-0">
        <span class="px-2">{{__('See more')}}</span>
        </a>
    </div>
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da
    {{--pagination--------------------------------------}}
    @elseif (!empty($lightbox->paginate))
    <div id="default-paginator" class="text-center nav justify-content-center pt-2" aria-label="Page" translator>
    {!!$lightbox->paginate->links('components.bootstrap')!!}
    </div>
    @endif
    {{--End Pagination----------------------------------}}
</div>
</div>
{{--Icon de retorno ao topo da página--}}
@if (empty($lightbox->cssClass) OR $lightbox->cssClass == 'container')
    @if (!empty($objetoConfig->onePage) && $objetoConfig->onePage === true)
    <div class="w-100 pb-3 d-none d-sm-block pl-5 container-xl">
        <a href="#top">
        <img src="{{$util->toImage('local/images/icons', 'setadupla.png')}}" width="26" height="26" class="float-left rounded d-block">
        </a>
        </div>
    @endif
{{--End Icon de retorno ao topo da página--}}
@endif
</section>
@else
@if (!empty($lightbox->nullable) && $lightbox->nullable === true)
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

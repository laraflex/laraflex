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
@if (!empty($objectConfig->onePage) && $objectConfig->onePage === true)
    <section id="gridcards" class="m-0 p-0 mx-0 pb-3 pb-lg-4 pt-1 pt-sm-2">
@else
    <section id="gridcards" class="m-0 p-0 mx-0 pb-3 pb-sm-3 pt-1 pt-sm-3">
@endif

{{--BLOCO PARA COMPONENTES VUEJS--}}
@if (!empty($gridcards->vuejsComponents))
@php
    $vuejsComponents = $gridcards->vuejsComponents;
@endphp
@include('components.vuejsComponents')
@endif
{{--FIM DE BLOCO PARA COMPONENTES VUEJS--}}

<div class="container-xl px-0">
<div class="mx-0 mb-0 px-2 px-lg-3 px-xl-0">

    @if (!empty($gridcards->seeMore))
    <div class="row m-0 p-0">
        <div class="col-12 col-sm-9 p-0">
            @if(!empty($gridcards->title))
            <div class="gridcards-title text-left pt-3 pb-2 pl-3" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
            {{$gridcards->title}}</div>
            @if (!empty($gridcards->legend))
                <div class="gridcards-shared text-left pb-3 pl-3" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
                <span>{{$gridcards->legend}}</span></div>
            @endif
            @endif
        </div>
        <div class="col-0 col-sm-3 text-right p-0 pr-2 d-none d-sm-block align-text-bottomx" style="width: 100%;">
            @if(!empty($gridcards->legend) && !empty($gridcards->title))
            <div class="py-2 mb-sm-1 py-xl-2"></div>
            <div class="pt-1 pt-md-2 pt-lg-3 pr-3 pr-lg-4 align-text-bottom" style="height: 100%;">
            <a href="{{$util->toRoute($gridcards->seeMore)}}" class="btn btn-dark m-0">
            {{__('See more')}}
            </a>
            </div>
            @else
            <div class="pb-sm-3 pt-1 pt-md-2 pt-lg-3 pr-3 pr-lg-4 align-text-bottom" style="height: 100%;">
            <a href="{{$util->toRoute($gridcards->seeMore)}}" class="btn btn-dark m-0">
            {{__('See more')}}
            </a>
            </div>
            @endif
        </div>
    </div>
    @else
        @if(!empty($gridcards->title))
        <div class="gridcards-title text-center pt-3 pb-2" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
        {{$gridcards->title}}</div>
        @if (!empty($gridcards->legend))
            <div class="gridcards-shared text-center pb-3" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
            <span>{{$gridcards->legend}}</span></div>
        @else
            <div class="pt-2"></div>
        @endif
        @endif
    @endif
    <div class="mt-0">
    {{--<div class="row w-100 m-0 p-0">--}}
    {{--Add items ------------------------------------------------}}
    @if(!empty($gridcards->items))
    @php
    //--Backgrond effect e margin--//
    if (!empty($gridcards->styles->margin) && $gridcards->styles->margin === true){
        $margin = 'm-2';
        $paddingText = 'pt-1 pb-3';
    }else{
        $margin = '';
        $paddingText = 'pt-3 pb-3';
    }
    $visibility = ['d-block', 'd-block', 'd-block', 'd-block', 'd-none d-sm-block d-lg-none', 'd-none d-sm-block d-lg-none'];
    $num_limit = 6;
    $showLimit = false;

    if (!empty($gridcards->seeMore)){
        $showLimit = true;
    }else{
        $showLimit = false;
    }
    if (!empty($gridcards->extendedGrid) && $gridcards->extendedGrid === true){
        $column = 'col-6 col-sm-3 col-lg-2';
        if (!empty($gridcards->seeMore)){
            $visibility = ['d-block', 'd-block', 'd-block', 'd-block', 'd-block', 'd-block', 'd-none d-sm-block d-lg-none', 'd-none d-sm-block d-lg-none'];
            $num_limit = 8;
        }
    }else{
        $column = 'col-6 col-sm-4 col-lg-3';
    }
    @endphp
    <div class="row w-100 m-0 p-0">
    {{--Bloco de renderização de items de componente--}}
    @foreach($gridcards->items as $key => $item)
    @php
    $margen_bottom = 'mb-3';
    if ($showLimit === true){
        if (!empty($num_limit) && $key >= $num_limit){
        break;
        }
        if ($num_limit == 6){
            if ($key < 2){
                $margen_bottom = 'mb-2 mb-sm-3 mb-lg-0';
            }elseif($key == 2){
                $margen_bottom = 'mb-0 mb-sm-3 mb-lg-0';
            }else{
                $margen_bottom = 'mb-0';
            }
        }elseif($num_limit == 8){
            if ($key < 3){
                $margen_bottom = 'mb-2 mb-sm-3 mb-lg-0';
            }elseif($key == 3){
                $margen_bottom = 'mb-0 mb-sm-3 mb-lg-0';
            }else{
                $margen_bottom = 'mb-0';
            }
        }
    }
    @endphp

    <div class="{{$column}} p-0  {{$margen_bottom}}">
    @if ($showLimit === true)
    <div class="mx-1 h-100 {{$border}} {{$visibility[$key]}}">
    @else
    <div class="mx-1 h-100  {{$border}}">
    @endif
    @if (!empty($gridcards->styles->bgEffect) && $gridcards->styles->bgEffect === true)
    <div class="gridcards-item {{$margin}}" style="background-color: #000000;">
    @else
    <div class="{{$margin}}">
    @endif
    {{--End Backgrond effect--}}

    {{--ACTION DE COMPONENTS vUEJS -----------------------------------}}
    @if (!empty($gridcards->vueAction) && !empty($gridcards->vuejsComponents))
    <a href="#" v-on:click="{{$gridcards->vueAction}}('{{$item->id}}')" >

    {{--ROUTE DE COMPONENTE BLADE ------------------------------------}}

    @elseif (!empty($gridcards->route))
        @php
           if (!empty($gridcards->target) && $gridcards->target == 'blank'){
               $target = 'target="_blank"';
           }else{
               $target = '';
           }
        @endphp
    <a class="" href="{{$util->toRoute($gridcards->route, $item->id)}}" role="button" rel="noopener noreferrer" {!!$target!!}>
    {{--Bloco de imagem ------------------------------------------------}}
    @else
    <a href="#">
    @endif

    @php
    if (!empty($item->imageStorage)){
        $image = $item->imageStorage;
    }
    elseif (!empty($item->imagePath)){
        $image = $util->toImage($item->imagePath);
    }
    elseif(!empty($item->image)){
        $image = $util->toImage($item->image);
    }else{
        $image = $util->toImage('local/images/app', 'image-laracast.jpg');
    }
    @endphp
    <img src="{{$image}}" class="img-fluid">
    {{--End Bloco de imagem ------------------------------------------------}}
    </a>

    {{--End button ----------------}}
    </div>
        @if(!empty($item->title) && in_array('title', $gridcards->showItems))
        <div class="px-3 {{$paddingText}}">
            <div class="gridcards-item-shared text-left text-dark" style="font-size:calc(0.76em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
            {{$item->title}}
            </div>
            @if(!empty($item->label) && in_array('label', $gridcards->showItems))
            <div class="gridcards-item-shared text-dark pb-1" style="font-size:calc(0.70em + 0.3vw);line-height:1.3;{{$font_family}}">
            <small>{{$item->label}}</small>
            </div>
            @endif
            @if(!empty($item->specialLabel) && in_array('specialLabel', $gridcards->showItems))
            <div class="gridcards-item-shared pb-1" style="color: blue; font-size:calc(11px + 0.25vw);line-height:1.3;{{$font_family}}">
            {{$item->specialLabel}}
            </div>
            @endif
            {{--Adicionando rating --------------------------------------------------}}
            @if(!empty($item->rating) && in_array('rating', $gridcards->showItems))
                <div class="" style="font-size:calc(11px + 0.25vw);line-height:1.3;{{$font_family}}">
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
        @endif
    </div>
    </div>
    @endforeach
    @endif
    {{--End items ------------------------------------}}
    </div>
    </div>
    {{--Bloco de see more ---------------------------}}
    @if (!empty($gridcards->seeMore))
    <div class="pl-3 pl-lg-4 mt-3 d-block d-sm-none">
        <a href="{{$util->toRoute($gridcards->seeMore)}}" class="btn btn-sm btn-dark m-0">
        <span class="px-2">{{__('See more')}}</span>
        </a>
    </div>
    {{--pagination--------------------------------------}}
    @elseif (!empty($gridcards->paginate))
    <div id="default-paginator" class="text-center nav justify-content-center pt-sm-2" aria-label="Page" translator>
    {!!$gridcards->paginate->links('components.bootstrap')!!}
    </div>
    @endif
    {{--End Pagination----------------------------------}}
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
@if (!empty($gridcards->nullable) && $gridcards->nullable === true)
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

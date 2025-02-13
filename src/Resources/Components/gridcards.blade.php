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
    $bgRound = '';
@endphp
@if (!empty($objectConfig->onePage) && $objectConfig->onePage === true)
    <section id="gridcards" class="m-0 p-0 mx-0 pb-3 pb-lg-4 pt-1 pt-sm-2">
@else
    <section id="gridcards" class="m-0 p-0 mx-0 pb-3 pb-sm-3 pt-1 pt-sm-3">
@endif

{{--BLOCO PARA COMPONENTES VUEJS--}}
{{--}}
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
    {{--SEEMORE COMPONENT GRIDCARDS ============================================--}}
    @include('laraflex::ComponentParts.gridcards.seemore')

    @else
        @if(!empty($gridcards->title))
        {{--SEEMORE COMPONENT GRIDCARDS ============================================--}}
        @include('laraflex::ComponentParts.gridcards.title')

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
        $paddingText = 'pt-1 pb-1';
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
    // Definição do atributo 'ALT"'
    $alt = '';
    if (!empty($item->alt)){
        $alt = 'alt="' . $item->alt . '"';
    }
    @endphp
    {{--Start File Style and block style--}}
    <div class="{{$column}} p-0  {{$margen_bottom}}">
    @if (!empty($gridcards->styles->fileStyle) && $gridcards->styles->fileStyle === true)
    @if ($showLimit === true)
    <div class="mx-1 h-100 {{$visibility[$key]}}">
    @else
    <div class="mx-1 h-100">
    @endif
    <div class="gridcards-item {{$margin}}" style="text-align:center">
    @else
    @if ($showLimit === true)
    <div class="mx-1 h-100 {{$border}} {{$visibility[$key]}}">
    @else
    <div class="mx-1 h-100  {{$border}}">
    @endif
    {{--start Background effect--}}
    @if (!empty($gridcards->styles->bgEffect) && $gridcards->styles->bgEffect === true)
    <div class="gridcards-item {{$margin}}" style="background-color: #000000;">
    @else
    <div class="gridcards-item {{$margin}}">
    @endif
    {{--End Backgrond effect--}}
    {{--file File Style and block style--}}
    @endif
    {{--IMAGE AND ICON COMPOPNENT GRIDECARDS--}}
    @include('laraflex::ComponentParts.gridcards.imageandicon')
    </div>

    @if(in_array('title', $gridcards->showItems) || in_array('label', $gridcards->showItems))
    {{--IMAGE AND ICON COMPOPNENT GRIDECARDS--}}
    @include('laraflex::ComponentParts.gridcards.griditems')

    @endif
    </div>
    </div>
    @endforeach
    @endif
    {{--End items ------------------------------------}}
    </div>
    </div>

    {{--Icon de retorno ao topo da página--}}
    @if (!empty($gridcards->onePage) && $gridcards->onePage === true)
    {{--ONEPAGE COMPONENT SHARED ============================================--}}
    @include('laraflex::ComponentParts.shared.onepage')
    @endif


    {{--Bloco de see more ---------------------------}}
    @if (!empty($gridcards->seeMore))
    @php
        $seeMore = $gridcards->seeMore;
    @endphp
    {{--@props(['seeMore'])--}}
    <x-laraflex::shared.seemore :seeMore="$seeMore" />

    {{--pagination--------------------------------------}}
    @elseif (!empty($gridcards->paginate))
    @php
        $paginates = $gridcards->paginate->links('components.bootstrap');
    @endphp
    {{--@props(['paginates'])--}}
    <x-laraflex::shared.paginate :paginates="$paginates" />

    @endif
    {{--End Pagination----------------------------------}}
    </div>
    </div>

{{--End Icon de retorno ao topo da página--}}
</div>
</section>
@else
@if (!empty($gridcards->nullable) && $gridcards->nullable === true)
    <div class="text-center mt-2 mb-2"></div>
@else
{{--messageNull component Blogcardes ==========================================--}}
<x-laraflex::shared.messagenull />

@endif
@endif

@if (!empty($objeto))
    @php
        $groupCards = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $groupCards = $object;
    @endphp
@endif
@if (!empty($groupCards) && !empty($groupCards->items))
    @php
    if (!empty($groupCards->fontFamily->title)){
        $font_family_title = 'font-family:'.$groupCards->fontFamily->title .';';
    }else{
        $font_family_title = '';
    }
    if (!empty($groupCards->fontFamily->shared)){
        $font_family = 'font-family:'.$groupCards->fontFamily->shared .';';
    }else{
        $font_family = '';
    }
    @endphp
@if (!empty($objectConfig->onePage) && $objectConfig->onePage === true)
    <section id="groupcards" class="m-0 p-0 mx-0 pb-3 pb-lg-4 pt-1 pt-sm-2">
@else
    <section id="groupcards" class="m-0 p-0 mx-0 pb-3 pb-sm-3 pt-1 pt-sm-3">
@endif

{{--BLOCO PARA COMPONENTES VUEJS--
@if (!empty($groupCards->vuejsComponents))
@php
    $vuejsComponents = $groupCards->vuejsComponents;
@endphp
@include('components.vuejsComponents')
@endif
{{--FIM DE BLOCO PARA COMPONENTES VUEJS--}}

<div class="container-xl px-0">
<div class="mx-0 mb-0 mt-1 px-2 px-lg-3 px-xl-0">
<div class="">
@php

    if(!empty($groupCards->seeMore)){
        $seeMore = $util->toRoute($groupCards->seeMore);
        $paginate = NULL;
        $pageNumber = NULL;
        $groupCards->page = false;

    }elseif(!empty($groupCards->paginate)){
        $paginate = $groupCards->paginate;
        $paginates = $groupCards->paginate->links('components.bootstrap');
        $seeMore = NULL;
        $pageNumber = $paginate->currentPage();
    }
    if (!empty($groupCards->title)){
        $title = $groupCards->title;
    }else{
        $title = NULL;
    }
    if (!empty($groupCards->legend)){
        $legend = $groupCards->legend;
    }else{
        $legend = NULL;
    }
@endphp
    @if (!empty($groupCards->seeMore))
    @php
        $seeMore = $util->toRoute($groupCards->seeMore);
        $position = "text-left";
    @endphp
    {{--SEEMORE COMPONENT GROUPCARDS ============================== --}}
    {{--@props(['seeMore','title','legend','font_family','font_family_title','position' ])--}}
    <x-laraflex::groupcards.seemore :seeMore="$seeMore" :title="$title" :legend="$legend" :font_family="$font_family" :font_family_title="$font_family_title" :position="$position"/>

    @else
    @php
        $position = "text-center";
    @endphp
    {{-- TITLE COMPONENT GROUPCARDS ============================== --}}
    {{--@props(['title','legend','font_family','font_family_title' ])--}}
    <x-laraflex::groupcards.title :title="$title" :legend="$legend" :font_family="$font_family" :font_family_title="$font_family_title" :position="$position"  />

    @endif
    <div class="row p-0 m-0 pt-1">
    @php
    $visibility = ['d-block ', 'd-block ', 'd-block ', 'd-block', 'd-none d-sm-block d-lg-none', 'd-none d-sm-block d-lg-none'];
    $array_margin_bottom = ['mb-3 mb-lg-0','mb-3 mb-lg-0','mb-sm-3 mb-lg-0','mb-0', 'mb-0','mb-0'];
    $margin_bottom = 'mb-2 mb-md-3';
    $num_limit = 6;
    $showLimit = false;
    if (!empty($groupCards->seeMore)){
        $showLimit = true;
    }else{
        $showLimit = false;
        $num_limit = NULL;
    }

    if (!empty($groupCards->button)){
        $button = $groupCards->button;
    }else{
        $button = NULL;
    }
    if (!empty($groupCards->showItems)){
        $showItems = $groupCards->showItems;
    }else{
        $showItems = NULL;
    }
    if (!empty($groupCards->bgEffect)){
        $bgEffect = $groupCards->bgEffect;
    }else{
        $bgEffect = NULL;
    }
    if (!empty($groupCards->route)){
        $route = $groupCards->route;
    }else{
        $route = NULL;
    }
    if (!empty($groupCards->page)){
        $page = $groupCards->page;
    }else{
        $page = NULL;
    }
    $items = $groupCards->items;
    @endphp

    {{--ADD CARDS IN COMPONENT GROUPCARDS--}}
    @foreach ($items as $key =>$item)
     {{--Início das colunas do componente--}}
    @php
    if (!empty($num_limit) && $key >= $num_limit){
    break;
    }
    if ($showLimit === true){
        $margin_bottom = $array_margin_bottom[$key];
    }
    @endphp
    <div class="col-6 col-sm-4 col-md-4 col-lg-3  {{$margin_bottom}} p-0">
    @if ($showLimit === true)
    <div class="mx-1 h-100 {{$border}} {{$visibility[$key]}}">
    @else
    <div class="mx-1 h-100 {{$border}}">
    @endif
    {{--Bloco interno----}}
    @if (!empty($button))
    <div class="p-2 p-md-3 m-0 " style="height:86%">
    @else
    <div class="p-2 p-md-3" style="height:100%">
    @endif

    {{--ADD IMAGE COMPONENT GROUPCARDS ===========================--}}
    {{--@props(['util','item','showItems','bgEffect','route'])--}}
    <x-laraflex::groupcards.image :util="$util" :item="$item" :showItems="$showItems" :bgEffect="$bgEffect" :route="$route" :page="$page" :pageNumber="$pageNumber" />

    <div class="">
    {{--CARDS COMPONENT GROUPCARD ================================--}}
    @foreach($showItems as $fieldName)
    @php
        //-> Separa as propriedades de fonte do atributo de showItems
        if (strpos($fieldName, '->>')){
            $arrayTmp = explode('->>', $fieldName);
            $fieldName = $arrayTmp[0];
            $fontOptions = $arrayTmp[1];
        }else{
            $fontOptions ="";
        }
        //-> Fim ------------------------------------------
    @endphp
    @if(!empty($item->$fieldName))

    @if($fieldName != 'image')
    @if($fieldName == 'title')
    <div class="card-text pt-2 pt-lg-3" style="font-size:calc(0.76em + 0.3vw);line-height:calc(14px + 0.3vw);{{$font_family_title}}">
    <strong>{{$item->title}}</strong></div>

    {{--ADD CONTENTS COMPONENTS GROUPCARDS--}}
    @elseif($fieldName != 'rating')
    @php
        $fieldNameTmp = $item->$fieldName;
    @endphp

    {{--@props(['util','fieldNameTmp','font_family','fontOptions'])--}}
    <x-laraflex::groupcards.codeditems :util="$util" :fieldNameTmp="$fieldNameTmp" :fontOptions="$fontOptions" :font_family="$font_family" />

    @elseif($fieldName == 'rating')
    @if(!empty($item->rating))

    {{--ADD RATING COMPONENT GROUPCARDS ===========================================--}}
    {{--@props(['util','item','font_family'])--}}
    <x-laraflex::shared.rating :util="$util" :item="$item" :font_family="$font_family" />

    @endif
    @endif
    @endif
    @endif
    @endforeach
    </div>
    </div>

    {{--ADD BUTTON COMPONENT GROUPCARDS ===========================================--}}
    @if (!empty($button))
    @php
        if (!empty($item->id)){
            $id = $item->id;
        }else{
            $id = NULL;
        }
    @endphp
    {{--@props(['util','button','id'])--}}
    <x-laraflex::groupcards.button :util="$util" :button="$button" :id="$id" />

    @endif
    {{--End bloco interno----}}
    </div>
    </div>
    {{--Fim das colunas do componente--}}
    @endforeach
</div>

{{--Bloco de see more ---------------------------}}
@if (!empty($groupCards->seeMore))
{{--@props(['seeMore'])--}}
<x-laraflex::shared.seemore :seeMore="$seeMore" />

{{--pagination--------------------------------------}}
@elseif (!empty($groupCards->paginate))
{{--@props(['paginates'])--}}
<x-laraflex::shared.paginate :paginates="$paginates" />

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
@if (!empty($blogcards->nullable) && $blogcards->nullable === true)
    <div class="text-center mt-2 mb-2"></div>
@else

{{--messageNull component Blogcardes ==========================================--}}
<x-laraflex::shared.messagenull />

@endif
@endif

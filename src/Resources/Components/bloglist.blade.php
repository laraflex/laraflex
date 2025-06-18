@if (!empty($object))
@php
    $bloglist = $object;
@endphp
@endif

@if (!empty($bloglist->items))

<div id="bloglist" class="pt-1 pt-md-2 mx-2 mx-xl-0 mt-0">


    @php

         if (!empty($blogcards->fontFamily->title)){
            $font_family_title = 'font-family:'.$blogcards->fontFamily->title;
        }else{
            $font_family_title = '';
        }
        if (!empty($blogcards->fontFamily->shared)){
            $font_family = 'font-family:'.$blogcards->fontFamily->shared;
        }else{
            $font_family = '';
        }

        if (!empty($bloglist->title)){
            $title = $bloglist->title;
        }else{
            $title = NULL;
        }
        if (!empty($bloglist->legend)){
            $legend = $bloglist->legend;
        }else{
            $legend = NULL;
        }
        // Classes de estilo de título e legenda =========================
        $objectClass = 'blogcards-title';
        $sharedClass = 'blogcards-shared';

        //=======================================
        if(!empty($bloglist->seeMore)){
            $seeMore = $util->toRoute($bloglist->seeMore);
            $paginate = NULL;
            $numPage = NULL;
        }elseif(!empty($bloglist->paginate)){
            $paginate = $bloglist->paginate;
            $paginates = $bloglist->paginate->links('components.bootstrap');
            $seeMore = NULL;
            $numPage = $paginate->currentPage();
        }
        $page = !empty($bloglist->page)?$blogcards->page:$page = NULL;

        // =========================================================
        // Configuração para os itens do bloglist
        // =========================================================

        //$titleFont = 'font-family: Arial;font-style: italic;';
        $titleFont = '';
        $fontSizeTitle = 'line-height:calc(20px + 0.6vw); font-size:calc(13px + 0.65vw);';
        $heightTitle = 'min-height:calc(80px + 9vw);';
        $lineHeight = 'line-height:calc(13px + 0.5vw);';
        $imageArray = array('foto01.jpg', 'foto02.jpg', 'foto03.jpg', 'foto04.jpg', 'foto05.jpg', 'foto06.jpg', 'foto07.jpg', 'foto08.jpg', 'foto09.jpg', 'foto10.jpg', 'foto11.jpg', 'foto12.jpg');
        $numItems = 0;
    @endphp

     {{--BLOCO DE SEEMORE TOP BUTTON ============================--}}
    @if (!empty($seeMore))
    @php
        //$seeMore = $util->toRoute($bloglist->seeMore);
        $position = "text-start";
    @endphp
    @include('laraflex::ComponentParts.shared.seemoretop')
    @elseif (!empty($title))
    @php
        $position = "text-center";
    @endphp
    @include('laraflex::ComponentParts.shared.title')
    @endif
    {{--==========================================================--}}

    <div class="row mb-2 mb-3 gx-2 gx-xl-3 mt-1 mt-md-2">

    @foreach ($bloglist->items as $key => $item )
    @php
        if (!empty($item->title)){
            $txtTitle = $item->title;
        }else{
            $txtTitle = "ALERTA: Um título deve ser inserido";
        }
        if (!empty($item->abstract)){
            $txtAbstract = $item->abstract;
        }else{
            $txtAbstract = "ALERTA: Um título deve ser inserido";
        }
        if (!empty($item->imagePath)){
            $image = $util->toImage($item->imagePath);
        }

        if (!empty($item->imageStorage)){
            $image = $item->imageStorage;
        }
        elseif (!empty($item->imagePath)){
            $image = $util->toImage($item->imagePath);
        }
        elseif (!empty($item->image)){
            $image = $util->toImage($item->image);
        }
        else{
            $imagePath = 'local/images/posts/' . $imageArray[$numItems];
            $image = $util->toImage($imagePath);
        }

        $numItems ++;
        if ($numItems >= 12){
            $numItems = 0;
        }

       /* =========================================================================
       *  Função para edição de numero de caracteres do título e do abstract
       *  =========================================================================
       */
        $title = '';
        $numCharTitle = strlen($txtTitle);
        if ($numCharTitle < 29){
            $title = $txtTitle;
            $numCharLegend = 150;
            $numCharMobile = 90;
        }elseif ($numCharTitle < 50){
            $title = $txtTitle;
            $numCharLegend = 110;
            $numCharMobile = 60;
        }elseif ($numCharTitle < 86){
            $title = $txtTitle;
            $numCharLegend = 75;
            $numCharMobile = 0;
        }else {
            $wordsTitle = explode(" ", $txtTitle);
            $title = '';
            foreach ($wordsTitle as $value) {
                $title = $title.' '.$value;
                $x = strlen($title);
                if ($x > 85){
                    break;
                }
            }
            $title = $title . ' ...';
             $numCharLegend = 75;
             $numCharMobile = 0;
        }
        //controle do número de palavras da legenda
        $wordsLegend = explode(" ", $txtAbstract);
        $legend = '';
        foreach ($wordsLegend as $value) {
            $legend = $legend.' '.$value;
            $x = strlen($legend);

            if ($numCharMobile != 0 && $x <= $numCharMobile){
                $legendMobile = $legend;
            }

            if ($x > $numCharLegend){
                break;
            }
        }
        $legend = $legend . ' ...';
        if ($numCharMobile != 0){
            $legendMobile = $legendMobile . ' ...';
        }else{
            $legendMobile ='';
        }

        if (!empty($bloglist->seeMore) && $key >= 2){
        break;
        }

        if(!empty($bloglist->route)){
            if (!empty($page) && $bloglist->page == true){
                $route = $util->toRoute($bloglist->route, $item->id).'?page='.$numPage;
            }else{
                $route = $util->toRoute($bloglist->route, $item->id);
            }



        }else{
            $route = NULL;
        }



    @endphp


    <div class="col-md-6 mb-2 mb-md-3 ">
        <div class="row g-0 {{$border}} rounded p-1 p-lg-0" style="{{$heightTitle}}">
            <div class="col-4 rounded-start" style="background-image:url({{$image}}); background-size: cover;"></div>
            <div class="col-8 p-2 p-lg-4 ps-3 ps-lg-4">
                <div class="mb-0 mb-2" style="{{$fontSizeTitle}} {{$titleFont}}">{{$title}}</div>
                <div class="card-textx mb-auto d-none d-lg-block" style="{{$lineHeight}}"><small>{{$legend}}</small></div>
                <div class="card-textx mb-auto d-block d-lg-none" style="{{$lineHeight}}"><small>{{$legendMobile}}</small></div>
                @if (!empty($route))
                <div class="pt-1 pt-md-2"><a href="{{$route}}" ><small>{{__("Continue reading")}}</small></a></div>
                @endif
            </div>
        </div>
    </div>


    @endforeach





@if (!empty($blogcards->onePage) && $blogcards->onePage === true)
{{--ONEPAGE COMPONENT SHARED ============================================--}}
@include('laraflex::ComponentParts.shared.onepage')
@endif

{{--seeMore Component Shered ==================================--}}
@if (!empty($seeMore))
{{--@props(['seeMore'])--}}
<x-laraflex::shared.seemore :seeMore="$seeMore" />

{{--paginate Component Shered =================================--}}
@elseif (!empty($paginate))

{{--@props(['paginates'])--}}
<x-laraflex::shared.paginate :paginates="$paginates" />
@endif

</div>

</div>


@endif

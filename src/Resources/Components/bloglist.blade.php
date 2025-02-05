@if(!empty($objeto))
    @php
        $bloglist = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $bloglist = $object;
    @endphp
@endif

@if (!empty($bloglist) && !empty($bloglist->items))
    @php
        if (!empty($bloglist->fontFamily->title)){
            $font_family_title = 'font-family:'.$bloglist->fontFamily->title;
        }else{
            $font_family_title = '';
        }
        if (!empty($bloglist->fontFamily->shared)){
            $font_family = 'font-family:'.$bloglist->fontFamily->shared;
        }else{
            $font_family = '';
        }
        // HEADERS COMPONENTS ============================================



        if (!empty($bloglist->seeMore)){
            $seeMore = $bloglist->seeMore;
            $route = $util->toRoute($seeMore);
        }else{
            $route = '';
            $seeMore = NULL;
        }

        if(!empty($blogcards->seeMore)){
            $route = $util->toRoute($bloglist->seeMore);
            $paginate = NULL;
            $page = NULL;
        }elseif(!empty($bloglist->paginate)){
            $paginate = $bloglist->paginate;
            $paginates = $bloglist->paginate->links('components.bootstrap');
            $seeMore = NULL;
            $page = $paginate->currentPage();
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
        $objectClass = 'bloglist-title';
        $sharedClass = 'bloglist-shared';
        $num_char = 242;
    @endphp
<section id="bloglist" class="pb-0 pb-sm-1 pt-0 pt-sm-3 pt-md-4">

{{--BLOCO PARA COMPONENTES VUEJS--
@if (!empty($bloglist->vuejsComponents))
@php
    $vuejsComponents = $bloglist->vuejsComponents;
@endphp
@include('components.vuejsComponents')
@endif
{{--FIM DE BLOCO PARA COMPONENTES VUEJS--}}

<div class="container-xl px-0">
<div class="mx-0 mb-0 mt-1 px-2 px-md-3 px-xl-0">

<div class="d-block d-sm-block">
{{--HEADER BLOCK title, legend, seeMore ======================================= --}}
{{--@props(['seeMore','route', 'title','legend','objectClass','sharedClass', 'font_family', 'font_family_title'])--}}
<x-laraflex::header :seeMore="$seeMore" :route="$route" :title="$title" :legend="$legend" :objectClass="$objectClass" :sharedClass="$sharedClass" :font_family="$font_family" :font_family_title="$font_family_title" />

<div class="{{$border}} pt-1 pt-sm-3 pt-lg-4 pb-1 pb-sm-3 mb-3 mt-2">
@php
    $items = $bloglist->items;

    if (!empty($bloglist->showItems)){
        $showItems = $bloglist->showItems;
    }else{
        $showItems = NULL;
    }
    if (!empty($bloglist->route)){
        $route = $bloglist->route;
    }else{
        $route = NULL;
    }
@endphp

    $pageConfig = $bloglist->page;

    if (!empty($bloglist->route)){
        $route = $bloglist->route;
    }else{
        $route = NULL;
    }
    if (!empty($bloglist->paginate)){
        $paginate = $bloglist->paginate;
        $page = $paginate->currentPage();
    }
    if (!empty($bloglist->page)){
        $pageConfig = $bloglist->page;
    }else{
        $pageConfig = NULL;
    }


@endphp

{{-- BLOGLIST ITEM BLOCK ============================== --}}
{{--@props(['showItems','items','seeMore', 'num_char', 'route', 'font_family', 'font_family_title'])--}}
<x-laraflex::bloglist.blogitems :util="$util" :page="$page" :pageConfig="$pageConfig" :showItems="$showItems" :seeMore="$seeMore" :items="$items" :num_char="$num_char" :route="$route" :font_family="$font_family" :font_family_title="$font_family_title" />

</div>
</div>
</div>

{{--Bloco de see more ===============================---}}
@if (!empty($bloglist->seeMore))
<div class="pl-3 pl-lg-4 mt-3 d-block d-sm-block">
    <a href="{{$util->toRoute($bloglist->seeMore)}}" class="btn btn-dark m-0">
    <span class="px-2">{{__('See more')}}</span>
    </a>
</div>
{{--pagination ======================================---}}
@elseif (!empty($bloglist->paginate))
<div id="default-paginator" class="text-center nav justify-content-center pt-sm-2" aria-label="Page" translator>
{!!$bloglist->paginate->links('components.bootstrap')!!}
</div>
@endif

</div>

@if (!empty($objetoConfig->onePage) && $objetoConfig->onePage === true)
<div class="w-100 pb-sm-3 pt-sm-0 d-none d-sm-block pl-5 container-xl">
<a href="#top">
<img src="{{$util->toImage('local/images/icons', 'setadupla.png')}}" width="26" height="26" class="float-left rounded d-block">
</a>
</div>
@endif

</section>
@else
@if (!empty($bloglist->nullable) && $bloglist->nullable === true)
    <div class="text-center mt-2 mb-2"></div>
@else
{{--messageNull component ContentBox ==========================================--}}
<x-laraflex::shared.messagenull />

@endif
@endif



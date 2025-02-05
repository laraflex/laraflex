@if (!empty($objeto))
    @php
        $blogcards = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $blogcards = $object;
    @endphp
@endif

@if (!empty($blogcards) && !empty($blogcards->items))
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
        // HEADERS COMPONENTS ============================================
        if (!empty($blogcards->seeMore)){
            $seeMore = $blogcards->seeMore;
            $route = $util->toRoute($seeMore);
        }else{
            $seeMore = NULL;
            $route = '';
        }
        if (!empty($blogcards->title)){
            $title = $blogcards->title;
        }else{
            $title = NULL;
        }
        if (!empty($blogcards->legend)){
            $legend = $blogcards->legend;
        }else{
            $legend = NULL;
        }
        // Classes de estilo de título e legenda =========================
        $objectClass = 'blogcards-title';
        $sharedClass = 'blogcards-shared';
    @endphp
<section id="blogcards" class="pb-1 pt-3 pt-md-4">

{{--BLOCO PARA COMPONENTES VUEJS--
@if (!empty($blogcards->vuejsComponents))
@php
    $vuejsComponents = $blogcards->vuejsComponents;
@endphp

@include('components.vuejsComponents')
@endif
{{--FIM DE BLOCO PARA COMPONENTES VUEJS--}}

<div class="container-xl px-0">
<div class="mx-0 mb-0 mt-1 px-2 px-lg-3 px-xl-0">

    <div class="d-block d-sm-block pb-0 mb-0">
    {{--HEADER BLOCK title, legend, seeMore ======================================= --}}
    {{--@props(['seeMore','route', 'title','legend','objectClass','sharedClass', 'font_family', 'font_family_title'])--}}
    <x-laraflex::header :seeMore="$seeMore" :route="$route" :title="$title" :legend="$legend" :objectClass="$objectClass" :sharedClass="$sharedClass" :font_family="$font_family" :font_family_title="$font_family_title" />

    <div class="row p-2">
        {{--Início linha linha ==== --}}
    @php
    $column = 'col-6 col-sm-6 col-md-4 col-lg-3';
    $titleFont = 'font-size:calc(0.8em + 0.2vw); line-height:1.2;';
    $sharedFont = 'font-size:calc(0.6em + 0.15vw);letter-spacing: 2px;';
    $fontAbstract = 'font-size:calc(0.68em + 0.15vw);';
    $visibility = ['d-block', 'd-block', 'd-block', 'd-md-none d-lg-block', 'd-none d-lg-block', 'd-none d-lg-block', 'd-none d-lg-block', 'd-none d-lg-block'];
    $num_limit = 4;
    @endphp

    {{--CARDS - ADDING BLOGCARDS ITEMS--}}
    @foreach ($blogcards->items as $key => $item)
    @if (!empty($blogcards->seeMore))
    @php
    if ($key == $num_limit){
    break;
    }
    @endphp
    <div class="{{$column}} p-0 pb-2 pb-lg-3 {{$visibility[$key]}}">
    @else
    <div class="{{$column}} p-0 pb-2 pb-lg-3">
    @endif
    <article class= "mx-sm-1 mx-lg-2 h-100 {{$border}}">
    <header class="p-3 p-sm-3 p-md-3">
    @php
        // TITLE CONFIGURATION ==================
        if (!empty($item->title)){
            $title = $item->title;
            $alt = 'alt ="'. $item->title.'"';
        }else{
            $title = NULL;
            $alt = "";
        }
        // DATE CONFIGURATION ===================
        if (!empty($item->date)){
            $date = $item->date;
        }else{
            $date = NULL;
        }
        // IMAGE CONFIGURATION ===================
        if (!empty($item->imageStorage)){
            $image = $item->imageStorage;
        }
        elseif (!empty($item->imagePath)){
            $image = $util->toImage($item->imagePath);
        }
        elseif(!empty($item->image)){
            $image = $util->toImage($item->image);
        }else{
            $fhoto = array('foto01.jpg','foto02.jpg','foto03.jpg','foto04.jpg','foto05.jpg', 'foto06.jpg', 'foto07.jpg', 'foto08.jpg', 'foto09.jpg', 'foto10.jpg');
            $int = rand(1, 10);
            $image = $util->toImage('local/images/posts/'.$fhoto[$int]);
        }
        // ABSTRACT CONFIGURATION ===================
        if (in_array('title', $blogcards->showItems) && !empty($item->title)){
            $numCharTitle = strlen($item->title);
        }else{
            $numCharTitle = 30;
        }
        if (!empty($blogcards->expanded) && $blogcards->expanded === true){
            if ($numCharTitle <= 32){
                $numChar = 252;
            }elseif($numCharTitle > 31 && $numCharTitle < 64){
                $numChar = 220;
            }else{
                $numChar = 160;
            }
        }else{
            if ($numCharTitle <= 28){
                $numChar = 150;
            }elseif($numCharTitle > 26 && $numCharTitle <= 52){
                $numChar = 135;
            }else{
                $numChar = 100;
            }
        }
        $abstract = substr("$item->abstract", 0, $numChar);

        // RATING CONFIGURATION ======================
        if (!empty($item->rating)){
            if ($item->rating <= 5){
                $rating = $item->rating;
            }else{
                $rating = 5;
            }
            $icon = $util->toImage('local/images/icons', 'star.png');
            $smallIcon = $util->toImage('local/images/icons', 'starsmall.png');
        }else{
            $rating = NULL;
            $icon = '';
            $smallIicon = '';
        }
<<<<<<< HEAD
        //=======================================
        if(!empty($blogcards->seeMore)){
            $seeMore = $util->toRoute($blogcards->seeMore);
            $paginate = NULL;
            $page = NULL;
        }elseif(!empty($blogcards->paginate)){
            $paginate = $blogcards->paginate;
            $paginates = $blogcards->paginate->links('components.bootstrap');
            $seeMore = NULL;
            $page = $paginate->currentPage();
        }

=======
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da
        //BUTTONS CONFIGURATION ============================
        if (!empty($blogcards->vueAction) && !empty($blogcards->vuejsComponents)){
            $vueAction = $blogcards->vueAction;
            $vuejsComponents = $blogcards->vuejsComponents;
            $id = $item->id;
            $route = NULL;
        }elseif(!empty($blogcards->route)){
<<<<<<< HEAD
            if (!empty($page) && $blogcards->page == true){
                $route = $util->toRoute($blogcards->route, $item->id).'?page='.$page;
            }else{
                $route = $util->toRoute($blogcards->route, $item->id);
            }

=======
            $route = $util->toRoute($blogcards->route, $item->id);
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da
            $label = __('Read more');
            $vueAction = NULL;
            $vuejsComponents = NULL;
            if (!empty($blogcards->target) && $blogcards->target == 'blank'){
<<<<<<< HEAD
                 $target = 'target="_blank';
=======
                 $target = 'target="_blank"';
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da
            }else{
                $target = '';
            }
        }else{
            $route = NULL;
        }
<<<<<<< HEAD
        /*
        if(!empty($blogcards->seeMore)){
            $seeMore = $util->toRoute($blogcards->seeMore);
            $paginate = NULL;
            $page = NULL;
=======
        if(!empty($blogcards->seeMore)){
            $seeMore = $util->toRoute($blogcards->seeMore);
            $paginate = NULL;
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da
        }elseif(!empty($blogcards->paginate)){
            $paginate = $blogcards->paginate;
            $paginates = $blogcards->paginate->links('components.bootstrap');
            $seeMore = NULL;
        }
<<<<<<< HEAD
        */
=======
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da
    @endphp

    {{--title component blogcards ====================================--}}
    @if (in_array('title', $blogcards->showItems) && !empty($title))
    {{--@props(['title', 'titleFont', 'font_family'])--}}
    <x-laraflex::blogcards.titlecard :title="$title" :titleFont="$titleFont" :font_family_title="$font_family_title" />
    @endif

    {{--date component blogcards ====================================--}}
    @if (in_array('date', $blogcards->showItems) && !empty($date))
    {{--@props(['date', 'sharedFont', 'fontFamily'])--}}
    <x-laraflex::blogcards.date :date="$date" :sharedFont="$sharedFont" :font_family="$font_family" />
    @endif

    {{--image component blogcards ====================================--}}
    @if (in_array('image', $blogcards->showItems) && (!empty($image)))
    {{--@props(['image', 'alt'])--}}
    <x-laraflex::blogcards.image :image="$image" :alt="$alt" />
    @endif

    {{--abstract component blogcards ====================================--}}
    @if (in_array('abstract', $blogcards->showItems) && !empty($abstract))
    {{--@props(['abstract', 'fontAbstract', 'font_family'])--}}
    <x-laraflex::blogcards.abstract :abstract="$abstract" :fontAbstract="$fontAbstract" :font_family="$font_family" />
    @endif

    {{--rating component blogcards ====================================--}}
    @if(!empty($rating) && in_array('rating', $blogcards->showItems))
    {{--@props(['rating', 'icon', 'smallIcon'])--}}
    <x-laraflex::blogcards.rating :rating="$rating" :icon="$icon" :smallIcon="$smallIcon" />
    @endif

    {{--button component blogcards ====================================--}}
    @if (!empty($vueAction) && !empty($vuejsComponents))
    {{--@props(['vueAction', 'id'])--}}
    <x-laraflex::blogcards.vueaction :vueAction="$vueAction" :id="$id" />

    @elseif (!empty($route))
     {{--@props(['route', 'target', 'label'])--}}
<<<<<<< HEAD
     <x-laraflex::shared.button :route="$route" :target="$target" :label="$label" />
=======
     <x-laraflex::shered.button :route="$route" :target="$target" :label="$label" />
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da
    @endif

    </header>
    </article>
    </div>
    @endforeach
    </div>
    {{--END OF INCLUSION OF CARDS--}}

{{--seeMore Component Shered ==================================--}}
@if (!empty($seeMore))
{{--@props(['seeMore'])--}}
<<<<<<< HEAD
<x-laraflex::shared.seemore :seeMore="$seeMore" />
=======
<x-laraflex::shered.seemore :seeMore="$seeMore" />
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da

{{--paginate Component Shered =================================--}}
@elseif (!empty($paginate))
{{--@props(['paginates'])--}}
<<<<<<< HEAD
<x-laraflex::shared.paginate :paginates="$paginates" />
=======
<x-laraflex::shered.paginate :paginates="$paginates" />
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da
@endif

{{--End add components==========================================--}}
</div>

</section>
@else
@if (!empty($blogcards->nullable) && $blogcards->nullable === true)
    <div class="text-center mt-2 mb-2"></div>
@else
<<<<<<< HEAD
{{--messageNull component Blogcardes ==========================================--}}
<x-laraflex::shared.messagenull />
=======
{{--messageNull component ContentBox ==========================================--}}
<x-laraflex::shered.messagenull />
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da

@endif
@endif

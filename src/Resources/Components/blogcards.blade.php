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
        if (!empty($blogcards->title)){
            $title = $blogcards->title;
        }else{
            $title = NULL;
        }

        $title = $blogcards->title;
        if (!empty($blogcards->legend)){
            $legend = $blogcards->legend;
        }else{
            $legend = NULL;
        }
        // Classes de estilo de título e legenda =========================
        $objectClass = 'blogcards-title';
        $sharedClass = 'blogcards-shared';

        //=======================================
        if(!empty($blogcards->seeMore)){
            $seeMore = $util->toRoute($blogcards->seeMore);
            $paginate = NULL;
            $numPage = NULL;
        }elseif(!empty($blogcards->paginate)){
            $paginate = $blogcards->paginate;
            $paginates = $blogcards->paginate->links('components.bootstrap');
            $seeMore = NULL;
            $numPage = $paginate->currentPage();
        }
        $page = !empty($blogcards->page)?$blogcards->page:$page = NULL;

    @endphp
<section id="blogcards" class="pb-1 pt-0 pt-md-0">

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
    <div class=" pb-0 mb-0">





    {{--BLOCO DE SEEMORE TOP BUTTON ============================--}}
    @if (!empty($seeMore))
    @php
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
    <div class="row px-2 px-lg-0 pt-2">
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
    <div class="{{$column}} p-1 p-sm-0 pb-2 pb-lg-2 {{$visibility[$key]}}">
    @else
    <div class="{{$column}} p-1 p-sm-0 pb-2 pb-lg-2">
    @endif
    <article class= "mx-sm-1 mx-xl-1 h-100 {{$border}}">
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
        $date = !empty($item->date)?$item->date:$date = NULL;

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
            $index = $key;
            if ($index > 9){
                $index = rand(0, 9);
            }
            //$image = $util->toImage('local/images/posts/'.$fhoto[$int]);
            $image = $util->toImage('local/images/posts/'.$fhoto[$index]);

        }
        // ABSTRACT CONFIGURATION ===================
        if (in_array('title', $blogcards->showItems) && !empty($title)){
            $numCharTitle = strlen($title);
        }else{
            $numCharTitle = 30;
        }
        if ($numCharTitle <= 28){
            $numChar = 150;
        }elseif($numCharTitle > 28 && $numCharTitle <= 52){
            $numChar = 135;
        }else{
            $numChar = 100;
        }
        $abstract = !empty($item->abstract)?substr("$item->abstract", 0, $numChar):$abstract = NULL;

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


        //BUTTONS CONFIGURATION ============================
        if (!empty($blogcards->vueAction) && !empty($blogcards->vuejsComponents)){
            $vueAction = $blogcards->vueAction;
            $vuejsComponents = $blogcards->vuejsComponents;
            $id = $item->id;
            $route = NULL;
        }elseif(!empty($blogcards->route)){
            if (!empty($page) && $blogcards->page == true){
                $route = $util->toRoute($blogcards->route, $item->id).'?page='.$numPage;
            }else{
                $route = $util->toRoute($blogcards->route, $item->id);
            }

            $label = __('Read more');
            $vueAction = NULL;
            $vuejsComponents = NULL;
            if (!empty($blogcards->target) && $blogcards->target == 'blank'){
                 $target = 'target="_blank';
            }else{
                $target = '';
            }
        }else{
            $route = NULL;
        }


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
     <x-laraflex::shared.button :route="$route" :target="$target" :label="$label" />
    @endif

    </header>
    </article>
    </div>
    @endforeach
    </div>
    {{--END OF INCLUSION OF CARDS--}}


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


{{--End add components==========================================--}}
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

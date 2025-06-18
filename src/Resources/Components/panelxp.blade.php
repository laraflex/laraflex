@if(!empty($objeto))
    @php
        $panel = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $panel = $object;
    @endphp
@endif

@if (!empty($panel) && !empty($panel->data))
@php
    if (!empty($panel->fontFamily->title)){
        $font_family_title = 'font-family:'.$panel->fontFamily->title .';';
    }else{
        $font_family_title = '';
    }
    if (!empty($panel->fontFamily->shared)){
        $font_family = 'font-family:'.$panel->fontFamily->shared .';';
    }else{
        $font_family = '';
    }
        $stylePanel = $border;

    if (!empty($panel->title)){
        $title = $panel->title;
    }else{
        $title = NULL;
    }
@endphp

<section id="panel" class="pb-1 pt-3 pt-md-4">
<div class="container-xl px-0">
<div class="mx-0 mb-0 mt-1 px-2 px-lg-3 px-xl-0">

{{-- TITLE COMPONENT PANEL ============================== --}}
{{--@props(['title','font_family_title' ])--}}
<x-laraflex::panel.title :title="$title" :font_family_title="$font_family_title" />

@if(!empty($panel->bgColor))
<div class="row w-100 p-0 m-0 pt-3 pt-sm-0 pb-2 {{$stylePanel}}" style="background-color:{{$panel->bgColor}}">
@else
<div class="row w-100 p-0 m-0 pt-3 pt-sm-0 pb-2 {{$stylePanel}}">
@endif

    @php
        if (!empty($panel->images)){
            $images = $panel->images;
        }else{
            $images = NULL;
        }
        if (!empty($panel->lightbox)){
            $lightbox = $panel->lightbox;
        }else{
            $lightbox = NULL;
        }
        $data = $panel->data;
        if (!empty($panel->showItems)){
            $showItems = $panel->showItems;
        }else{
            $showItems = NULL;
        }

    @endphp


@if(!empty($images))
{{--@props(['util','images','lightbox' ])--}}
<x-laraflex::panel.carousel :util="$util" :images="$images" :lightbox="$lightbox" />
@else
<div class="col-12 contents py-3 py-sm-4 py-lg-5 px-3 px-sm-4 px-lg-5">
@endif

{{-- ITEMS COMPONENTS PANEL ============================== --}}
@if (!empty($showItems))

{{--@props(['util','data','showItems','font_family' ])--}}
<x-laraflex::panel.showitems :util="$util" :data="$data" :showItems="$showItems" :font_family="$font_family" />
@endif

{{-- FORM COMPONENTS PANEL ============================== --}}

@if (!empty($panel->form))
    {{--Formulário de componente ---------------------------------}}
    @php
        if (!empty($panel->form->action)){
            $route = $util->toRoute($panel->form->action);
        }else{
            $route = '#';
        }


        if (!empty($panel->form->method)){
            $method = $panel->form->method;
        }else{
            $method = 'post';
        }
        if (!empty($panel->form->id)){
            $panelId = $panel->form->id;
        }else{
            $panelId = NULL;
        }

        if (!empty($panel->form->button)){
            $panelButton = $panel->form->button;
        }else{
            $panelButton = NULL;
        }
        if (!empty($panel->form->items)){
            $panelItems = $panel->form->items;
        }else{
            $panelItems = NULL;
        }
    @endphp

    {{--FORM COMPONENT PANEL =============================================--}}
    {{--@props(['method','route','panelId','panelItems','panelButton' ])--}}
    <x-laraflex::panel.panelform :method="$method" :route="$route" :panelId="$panelId" :panelItems="$panelItems" :panelButton="$panelButton" />

    @endif
    </div>
    </div>
</div>

{{--SHOWADDONS COMPONENT PANEL =============================================--}}
@if(!empty($panel->showAddons))
@php
    $showAddons = $panel->showAddons;
    if (!empty($panel->addionTitle)){
        $addionTitle = $panel->addionTitle;
    }else{
        $addionTitle = NULL;
    }
    $panelData = $panel->data;
@endphp
{{--@props(['stylePanel','addionTitle','showAddons','panelData','font_family','font_family_title' ])--}}
<x-laraflex::panel.showaddons :stylePanel="$stylePanel" :addionTitle="$addionTitle" :showAddons="$showAddons" :panelData="$panelData" :font_family="$font_family" :font_family_title="$font_family_title" />

@endif
</section>
@else
{{--messageNull component Blogcardes ==========================================--}}
<x-laraflex::shared.messagenull />

@endif

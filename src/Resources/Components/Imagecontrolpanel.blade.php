@php
/**
 * --------------------------------------------------------------
 * Componentes de cartões para itens de painel de controlle
 */
if (!empty($objeto)) {
    $imagecontrolpanel = $objeto;
}
elseif(!empty($object)) {
    $imagecontrolpanel = $object;
}


$arrayIcon = ['address-card', 'archive', 'truck-loading', 'clipboard-list', 'copy', 'donate', 'fax',  'file-image', 'id-card',
    'weight', 'volleyball-ball', 'users-cog', 'store', 'building', 'pallet', 'basketball-ball',  'film', 'file-archive',
     'baseball-ball', 'cogs'];

$collumnConfig = 'col-6 col-sm-4 col-md-3 col-lg-2';

/**
 * -----------------------------------------------------------------
 */
@endphp

@if (!empty($imagecontrolpanel) && !empty($imagecontrolpanel->items))

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
@endphp

<section id="image-control-panel" class="pb-1 pt-2 pt-md-3">

{{--BLOCO PARA COMPONENTES VUEJS--}}
{{--
@if (!empty($imagecontrolpanel->vuejsComponents))
@php
    $vuejsComponents = $imagecontrolpanel->vuejsComponents;
@endphp
@include('components.vuejsComponents')
@endif
{{--FIM DE BLOCO PARA COMPONENTES VUEJS--}}

<div class="container-xl pl-0 pr-0 pr-sm-0 mb-2">
<div class="mx-0 mb-0 mt-1 px-2 px-md-3 px-xl-0">
{{--INICIO DE BLOCO DE COMPONENTE--}}
@php
    if (!empty($imagecontrolpanel->title)){
        $title = $imagecontrolpanel->title;
    }else{
        $title = NULL;
    }
    if (!empty($imagecontrolpanel->legend)){
        $legend = $imagecontrolpanel->legend;
    }else{
        $legend = NULL;
    }
@endphp

@if(!empty($imagecontrolpanel->title))
{{--@props(['title', 'legend', 'font_family_title', 'font_family']) --}}
    @include('laraflex::ComponentParts.databox.title')

@endif

<div class="cards row p-0 m-0">

    @foreach ($imagecontrolpanel->items as $key => $item)

    @php
    // -------------------------------------------------------------------------
        if (!empty($item->image)) {
            $image = $util->toImage($item->image);
        }
        elseif(!empty($item->imagePath)) {
            $image = $util->toImage($item->imagePath);
        }
        elseif(!empty($item->imageStorage)) {
            $image = $item->imageStorage;
        }
        else {
            $image = $util->toImage('local/images/components/cp_image015.jpg');
        }

        if (!empty($item->icon)) {
            $icon = 'fa-' . $item->icon;
        }else {
            $icon = 'fa-' . $arrayIcon[$key];
        }
        if (!empty($item->route)){
            $route = $util->toRoute($item->route);
        }else{
            $route = NULL;
        }
        if (!empty($item->label)){
            $label = $item->label;
        }else{
            $label = NULL;
        }
    // ---------------------------------------------------------------------------
    @endphp

    {{--@props(['image', 'route','label','icon', 'collumnConfig', 'border']) --}}
    @include('laraflex::ComponentParts.imagecontrolpanel.imagecontrolitem')

    @endforeach
</div>
{{--FIM DE BLOCO DE COMPONENTE--}}
</div>
</div>
</section>
@else
 {{--messageNull component shered ==========================================--}}
 <x-laraflex::shared.messagenull />s
@endif

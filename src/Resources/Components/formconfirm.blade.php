@if (!empty($objeto))
    @php
        $form = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $form = $object;
    @endphp
@endif

@if (!empty($form->items))
<section id="form" class="pb-1 pt-3 pt-md-4">
<div class="container-xl px-0">
<div class="mx-0 mb-0 mt-1 px-2 px-lg-3 px-xl-0">
<div class=" mb-3x px-3 px-xl-4 pb-2 {{$border}}">
@php
    if (!empty($form->title)){
        $title = $form->title;
    }else{
        $title = NULL;
    }
    if (!empty($form->legend)){
        $legend = $form->legend;
    }else{
        $legend = NULL;
    }
@endphp

    {{--Title component FormConfirm ====================================--}}
    {{--@props(['title', 'legend'])--}}
    @include('laraflex::ComponentParts.formconfirm.title')

@php
    $enctype = '';
    //$route = url($form->action);
    if (!empty($form->method)){
        $method = $form->method;
    }else{
        $method = 'post';
    }
    if (!empty($form->id)){
        $id = $form->id;
    }else{
        $id = 'formconfirm';
    }
    $nbtn = 0;

    $arrayIcon = ['address-card', 'archive', 'building', 'clipboard-list', 'copy', 'donate', 'fax',  'file-image', 'id-card',
    'weight', 'volleyball-ball', 'users-cog', 'truck-loading', 'store', 'pallet', 'basketball-ball',  'film', 'file-archive',
    'baseball-ball', 'cogs'];

    $buttonActive = '';
    $id = $form->id;
    $items = $form->items;
@endphp

{{--Items buttons component FormConfirm ====================================--}}
{{--@props(['items', 'nbtn', 'id', 'util', 'arrayIcon'])--}}
<x-laraflex::formconfirm.items :items="$items" :nbtn="$nbtn" :id="$id" :util="$util" :arrayIcon="$arrayIcon" />

</div>
</div>
</div>
</section>
@else
 {{--messageNull component Blogcardes ==========================================--}}
<x-laraflex::shared.messagenull />
@endif

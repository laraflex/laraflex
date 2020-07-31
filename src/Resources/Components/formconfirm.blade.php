@if (!empty($objeto))
    @php
        $form = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $form = $object;
    @endphp
@endif

@if (!empty($form) && $form->items)
<section id="form" class="pb-1 pt-3 pt-md-4">
<div class="container-xl px-0">
<div class="mx-0 mb-0 mt-1 px-2 px-lg-3 px-xl-0">
<div class=" mb-3x px-3 px-xl-4 pb-2 {{$border}}">
    <div class="pt-2 pb-3 text-left">
        @if (!empty($form->title))
        <div class="form-title text-left pt-2 pb-2" style="font-size:calc(1.1em + 0.6vw);line-height:calc(14px + 1.3vw);">
        {{$form->title}}</div>
        @endif
        @if (!empty($form->legend))
        <div class="form-item-shared text-left" style="font-size:calc(0.76em + 0.25vw);line-height:calc(14px + 0.3vw);">
        <span style="color:gray">{{$form->legend}}</span></div>
        @endif
        </div>
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

@endphp

<form method="get" id="{{$id}}">
@if (!empty($form->token) && $form->token === false)
{{--Caso falso--}}
@else
@csrf
@endif

@foreach ($form->items as $iconKey => $item)
@if (!empty($item->type) && $item->type == 'button')
    @php

    if (!empty($nbtn == 0)){
        $btnColor = 'dark';
        $btnBorder = '';
    }else{
        $btnColor = '';
        $btnBorder = 'btn-outline-dark';
    }
    if (!empty($item->action)){
        $action = $util->toRoute($item->action . '/' . $form->id);
    }
    $nbtn ++;
    @endphp
    @if (!empty($action))
    <a type="button" href="{{$action}}" class="btn btn-{{$btnColor}} {{$btnBorder}} pl-2 mb-2">
    <i class="fas fa-{{$arrayIcon[$iconKey + 5]}}"></i>
    <span class="px-2">{{__($item->label)}}</span>
    </a>

    @endif
@endif
@endforeach
</form>
</div>
</div>
</div>
</section>
@endif

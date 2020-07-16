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
<div class=" mb-3 p-3 px-xl-4 pb-4 {{$border}}">
    <div class="pt-2 pb-3 text-left">
        @if (!empty($form->title))
        <div class="form-title text-left pt-2 pb-2" style="font-size:calc(1.1em + 0.6vw);line-height:calc(14px + 1.3vw);">
        {{$form->title}}</div>
        @endif
        @if (!empty($form->legend))
        <div class="form-item-shared text-left pb-2" style="font-size:calc(0.76em + 0.25vw);line-height:calc(14px + 0.3vw);">
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

@endphp
<form method="{{$method}}" id="{{$id}}">
@if (!empty($form->token) && $form->token === false)
{{--Caso falso--}}
@else
@csrf
@endif
@foreach ($form->items as $item)
@if (empty($item->type) OR $item->type != 'button')
@if (!empty($item->name) && !empty($item->id) && !empty($item->value))
<input type="hidden" class="{{$item->name}}" id="{{$item->id}}" name="{{$item->name}}" value="{{$item->value}}">
@endif
@elseif (!empty($item->type) && $item->type == 'button')
    @php

    if (!empty($nbtn == 0)){
        $btnColor = 'secondary';
        $btnBorder = '';
    }else{
        $btnColor = '';
        $btnBorder = 'btn-outline-secondary';
    }
    if (!empty($item->action)){
        $action = $util->toRoute($item->action);
    }
    $nbtn ++;

    @endphp
    @if (!empty($action))
    <input type="submit" onclick="action='{{$action}}';" class="btn btn-sm btn-{{$btnColor}} {{$btnBorder}} px-3" value="{{__($item->label)}}" />
    @endif
@endif
@endforeach
</form>
</div>
</div>
</div>
</section>
@endif

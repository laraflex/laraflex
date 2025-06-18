@props(['method','route','panelId','panelItems','panelButton' ])
<form class="form-inline mt-2 mt-md-3" method="{{$method}}" action="{{$route}}" id="{{$panelId}}">
    @csrf
    {{--<input type="hidden" id="id" name="id" value="{{$panelId}}" />--}}

@if (!empty($panelItems))
@foreach ($panelItems as $i => $item)
    {{--Input increment--}}
    @if (!empty($item->type) && $item->type == 'increment')

    <div class="d-none d-md-block">
    <a href="#" onclick="decrementaValor(1); return false;" >
    <span class="pe-1 " style="font-size:20px;color:#000000;">-</span></a>
    <a href="#" onclick="incrementaValor(10);return false;">
    <span class="ps-1 pe-2" style="font-size:16px;color:#000000;">+</span></a>
    </div>
    <div class="form-groupx plx-2 mb-2 p-0 pe-2">
    <div class="ps-2 m-0" style="font-size:calc(0.65em + 0.2vw)">{{$item->label}}</div>
    <input type="text" name="{{$item->name}}" id="increment" value="1" style="width: 45px;" class="form-control m-0">
    </div>


    @elseif(!empty($item->type) && $item->type == 'select')
    <div class="form-groupx mb-2 me-2">
    <div class="ps-2 text-left" style="font-size:calc(0.65em + 0.2vw)">{{$item->label}}</div>
    <select id="{{$item->id}}" class="form-select" name="{{$item->name}}" style="font-size:calc(0.76em + 0.25vw);line-height: 2;" >
    <option value="" style="font-sizex:calc(0.76em + 0.25vw); line-height: 1.5;">{{$item->label}}...</option>
    @if (!empty($item->options))
    @foreach ($item->options as $key => $option)
    @if ($key == 0)
    <option value="{{$option->value}}" style="font-sizex:calc(0.76em + 0.25vw); line-height:2;"  selected="selected">
    @else
    <option value="{{$option->value}}" style="font-sizex:calc(0.76em + 0.25vw); line-height:2;">
    @endif
    <span class="border">
    {{$option->label}}
    </span>
    </option>
    @endforeach
    @endif
    </select>
    </div>
    @endif

    @if (!empty($item->type) && $item->type == 'hidden')
    @php
        if (!empty($item->name)){
            $name = $item->name;
            if (!empty($item->id)){
                $id = $item->id;
            }else{
                $id = $name;
            }
        }else{
            $name = NULL;
        }
        if (!empty($item->value)){
            $value = $item->value;
        }else{
            $value = NULL;
        }
    @endphp
    <input type="hidden" class="{{$name}}" id="{{$id}}" name="{{$name}}" value="{{$value}}" />
    @endif
@endforeach
@endif
@php
    if (!empty($panelItems)){
        $marginTop = 'mt-3';
    }else{
        $marginTop = '';
    }
@endphp
<div class="p-1">
<button type="submit" class="btn btn-light btn-outline-secondary mb-0 {{$marginTop}}"  style="font-size:calc(0.76em + 0.25vw);line-height:calc(1.1em + 0.28vw);">
{{$panelButton}}</button>
</div>
</form>

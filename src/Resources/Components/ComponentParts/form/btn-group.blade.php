@props(['buttons', 'btnColorTmp', 'btnBorderTmp',])
@if (!empty($buttons))
<div class="ml-3 md-3">
    @foreach ($buttons as $key => $btn)
    @php
    if ($key == 0){
        $btnColor = 'secondary';
        $btnBorder = '';
    }else{
        $btnColor = $btnColorTmp;
        $btnBorder = $btnBorderTmp;
    }
    if (!empty($btn->disabled) && $btn->disabled === true){
        $disabled = 'disabled';
    }else{
        $disabled = '';
    }
    @endphp
    @if ($btn->subType == 'submit' OR $btn->subType == 'reset')
    @if (!empty($btn->legend) && $key == 0)
    <div class="pb-2"><small><i>* {{$btn->legend}}</i></small></div>
    @endif
    <button type="{{$btn->subType}}" class="btn btn-sm btn-{{$btnColor}} {{$btnBorder}} px-3" {{$disabled}}>{{__($btn->label)}}</button>
    @endif
    @endforeach
</div>
@endif

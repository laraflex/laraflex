@props(['items', 'nbtn', 'id', 'util', 'arrayIcon'])
@foreach ($items as $iconKey => $item)
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
        $action = $util->toRoute($item->action . '/' . $id);
    }else{
        $action = NULL;
    }
    $nbtn ++;
    @endphp
    @if (!empty($action))
    @php
        if (!empty($item->inactive) && $item->inactive == true){
           $buttonActive = 'disabled';
        }else{
           $buttonActive = '';
        }
    @endphp
    <a type="button" href="{{$action}}" class="btn btn-{{$btnColor}} {{$btnBorder}} pl-2 mb-2 {{$buttonActive}}">
    <i class="fas fa-{{$arrayIcon[$iconKey + 5]}}"></i>
    <span class="px-2">{{__($item->label)}}</span>
    </a>
    @endif
@endif
@endforeach

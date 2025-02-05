@props(['items','btnColorTmp','btnBorderTmp','updateId', 'util'])
@if (!empty($items))
    {{--Bloco de adição de botões ------------------------}}
    <div class="d-block d-sm-block">
    @foreach ($items as $key => $btn)

    @php
    if ($key == 0){
        $btnColor = 'secondary';
        $btnBorder = '';
    }else{
        $btnColor = $btnColorTmp;
        $btnBorder = $btnBorderTmp;
    }

    if (!empty($btn->disabled) && $btn->disabled === true){
        $active = 'disabled';
    }else{
        $active = '';
    }
    if (empty($updateId)){
        $active = 'disabled';

    }
    @endphp

    @if ($btn->subType == 'submit' OR $btn->subType == 'reset')
    @if (!empty($btn->legend) && $key == 0)
    <div class="pb-2"><small><i>* {{$btn->legend}}</i></small></div>
    @endif
    <button type="{{$btn->subType}}" class="btn btn-{{$btnColor}} {{$btnBorder}}" {{$active}} style="font-size:calc(0.6em + 0.5vw);">{{$btn->label}}</button>

    @elseif($btn->subType == 'btn' OR $btn->subType == 'button')
    @php
        $btnColor = $btnColorTmp;
        $btnBorder = $btnBorderTmp;
        $btnStatus = '';
        if (!empty($btn->action) && !empty($btn->active)){
            if ($btn->action == 'suspend' && $btn->active == 0){
                $btnStatus = 'disabled';
                $btnColor = 'secondary';
                $btnBorder = '';
            }elseif($btn->action == 'publish' && $btn->active == 1){
                $btnStatus = 'disabled';
                $btnColor = 'secondary';
                $btnBorder = '';
            }
        }
        if (!empty($btn->action) && $btn->action == 'close'){
            $route = $util->toRoute($btn->route);
        }else{
            $route = $util->toRoute($btn->route, $form->updateId);
        }

    @endphp
    <a href="{{$route}}" class="btn btn-{{$btnColor}} {{$btnBorder}} {{$btnStatus}}" tabindex="-1" role="button" style="font-size:calc(0.6em + 0.5vw);">{{$btn->label}}</a>

    @endif
    @endforeach
    </div>
@endif


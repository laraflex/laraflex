@php
/**
 * --------------------------------------------------------------
 * Modelo para criação de componentens Laraflex
 * A variável da instancia do componente está em letra maiúscula para facilitar
 * ser identificada. Geralmente está variável é definida com letra minúscula
 */

if(!empty($object)) {
    $COMPONENTNAME = $object;
}
@endphp

@if (!empty($COMPONENTNAME) && !empty($imagecontrolpanel->items))
<section id="image-control-panel" class="pb-1 pt-2 pt-md-3">

{{--BLOCO PARA COMPONENTES VUEJS --}}
{{--Caso não seja utilizada, deve ser retirada--}}

@if (!empty($COMPONENTNAME->vuejsComponents))
    @php
        $vuejsComponents = $COMPONENTNAME->vuejsComponents;
    @endphp
    @include('components.vuejsComponents')
@endif

{{--FIM DE BLOCO PARA COMPONENTES VUEJS--}}

<div class="container-xl pl-0 pr-0 pr-sm-0">
<div class="mx-0 mb-0 mt-1 px-2 px-md-3 px-xl-0">
{{--INICIO DE BLOCO DE COMPONENTE--}}

@if(!empty($COMPONENTNAME->title))
    <div class="text-center pt-3 pb-2" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);">
    {{$COMPONENTNAME->title}}</div>
    @if (!empty($COMPONENTNAME->legend))
    <div class="text-center pb-3" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);">
    <span>{{$COMPONENTNAME->legend}}</span></div>
    @else
    <div class="pt-2"></div>
    @endif
@endif

    </div class="{{$border}}">
    {{--ADICIONE AQUI SUA LÓGICA DE APRESENTAÇÃO--}}
    </div>

{{--FIM DE BLOCO DE COMPONENTE--}}
</div>
</div>
</section>
@else
<div class="container-xl mt-4 pb-2 px-2 px-md-3 px-xl-0"" translation="no">
    <div class="alert alert-primary {{$border}}" role="alert">
    <div class="content-message alert-heading" style="font-size:calc(0.85em + 0.4vw)"><strong>{{__('Message')}}!</strong></div>
    <hr class="d-none d-sm-block">
    <div class="mb-0" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.18vw);">{{ __('There are no items to display.') }}</div>
    </div>
</div>
@endif

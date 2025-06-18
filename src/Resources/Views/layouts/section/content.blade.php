@php
if(!empty($objectConfig)){
   $objetoConfig = $objectConfig;
}

    if (!empty($objetoConfig->bgStyle->border)){
        $border = $util->toStyleBorder($objetoConfig->bgStyle->border);
    }else{
        $border = NULL;
    }

    $contentClass = config('laraflex.contentClass');

@endphp
{{--INICIO DO BLOCO DE CONTENT--}}
@if (!empty($objetoConfig->components))

@if (!empty($objetoConfig->onePage) && $objetoConfig->onePage === true)
<main id="content" class="pt-3 pt-sm-4" style="min-height:calc(52vh);">
@else
<main id="content" class="pt-3 pt-sm-2" style="min-height:calc(52vh);">
@endif
@if (!empty($contentClass) && $contentClass == 'container-fluid')
<div class="container-fluid" style="min-height:calc(43vh);">
@else
<div class="container-xl px-0" style="min-height:calc(43vh);">
@endif
{{-- Bloco de mensagem e alerta--------------------------}}
@if(session('alert'))
<div class="container-xl px-2 px-md-3 px-xl-0 mt-4">
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="alert-heading">{{__('Alert')}}!</h4>
        <hr>
        <div class="mb-2">{!! session('alert') !!}</div>
    </div>
</div>
{{--Session Errors ------------------------------------------------}}
@elseif(session('errors'))
    @php
        $errorsArray = json_decode(session('errors'));
        $message = '';
        foreach ($errorsArray as $key => $messages){
            foreach ($messages as $error){
                $message .= $error . '<br/>';
            }
        }
    @endphp
    <div class="container-xl px-2 px-md-3 px-xl-0 mt-4">
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <div class="content-message alert-heading" style="font-size:calc(0.85em + 0.4vw)"><strong>{{__('Alert')}}!</strong></div>
        <hr class="d-none d-sm-block">
        <div class="mb-0" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.18vw);">{!! $message !!}</div>
    </div>
    </div>
{{--End Session Errors ---------------------------------------------}}
@elseif(session('message'))
    <div class="container-xl px-2 px-md-3 px-xl-0 mt-4">
    <div class="alert alert-primary" role="alert">
        <div class="content-message alert-heading" style="font-size:calc(0.85em + 0.4vw)"><strong>{{__('Message')}}!</strong></div>
        <hr class="d-none d-sm-block">
        <div class="mb-0" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.18vw);">{!! session('message') !!}</div>
    </div>
    </div>
@elseif(!empty($alert))
    <div class="container-xl px-2 px-md-3 px-xl-0 mt-4">
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <div class="content-message alert-heading" style="font-size:calc(0.85em + 0.4vw)"><strong>{{__('Alert')}}!</strong></div>
        <hr class="d-none d-sm-block">
        <div class="mb-0" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.18vw);">{!! $alert !!}</div>
    </div>
    </div>
@elseif(!empty($message))
    <div class="container-xl px-2 px-md-3 px-xl-0 mt-4">
    <div class="alert alert-success" role="alert">
        <div class="content-message alert-heading" style="font-size:calc(0.85em + 0.4vw)"><strong>{{__('Message')}}!</strong></div>
        <hr class="d-none d-sm-block">
        <div class="mb-0" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.18vw);">{!! $message !!}</div>
    </div>
    </div>
@endif
{{--Fim bloco de mensagem e alerta--------------------------}}

{{--@if (!empty($objetoConfig->components))
{{-- Início do bloco lógico -------------------------------}}
    @foreach ($objetoConfig->components as $object)
        @if (!empty($object))
            @if (strtolower($object->type) == 'content')
            @php
            $component = strtolower($object->component);
            @endphp
            @if(!empty($object->pathComponents))
            @php
            $object->pathComponent = strtr($object->pathComponent, '/', '.');
            $object->pathComponent = strtr($object->pathComponent, '\\', '.');
            @endphp
            @include($object->pathComponents . '.' . $component)
            @else
            @include('laraflex::' . $component)
            @endif
            @endif
        @endif
    @endforeach
{{-- fim do bloco lógico ----------------------------------}}


{{--@endif--}}



</div>
@if (!empty($objetoConfig->onePage) && $objetoConfig->onePage === true)
<div class="p-sm-2"></div>
@else
{{--Icon de retorno ao topo da página--}}
<div class="w-100 pb-sm-3 d-none d-sm-block">
<a href="#top">
<img src="{{$util->toImage('local/images/icons', 'setadupla.png')}}" width="25" height="25" class="rounded-circle mx-auto d-block">
</a>
</div>
@endif
</main>

@endif

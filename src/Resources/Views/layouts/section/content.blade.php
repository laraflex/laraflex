@php
if(!empty($objectConfig)){
   $objetoConfig = $objectConfig;
}

    if (!empty($objetoConfig->bgStyle->border)){
        $border = $util->toStyleBorder($objetoConfig->bgStyle->border);
    }else{
        $border = NULL;
    }
@endphp
<main id="content">
@if (!empty($objetoConfig->contentClass) && $objetoConfig->contentClass = 'container-fluid')
<div class="ml-2 mr-2 ml-lg-3 mr-lg-3">
@else
<div class="container-xl">
@endif
{{-- Bloco de mensagem e alerta--------------------------}}
@if(session('alert'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="alert-heading">{{__('Alert')}}!</h4>
        <div class="mb-2">{{ session('alert') }}</div>
    </div>
@elseif(session('message'))
    <div class="alert alert-primary" role="alert">
        <h4 class="alert-heading">{{__('Message')}}!</h4>
        <div class="mb-2">{{ session('message') }}</div>
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

    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="alert-heading">{{__('Alert')}}!</h4>
        <hr>
        <div class="mb-2">{!! $message !!}</div>
    </div>
{{--End Session Errors ---------------------------------------------}}
@elseif(!empty($alert))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="alert-heading">{{__('Alert')}}!</h4>
        <div class="mb-2">{{$alert}}</div>
    </div>
@elseif(!empty($message))
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">{{__('Message')}}!</h4>
        <div class="mb-2">{!! $message !!}</div>
    </div>
@endif
{{--Fim bloco de mensagem e alerta--------------------------}}
@if (!empty($objetoConfig->components))
{{-- Início do bloco lógico -------------------------------}}
@foreach ($objetoConfig->components as $object)
@if (strtolower($object->type) == 'content')

@php
$component = strtolower($object->component);
@endphp
@if(!empty($object->pathComponents))
@include($object->pathComponents . '.' . $component)
@else
@include('laraflex::' . $component)
@endif

@endif
@endforeach
{{-- fim do bloco lógico ----------------------------------}}
</div>
</main>
@endif


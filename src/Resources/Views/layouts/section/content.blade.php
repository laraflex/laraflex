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

@if (!empty($objetoConfig->onePage) && $objetoConfig->onePage === true)
<main id="content" class="pt-3 pt-sm-4" style="min-height:calc(66vh);">
@else
<main id="content" class="pt-3 pt-sm-2" style="min-height:calc(66vh);">
@endif
@if (!empty($objetoConfig->contentClass) && $objetoConfig->contentClass != 'container')
<div class="w-100" style="min-height:calc(55vh);">
@else
<div class="container-xl px-0" style="min-height:calc(55vh);">
@endif
{{-- Bloco de mensagem e alerta--------------------------}}
@if(session('alert'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="alert-heading">{{__('Alert')}}!</h4>
        <hr>
        <div class="mb-2">{!! session('alert') !!}</div>
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
    <div class="container-xl px-3 mt-4">
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
    <div class="container-xl px-3 mt-4">
    <div class="alert alert-primary" role="alert">
        <div class="content-message alert-heading" style="font-size:calc(0.85em + 0.4vw)"><strong>{{__('Message')}}!</strong></div>
        <hr class="d-none d-sm-block">
        <div class="mb-0" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.18vw);">{!! session('message') !!}</div>
    </div>
    </div>
@elseif(!empty($alert))
    <div class="container-xl px-3 mt-4">
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
    <div class="container-xl px-3 mt-4">
    <div class="alert alert-success" role="alert">
        <div class="content-message alert-heading" style="font-size:calc(0.85em + 0.4vw)"><strong>{{__('Message')}}!</strong></div>
        <hr class="d-none d-sm-block">
        <div class="mb-0" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.18vw);">{!! $message !!}</div>
    </div>
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

    @if (empty($objetoConfig->onePage) OR $objetoConfig->onePage === false)
    {{--Icon de retorno ao topo da página--}}
    <div class="w-100 pb-sm-3 d-none d-sm-block">
    <a href="#top">
    <img src="{{$util->toImage('images/icons', 'setadupla.png')}}" width="25" height="25" class="rounded-circle mx-auto d-block">
    </a>
    </div>
    {{--End Icon de retorno ao topo da página--}}
    @else
    <div class="p-sm-2"></div>
    @endif
@endif
</div>
</main>



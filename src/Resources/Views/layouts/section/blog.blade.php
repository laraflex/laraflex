@php
if(!empty($objectConfig)){
   $objetoConfig = $objectConfig;
}
    $border = NULL;

    $contentClass = config('laraflex.contentClass');
@endphp

@if (!empty($objetoConfig->blogComponents))

<main id="BlogContent" class="" style="min-heightx:calc(50vh);">

@if (!empty($contentClass) && $contentClass == 'container-fluid')
<div class="wss-100 container-fluid mx-0" style="min-heightx:calc(43vh);">
@else
<div class="container-xl px-0" style="min-height:calc(43vh);">
@endif
{{--INICIO DE BLOCO LÓGICO--}}

<div class="row p-0 m-0">

    <div class="col-lg-8 ps-0 pe-0 ps-lg-1 pe-lg-0 ps-xl-0 pe-xl-0">
    <div class="h-100 mx-0  ">

    {{-- Início do bloco lógico -------------------------------}}
    @foreach ($objetoConfig->blogComponents as $object)
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

    </div>
    </div>

    <div class="col-lg-4 m-0 p-0">
    <div class="h-100 pe-3 pe-lg-3 ms-2 ms-xl-3 me-2 me-xl-2">

        {{-- Início do bloco lógico -------------------------------}}
    @foreach ($objetoConfig->blogComponents as $object)
    @if (!empty($object))
        @if (strtolower($object->type) == 'blogbar')
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

    {{-- fim do bloco lógico ------------------------------------}}

    </div>
    </div>

{{--FIM DO BLOCO LOGICO--}}
</div>
</div>
</main>

@endif

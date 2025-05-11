

@php
if(!empty($objectConfig)){
   $objetoConfig = $objectConfig;
}

    if (!empty($objetoConfig->bgStyle->border)){
        $border = $util->toStyleBorder($objetoConfig->bgStyle->border);
    }else{
        $border = NULL;
    }

    //dd($objetoConfig->blogComponents);
@endphp



@if (!empty($objetoConfig->blogComponents))


<main id="BlogContent" class="" style="min-height:calc(52vh);">

@if (!empty($objetoConfig->contentClass) && $objetoConfig->contentClass != 'container')
<div class="w-100 mx-0" style="min-height:calc(43vh);">
@else
<div class="container-xl px-0" style="min-height:calc(43vh);">
@endif
{{--INICIO DE BLOCO LÓGICO--}}




<div class="row mt-0 px-0">

    <div class="col-lg-9 col-xl-8 pr-0 mr-3 mr-lg-0">
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


    <div class="col-lg-3 col-xl-4">
    <div class="h-100 pr-3 pr-lg-3">


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


    {{-- fim do bloco lógico ----------------------------------

    @include('laraflex::rightbar')
    --}}

    </div>
    </div>




{{--FIM DO BLOCO LOGICO--}}
</div>
</div>
</main>

@endif

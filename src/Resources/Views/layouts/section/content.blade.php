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
@if (!empty($objetoConfig->components))
<main id="content">
<div class="container">
{{-- Início do bloco lógico -------------------------------}}
@foreach ($objetoConfig->components as $object)
@if (strtolower($object->type) == 'content')
@if(!empty($object->pathComponents))
@include($object->pathComponents . '.' . $object->component)
@else
@include('laraflex::' . $object->component)
@endif

@endif
@endforeach
{{-- fim do bloco lógico ----------------------------------}}
</div>
</main>
@endif


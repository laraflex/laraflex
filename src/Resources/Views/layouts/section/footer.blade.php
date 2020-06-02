@php
if(!empty($objectConfig)){
   $objetoConfig = $objectConfig;
}

if (!empty($objetoConfig->components->border)){
    $border = $util->toStyleBorder($objetoConfig->components->border);
}else{
    $border = NULL;
}

@endphp

@if (!empty($objetoConfig->footerComponents))
<!--Section Footer ==================================== -->
<section id="footer">
@php
if (!empty($objetoConfig->headerClass) && $objetoConfig->headerClass == 'container'){
$footerClass = 'container-xl px-0';
}else{
$footerClass = '';
}

@endphp
<div = class="{{$footerClass}} " id="FootBar">
@foreach ($objetoConfig->footerComponents as $key => $object)
{{-- Inclusão de componente de rodape ------------}}
@include('laraflex::' . $object->component)
@endforeach
</div>
</section>
@endif

@php
if(!empty($objectConfig)){
   $objetoConfig = $objectConfig;
}
@endphp

@if (!empty($objetoConfig->headerComponents))
@php
    $classContainer = "";
    if (!empty($objetoConfig->headerClass) && $objetoConfig->headerClass == 'container'){
        $classContainer = $objetoConfig->headerClass . '-xl px-0';
    }else{
        $classContainer = '';
    }
@endphp

<!--Section Header ==================================== -->
<section id="header" class="px-0">

<div id="top" class="{{$classContainer}}">
@foreach ($objetoConfig->headerComponents as $objectHeader)
{{-- Inclusão de componentes de Header--}}
@include('laraflex::' . $objectHeader->component)
@endforeach

</div>
</section>
<!--End section header ================================= -->
@endif



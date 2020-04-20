@php
if(!empty($objectConfig)){
   $objetoConfig = $objectConfig;
}
@endphp

@if (!empty($objetoConfig->headerComponents))
@php
    $classContainer = "";
    if (!empty($objetoConfig->headerClass) && $objetoConfig->headerClass == 'container'){
        $classContainer = $objetoConfig->headerClass . '-xl px-2 px-lg-3';
    }else{
        $classContainer = '';
    }
    $headerColor = $objetoConfig->headerColor;

    if ($headerColor == 'white'){
        $styleColor = 'white';
    }elseif($headerColor == 'light'){
        $styleColor = '#F2F2F2';
    }elseif($headerColor == 'dark'){
        $styleColor = '#1C1C1C';
    }elseif($headerColor == strtolower('navyblue')){
        $styleColor = '#0B173B';
    }elseif($headerColor == strtolower('bordeaux')){
        $styleColor = '#8A0808';
    }elseif($headerColor == 'black'){
        $styleColor = 'black';
    }else{
        $styleColor = 'black';
    }

    $navControl = false;
    foreach ($objetoConfig->headerComponents as $headerItem){
       if(!empty($headerItem->component == 'navbar')){

            $navControl = true;
        }
    }
    if(!empty($objetoConfig->integratedImage) && $objetoConfig->integratedImage == true){
        $integratedImage = true;
    }else{
        $integratedImage = false;
    }

@endphp

<!--Section Header ==================================== -->
<section id="header">
@if($navControl == true)

@if(!empty($objetoConfig->fixedmenu) && $objetoConfig->fixedmenu == true && $integratedImage == false)
@php
$classContainer = "";
@endphp
<div class="w-100 mb-0" style="height:65px;background-color:{{$styleColor}}">
</div>
@elseif(!empty($objetoConfig->fixedmenu) && $objetoConfig->fixedmenu == true && $integratedImage == true)
@php
$classContainer = "";
@endphp
<div class="d-block d-lg-none w-100 mb-0" style="height:65px;background-color:{{$styleColor}}">
</div>
@endif

@endif

<div class="{{$classContainer}}">
@foreach ($objetoConfig->headerComponents as $objectHeader)
{{-- Inclusão de componentes de Header--}}
@include('laraflex::' . $objectHeader->component)
@endforeach
@if($headerColor == 'bordeaux')
<div class="mb-3" style="min-height:10px;">
@else
<div class="mb-3" style="background-color:{{$styleColor}}; min-height:10px;">
@endif


</div>
</section>
<!--End section header ================================= -->
@endif



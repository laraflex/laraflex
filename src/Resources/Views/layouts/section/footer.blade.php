@php
if(!empty($objectConfig)){
   $objetoConfig = $objectConfig;
}

if (!empty($objetoConfig->components->border)){
    $border = $util->toStyleBorder($objetoConfig->components->border);
}else{
    $border = NULL;
}

$headerColor = $objetoConfig->headerColor;
if($headerColor == 'light'){
    $bgColor = 'background-color:#F2F2F2;';
    $fontColor = 'color:#1C1C1C;';
}elseif($headerColor == 'white'){
    $bgColor = 'background-color:#FFFFFF;';
    $fontColor = 'color:#1C1C1C;';
}elseif($headerColor == 'dark'){
    $bgColor = 'background-color:#1C1C1C;';
    $fontColor = 'color:#A4A4A4;';
}elseif($headerColor == 'black'){
    $bgColor = 'background-color:black;';
    $fontColor = 'color:#848484;';
}elseif($headerColor == 'navyblue'){
    $bgColor = 'background-color:#0B173B;';
    $fontColor = 'color:#BDBDBD;';
}elseif($headerColor == 'bordeaux'){
    $bgColor = 'background-color:#8A0808;';
    $fontColor = 'color:#FAFAFA;';
}else{
    $bgColor = 'background-color:black;';
    $fontColor = 'color:#848484;';
}


@endphp

@if (!empty($objetoConfig->footerComponents))
<!--Section Footer ==================================== -->
<section id="footer">
@php
if ($objetoConfig->headerClass == 'container'){
$footerClass = 'container-xl px-2 px-lg-3';
}else{
$footerClass = '';
}

if(!empty($objetoConfig->fixedmenu) && $objetoConfig->fixedmenu == true){
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

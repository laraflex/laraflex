@php
if(!empty($objectConfig)){
   $objetoConfig = $objectConfig;
}

if (!empty($objectHeader)){
    $itemHeader = $objectHeader;
    $objetoConfig->headerComponents[] = $itemHeader;
}

if (!empty($arrayObjectsHeader)){
    foreach ($arrayObjectsHeader as $objectHeader){
        $itemHeader = $objectHeader;
        $objetoConfig->headerComponents[] = $itemHeader;
    }
}

if(!empty($objetoConfig->headerComponents)){
    foreach($objetoConfig->headerComponents as $headerItem){
        if (property_exists($headerItem, "dependencies") && !empty($headerItem->dependencies)){
            foreach($headerItem->dependencies as $value){
                $objetoConfig->dependencies[] = $value;
            }
        }
    }
}

if(!empty($arrayObjetos)){
    $arrayItems = $arrayObjetos;
}elseif(!empty($arrayObjects)){
    $arrayItems = $arrayObjects;
}

/**
 * Adicionando componentes na página
 */
if(!empty($arrayItems)){

    foreach($arrayItems as $item){
        $objetoConfig->components[] = $item;
    }
}else{
    if(!empty($objeto)){
        $item = $objeto;
    }elseif(!empty($object)){
        $item = $object;
    }
    if (!empty($item)){
        $objetoConfig->components[] = $item;
    }
}

/**
 * Adicionando dependencias a componentes de cabeçalho
 */
 if (!empty($objetoConfig->headerComponents)){
    if (!empty($arrayListeners = $objectListener->dependencies($objetoConfig->headerComponents))){

        foreach ($arrayListeners as $itemListener){
            foreach($itemListener as $item){
                $objetoConfig->dependencies[] = $item;
            }
        }


    }
 }

/**
 * Adicionando dependencias de componentes
 */
if (!empty($objetoConfig->components)){

    if (!empty($arrayListeners = $objectListener->dependencies($objetoConfig->components))){
        foreach ($arrayListeners as $itemListener){
            foreach($itemListener as $item){
                $objetoConfig->dependencies[] = $item;
            }
        }

    }

    foreach ($objetoConfig->components as $item){
        if (property_exists($item, "dependencies") && !empty($item->dependencies)){
            foreach($item->dependencies as $value){
                $objetoConfig->dependencies[] = $value;
            }
        }
    }
}

//********************************************************************

$arrayLinks = array();
$arrayStyles = array();
@endphp

@if(!empty($objetoConfig->dependencies))

@foreach ($objetoConfig->dependencies as $item)
@if ($item->type == 'link')
{{--Verificação de links repetidos ----------------------- --}}
@if (!in_array($item->link, $arrayLinks))
{{--Importação de arquivo css --------------------------------}}
<link rel="stylesheet" href="{{$item->link}}">
{{-- ------------------------------------------------------ --}}
@php
$arrayLinks[] = $item->link;
@endphp
@endif
@endif

@if ($item->type == 'local')
    <link rel="stylesheet" href="{{$util->toRoute($item->link)}}">
@endif
@endforeach

{{-- *********************************************************** --}}
@foreach ($objetoConfig->dependencies as $item)
@if ($item->type == 'style')
{{--Verificação de links repetidos ----------------------- --}}
@if (!in_array($item->style, $arrayStyles))
{{--Inclusão de script ---------------------------------------}}
<style type="text/css">{{$item->style}}</style>
{{-- ------------------------------------------------------ --}}
@php
$arrayStyles[] = $item->style;
@endphp
@endif
@endif
@endforeach
@endif
@if (!empty($objetoConfig->title))
<title>{{$objetoConfig->title}}</title>
@endif


@php
if(!empty($objectConfig)){
   $objetoConfig = $objectConfig;
}

if(!empty($arrayObjetos)){
    $arrayItems = $arrayObjetos;
}elseif(!empty($arrayObjects)){
    $arrayItems = $arrayObjects;
}
if(!empty($arrayItems)){
    foreach($arrayItems as $item){
        $objetoConfig->components[] = $item;
        if (property_exists($item, "dependencies") && !empty($item->dependencies)){
            foreach($item->dependencies as $value){
                $objetoConfig->dependencies[] = $value;
            }
        }
    }
}else{
    if(!empty($objeto)){
        $item = $objeto;
    }elseif(!empty($object)){
        $item = $object;
    }
    if (!empty($item)){
        $objetoConfig->components[] = $item;
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


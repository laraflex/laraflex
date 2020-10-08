@php
if(!empty($objectConfig)){
   $objetoConfig = $objectConfig;
}

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


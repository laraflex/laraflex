@php
if(!empty($objectConfig)){
   $objetoConfig = $objectConfig;
}
@endphp

@if (!empty($objetoConfig->meta))
@foreach ($objetoConfig->meta as $item)
<meta name="{{$item->name}}" content="{{$item->content}}">
@endforeach
@endif

@if ($objetojs->component == 'mask')
@php
    $mask = $objetojs;
@endphp
@endif


@if (!empty($mask))

<!-- Plugin de mascara de formulário ---------->
<script>
$(document).ready(function(){
{{--Adiciona todas as mascaras definidas nas dependências--}}
@foreach ($mask->items as $item)
@if (property_exists($item, "option"))
$('.{{$item->fieldName}}').mask('{{$item->mask}}', { {{$item->option}} });
@elseif (property_exists($item, "translation"))
$('.{{$item->fieldName}}').mask('{{$item->mask}}', {translation: { {{$item->translation}} } });
@else
$('.{{$item->fieldName}}').mask('{{$item->mask}}');
@endif
@endforeach

});
</script>

@endif

{{-- Plugin de validação de formulários --}}
@if ($objetojs->component == 'validator')
@php
    $validate = $objetojs;
@endphp
@endif

@if (!empty($validate))
<!-- Plugin de validação de formulários --------------->
<script>
$(function(){
$("#{{$validate->formName}}").validate({
    rules: {
    @foreach ($validate->items as $item)
    {{$item->fieldName}}:{
        @foreach ($item->rules as $rules)
            @if(!empty($rules->attribute))
               @if(!empty($rules->type) && $rules->type == 'string')
               {{$rules->attribute}}:"{{$rules->value}}",
               @else
               {{$rules->attribute}}:{{$rules->value}},
               @endif

            @endif
        @endforeach
        },
    @endforeach
    },
    messages: {
    @foreach ($validate->items as $item)
    {{$item->fieldName}}:{
        @foreach ($item->rules as $rules)
            @if(!empty($rules->attribute))
                {{$rules->attribute}}:"{{$rules->message}}",
            @endif
        @endforeach
        },
    @endforeach
    }
});
});
</script>
@endif



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
             {{$rules->type}}:{{$rules->value}},
        @endforeach
        },
    @endforeach
    },
    messages: {
    @foreach ($validate->items as $item)
    {{$item->fieldName}}:{
        @foreach ($item->rules as $rules)
             {{$rules->type}}:"{{$rules->message}}",
        @endforeach
        },
    @endforeach
    }
});
});
</script>
@endif



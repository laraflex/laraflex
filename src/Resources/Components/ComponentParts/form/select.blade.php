@props(['labelstyle', 'textalign', 'inputstyle','itemsoption', 'legendoption', 'itemlabel', 'itemname', 'id', 'required'])
<div class="form-group">
<div class="row mb-2 mb-md-3">
<div class="{{$labelstyle}}">
@if (!empty($itemlabel) && !empty($itemname))
<label for="{{$itemname}}" class="col-form-label {{$textalign}} w-100 py-0" style="font-size:calc(14px + 0.10vw);">{{$itemlabel}}:</label>
@endif
</div>
<div class="{{$inputstyle}}">

{{--adiciona regras regras de validação--}}
@if (!empty($required) && $required === true)
<select id="{{$id}}" class="form-select  {{$itemname}}" name="{{$itemname}}" required>
@else
<select id="{{$itemid}}" class="form-select {{$itemname}}" name="{{$itemname}}">
@endif
{{---------------------------------------}}
@if (!empty($legendoption))
<option value="" style="font-size:calc(14px + 0.10vw);">{{$legendoption}}...</option>
@else
<option value="">...</option>
@endif
@foreach ($itemsoption as $key => $option)
    @php
        $value = $option->value;
        $label = $option->label;
    @endphp
    {{--Option comonent select ==================================--}}
    {{--@props(['value', 'label'])--}}
    <x-laraflex::form.option :value="$value" :label="$label" />
@endforeach
</select>

</div>
</div>
</div>

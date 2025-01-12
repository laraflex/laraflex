@props(['labelstyle', 'textalign','inputstyle','labelcomponent', 'itemscomponent', 'name', 'subtype', 'required'])
<fieldset class="form-group">
<div class="row mb-2 mb-md-3">
    <div class="{{$labelstyle}}">
    @if (!empty($labelcomponent) && !empty($name))
    <legend for="{{$name}}" class="col-form-label {{$textalign}} w-100 py-0" style="font-size:calc(14px + 0.10vw);">{{$labelcomponent}}:</legend>
    @endif
    </div>
    <div class="{{$inputstyle}}">
    {{--Adiciona um grupo de Radio ou de checkbox--}}
    @foreach ($itemscomponent as $key => $option)
    @php
        $label = $option->label;
        $value = $option->value;
        if (!empty($option->id)){
            $id = $option->id;
        }else{
            $id = $name;
        }
        if ($loop->first){
            $checked = "checked";
        }else{
            $checked = "";
        }
    @endphp

    {{--radio component fieldset ====================================--}}
    @if($subtype == 'radio')
    {{--@props(['name', 'id', 'value', 'label', 'checked', 'required'])--}}
    <x-laraflex::form.radio :name="$name" :id="$id" :value="$value" :label="$label" :checked="$checked" :required="$required" />

    {{--checkbox component fieldset ====================================--}}
    @elseif($subtype == 'checkbox')
    {{--@props(['name','id', 'value', 'label', 'required'])--}}
    <x-laraflex::form.checkbox :name="$name" :id="$id" :value="$value" :label="$label" :required="$required" />
    @endif
    @endforeach
    </div>
</div>
</fieldset>

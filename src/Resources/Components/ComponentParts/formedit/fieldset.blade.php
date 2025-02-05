@props(['name','label','labelStyle','items','subType','currentValue','required','textAlign','inputStyle'])

<fieldset class="form-group">
    <div class="row">
    <div class="{{$labelStyle}}">
    @if (!empty($label) && !empty($name))
    <legend for="{{$name}}" class="col-form-label {{$textAlign}} w-100">{{$label}}:</legend>

    @endif
    </div>
    <div class="{{$inputStyle}}">
    @if (!empty($items))

    {{--Adiciona um grupo de Radio ou de checkbox--}}
    @foreach ($items as $key => $option)
    @php
        if (!empty($option->id)){
            $id = $option->id;
        }else{
            $id = $label;
        }
    @endphp
    @if($subType == 'radio')
    <div class="form-check">
    <input class="form-check-input {{$name}}" type="{{$subType}}" name="{{$name}}" id="{{$id}}" for="{{$id}}"
    value="{{$option->value}}"
    @if ($option->value == $currentValue)
    checked
    @endif

    {{--adiciona regras regras de validação--}}
    @if (!empty($required) && $required === true)
    required />
    @else
    />
    @endif
    {{--Fim de regra de validação -----------}}
    <label class="form-check-label" for="{{$name}}">
    {{$option->label}}
    </label>
    </div>

    @elseif($subType == 'checkbox')
    <div class="form-check">
    <input class="form-check-input {{$name}}" type="{{$subType}}" name="{{$name}}" id="{{$id}} for="{{$id}}"
    value="{{$option->value}}"
    @if ($option->value == $currentValue)
    checked
    @endif
    >
    <label class="form-check-label" for="{{$name}}">
    {{$option->label}}
    </label>
    </div>
    @endif
    @endforeach
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.')}}.</h5>
    @endif
    </div>
    </div>
</fieldset>

@props(['name', 'label','id','labelStyle','legendOption', 'items', 'currentValue', 'required', 'textAlign', 'inputStyle'])
<div class="form-group">
    <div class="row">
    <div class="{{$labelStyle}}">
    @if (!empty($label) && !empty($name))
    <label for="{{$name}}" class="col-form-label {{$textAlign}} w-100">{{$label}}:</label>
    @endif
    </div>
    <div class="{{$inputStyle}}">
    @if (!empty($name) && !empty($id))
     {{--adiciona regras regras de validação--}}
     @if (!empty($required) && $required === true)
     <select id="{{$id}}" class="custom-select  {{$name}}" name="{{$name}}" required>
     @else
     <select id="{{$id}}" class="form-control {{$name}}" name="{{$name}}">
     @endif
     {{---------------------------------------}}
    <option>{{$legendOption}}...</option>
    @if (!empty($items))
    @foreach ($items as $key => $option)
    @if ($option->value == $currentValue)
    <option selected value="{{$option->value}}">{{$option->label}}</option>
    @else
    <option value="{{$option->value}}">{{$option->label}}</option>
    @endif

    @endforeach
    @endif

    </select>
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }}.</h5>
    @endif
    </div>
    </div>
    </div>

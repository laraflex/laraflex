@props(['name', 'label','id', 'labelStyle', 'currentValue', 'required', 'textAlign', 'inputStyle', 'properties'])
<div class="form-group my-2">
<div class="row">
<div class="{{$labelStyle}}">
@if (!empty($label) && !empty($name))
<label for="{{$name}}" class="col-form-label {{$textAlign}} w-100">{{$label}}:</label>
@endif
</div>
<div class="{{$inputStyle}}">
@if (!empty($name) && !empty($id))

@if (!empty($required) && $required === true)
<textarea class="form-control {{$name}}" id="{{$id}}" {!!$properties!!} name="{{$name}}" style="width:100%" required>
@else
<textarea class="form-control {{$name}}" id="{{$id}}" {!!$properties!!} name="{{$name}}" style="width:100%">
@endif
@if (!empty($currentValue))
{!!$currentValue!!}
@endif
</textarea>
@else
<h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }}.</h5>
@endif
</div>
</div>
</div>


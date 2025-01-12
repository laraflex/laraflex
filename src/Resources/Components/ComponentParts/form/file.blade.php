@props([ 'fileConfig', 'labelStyle', 'textAlign', 'inputStyle', 'properties', 'marginFile', 'label', 'name', 'id', 'multiple'])
@if ($fileConfig === true)
<div class="form-group row mb-2 mb-md-3 px-3">
<div class="{{$labelStyle}}">
    <label for="{{$name}}" class="col-form-label {{$textAlign}} w-100 py-0" style="font-size:calc(14px + 0.10vw);">{{$label}}:</label>
</div>
<div class="{{$inputStyle}}">
    <input type="file" class="mb-2 form-control-file {{$marginFile}} {{$name}}" {!!$properties!!} id="{{$id}}" name="{{$name}}" style="font-size:90%;" {!!$multiple!!} $required>
</div>
@else
    <div class="{{$inputStyle}}">
    <label class="mb-2 {{$marginFile}}" for="customFile">{{__($label)}}</label>
    <input type="file" class="mb-2 form-control-file {{$marginFile}} {{$name}}" {!!$properties!!} id="{{$id}}" name="{{$name}}" style="font-size:90%;" {!!$multiple!!} $required>
    </div>
@endif


</div>
</div>

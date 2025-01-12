@props(['type', 'labelStyle', 'textAlign', 'inputStyle', 'name', 'id', 'value', 'label','properties', 'required'])
<div class="form-group row mb-2 mb-md-3">
<div class="{{$labelStyle}}">
<label for="{{$name}}" class="col-form-label {{$textAlign}} w-100 py-0" style="font-size:calc(14px + 0.10vw);">{{$label}}:</label>
</div>
<div class="{{$inputStyle}} form-check py-0 pl-3">
<label class="m-0">
<input type="{{$type}}" class="form-control" {{$name}} " id="{{$id}}" name="{{$name}}" {!!$properties!!} {!!$value!!} $required />
</label>
</div>
</div>

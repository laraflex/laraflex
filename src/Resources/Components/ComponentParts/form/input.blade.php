@props(['type','labelStyle','textAlign','inputStyle', 'name', 'id','width', 'value', 'label','properties', 'pattern', 'rules'])
<div class="form-group row mb-2 mb-md-3">
<div class="{{$labelStyle}}">
<label for="{{$name}}" class="col-form-label {{$textAlign}} w-100 py-0" style="font-size:calc(14px + 0.10vw);">{{$label}}:</label>
</div>
<div class="{{$inputStyle}}">
<input type="{{$type}}" class="form-control {{$name}}{{$width}}" id="{{$id}}" name="{{$name}}" {!!$properties!!} {{$value}} {{$rules}} {!!$pattern!!}/>
</div>
</div>

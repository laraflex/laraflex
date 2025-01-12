@props(['name', 'id', 'value', 'label', 'required'])
<div class="form-check">
<input class="form-check-input {{$name}}" type="checkbox" name="{{$name}}" id="{{$id}}" value="{{$value}}" {{$required}} />
<label class="form-check-label" for="{{$id}}" style="font-size:calc(14px + 0.10vw);">
{{$label}}
</label>
</div>

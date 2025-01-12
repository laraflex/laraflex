@props(['labelstyle','textalign','inputstyle','label','name','id','properties','required'])
<div class="form-group">
<div class="row mb-2 mb-md-3">

<div class="{{$labelstyle}}">
@if (!empty($label) && !empty($name))
<label for="{{$name}}" class="col-form-label {{$textalign}} w-100 py-0" style="font-size:calc(14px + 0.10vw);">{{$label}}:</label>
@endif
</div>
<div class="{{$inputstyle}}">
<textarea class="form-control {{$name}}" id="{{$id}}" {!!$properties!!} name="{{$name}}" style="width:100%" {{$required}}></textarea>
</div>

</div>
</div>


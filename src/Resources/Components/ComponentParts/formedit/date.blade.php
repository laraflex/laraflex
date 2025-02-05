@props(['item', 'labelStyle', 'textAlign', 'inputStyle','util'])
<div class="form-group row mb-2 mb-md-3">
    <div class="{{$labelStyle}}">
    @if (!empty($item->label) && !empty($item->name))
    <label for="{{$item->name}}" class="col-form-label {{$textAlign}} w-100 py-0" style="font-size:calc(14px + 0.10vw);">{{$item->label}}:</label>
    @endif
    </div>
    <div class="{{$inputStyle}} form-check py-0 pl-3">
        @if (!empty($item->name) && !empty($item->id))
        <label class="m-0">
        <input type="{{$item->type}}" class="form-control" {{$item->name}} " id="{{$item->id}}" name="{{$item->name}}"
        @if (!empty($item->currentValue))
        value="{{$item->currentValue}}"
        @endif
        @if (!empty($item->required) && $item->required === true)
        required />
        @else
        />
        @endif
        </label>
        @else
        <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }}.</h5>
        @endif
    </div>
    </div>

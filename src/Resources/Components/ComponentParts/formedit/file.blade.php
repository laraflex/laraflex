@props(['item', 'labelStyle', 'textAlign', 'inputStyle', 'util'])
<div class="{{$labelStyle}}">

    @if (!empty($item->label) && !empty($item->name))
    <!--label for="{{$item->name}}" class="col-form-label {{$textAlign}} w-100">{{$item->label}}:</label-->
    @endif
    </div>
    <div class="{{$inputStyle}}">
    @if (!empty($item->name) && !empty($item->id))

    {{--adiciona regras regras de validação--}}
    @php
    if (!empty($item->attributes)){
        $properties = $item->attributes;
    }else{
        $properties = '';
    }
    if (!empty($item->label)) {
        $label = $item->label;
    }else {
        $label = 'Add a file';
    }
    @endphp
    @if (!empty($item->required) && $item->required === true)
    <label class="mb-2 form-label" for="{{$item->id}}">{{__($label)}}</label>
    <input type="file" class="mb-2  form-control-file {{$item->name}}" {!!$properties!!} id="{{$item->id}}" name="{{$item->name}}" style="font-size:90%" required />
    @else
    <label class="mb-2 form-label" for="{{$item->id}}">{{__($label)}}</label>
    <input type="file" class="mb-2  form-control-file {{$item->name}}" {!!$properties!!} id="{{$item->id}}" name="{{$item->name}}" style="font-size:90%;" />
    @endif

    @if (property_exists($item, "imageStorage") && !empty($item->imageStorage))
    <div class="mb-0 p-2">
    <img src="{{$item->imageStorage}}" style="widht:100px; height:100px;">
    <input type="hidden" class="currentImage" id="currentImage" name="currentImage" value="{{$item->imageStorage}}">
    </div>
    @elseif (property_exists($item, "imagePath") && !empty($item->imagePath))
    <div class="mb-0 pt-3">
    <img src="{{$util->toImage($item->imagePath)}}" style="widht:100px; height:100px;">
    <input type="hidden" class="currentImage" id="currentImage" name="currentImage" value="{{$item->imagePath}}">
    </div>
    @elseif (property_exists($item, "image") && !empty($item->image))
    <div class="mb-0 pt-2">
    <img src="{{$util->toImage($item->image)}}" style="widht:100px; height:100px;">
    <input type="hidden" class="currentImage" id="currentImage" name="currentImage" value="{{$item->image}}">
    </div>
    @endif
    {{----------------------------------------}}
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }}.</h5>
    @endif
    </div>

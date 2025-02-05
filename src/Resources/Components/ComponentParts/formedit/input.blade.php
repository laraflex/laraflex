@props(['item', 'labelStyle', 'textAlign', 'inputStyle','util'])
<div class="form-group row">
    <div class="{{$labelStyle}}">
    @if (!empty($item->label) && !empty($item->name))
    <label for="{{$item->name}}" class="col-form-label {{$textAlign}} w-100">{{$item->label}}:</label>
    @endif
    </div>
    <div class="{{$inputStyle}}">
        @php
        if ($item->type == 'color'){
            $width = ' w-25';
        }else{
            $width = '';
        }
        @endphp
    @if (!empty($item->name) && !empty($item->id))
    @if (!empty($item->attributes))
    <input type="{{$item->type}}" class="form-control {{$item->name}}{{$width}}" id="{{$item->id}}" name="{{$item->name}}" {!!$item->attributes!!}
    @else
    <input type="{{$item->type}}" class="form-control {{$item->name}}{{$width}}" id="{{$item->id}}" name="{{$item->name}}"
    @endif
    @if (!empty($item->placeHolder))
    placeholder="{{$item->placeHolder}}"
    @endif
    @if (!empty($item->currentValue))
    value="{!!$item->currentValue!!}"
    @endif
    name="{{$item->name}}"
     {{--Adiciona regras de validação--}}
     @if (!empty($item->required) && $item->required === true)
     @php
        if (!empty($item->pattern)){
             if (!empty($item->message)){
                 $pattern = 'pattern="' . $item->pattern . '" title="' . strtoupper($item->message) . '"';
             }else{
                 $pattern = 'pattern="' . $item->pattern . '"';
             }
        }else{
            $pattern = '';
        }
     @endphp
     required {!!$pattern!!}/>
     @else
     />
     @endif
     {{--------------------------------}}
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }}.</h5>
    @endif
    </div>
    </div>


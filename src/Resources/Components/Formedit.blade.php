@if (!empty($objeto))
    @php
        $form = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $form = $object;
    @endphp
@endif

@if (!empty($form) && !empty($form->items))

@php
   if (!empty($form->textAlign)){
       if ($form->textAlign == 'left'){
           $textAlign = 'text-left';
       }
       elseif ($form->textAlign == 'right') {
           $textAlign = 'text-right';
       }else{
            $textAlign = 'text-left';
       }
   }else{
       $textAlign = 'text-left';
   }

@endphp
<!--Section formulário ------------------------------------------------------->
<section id="form">
<div class="pb-4 p-3 mb-4 mt-4 {{$border}} hiflex">
    @php
        if (!empty($form)){
            $formConfig = $form->items;
        }
    @endphp
    <div class="pt-2 pb-3 text-center">
    <h3 class="d-none d-sm-block font-weight-normal"> {{$form->title}}</h3>
    <h4 class="d-block d-sm-none font-weight-normal"> {{$form->title}}</h4>
    @if (!empty($form->legend))
        <div><small style="color:gray">{{$form->legend}}</small></div>
    @endif
    {{----------------------------------------}}
    @if(!empty($formMessage))
    <h6 class="pb-3 text-center mt-3">{{$formMessage}}</h6>
    @endif
    @if(!empty($formAlert))
    @php
    $alertColor = 'alert-primary';
    $color = array('primary', 'secundary', 'success', 'danger', 'warning', 'info', 'light', 'dark');
    if($colorTmp = stristr($formAlert, ':')){
    $formAlert =  str_replace($colorTmp, '', $formAlert);
    $colorTmp = str_replace(':', '', $colorTmp);
    if(in_array($colorTmp, $color)){
        $alertColor = 'alert-' . $colorTmp;
    }
    }
    @endphp
    <div class="alert mt-2 {{$alertColor}}" role="alert">
    {{$formAlert}}
    </div>
    @endif
    {{--------------------------------------------}}
    </div>
    @php
        $enctype = '';
        $route = url($form->action . '/' . $form->updateId);
        foreach ($form->items as $item){
            if ($item->type == 'file'){
                $enctype = 'multipart/form-data';
            }
        }
    @endphp
    <form method="{{$form->method}}" action="{{$route}}" id="{{$form->id}}" @if($enctype != '') enctype="{{$enctype}}" @endif>
    @if (property_exists($form, "token"))
        @if ($form->token == true)
        @csrf
        @endif
    @endif
    @foreach ($formConfig as $key => $item)
    @if ($item->type == 'fieldset')
    <fieldset class="form-group">
    <div class="row">
    <div class="col-md-3">
    @if (!empty($item->label) && !empty($item->name))
    <legend class="d-none d-md-block col-form-label pt-0 {{$textAlign}}" for="{{$item->name}}">{{$item->label}}:</legend>
    <legend class="d-block d-md-none col-form-label pt-0" for="{{$item->name}}" style="font-size:90%">{{$item->label}}:</legend>
    @endif
    </div>
    <div class="col-md-9">
    @if (!empty($item->name) && !empty($item->id) && !empty($item->items))
    {{--Adiciona um grupo de Radio ou de checkbox--}}
    @foreach ($item->items as $key => $option)
    @if($item->subType == 'radio')
    <div class="form-check">
    <input class="form-check-input {{$item->name}}" type="{{$item->subType}}" name="{{$item->name}}"
    value="{{$option->value}}"
    @if ($option->value == $item->currentValue)
    checked
    @endif
    >
    <label class="form-check-label" for="{{$option->name}}">
    {{$option->label}}
    </label>
    </div>
    @elseif($item->subType == 'checkbox')
    <div class="form-check">
    <input class="form-check-input {{$item->name}}" type="{{$item->subType}}" name="{{$option->name}}"
    value="{{$option->value}}"
    @if ($option->value == $item->currentValue)
    checked
    @endif
    >
    <label class="form-check-label" for="{{$option->name}}">
    {{$option->label}}
    </label>
    </div>
    @endif
    @endforeach
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }}.</h5>
    @endif
    </div>
    </div>
    </fieldset>
    {{--Adiciona um componente select--}}
    @elseif ($item->type == 'select')
    <div class="form-group">
    <div class="row">
    <div class="col-md-3">
    @if (!empty($item->label) && !empty($item->name))
    <label for="{{$item->name}}"  class="d-none d-md-block col-form-label {{$textAlign}}">{{$item->label}}:</label>
    <label for="{{$item->name}}"  class="d-block d-md-none col-form-label" style="font-size:90%">{{$item->label}}:</label>
    @endif
    </div>
    <div class="col-md-9">
    @if (!empty($item->name) && !empty($item->id) && !empty($item->items))
    <select id="{{$item->id}}" class="form-control {{$item->name}}" name="{{$item->name}}">
    <option>{{$item->legendOption}}...</option>
    @foreach ($item->items as $key => $option)
    @if ($option->value == $item->currentValue)
    <option selected value="{{$option->value}}">{{$option->label}}</option>
    @else
    <option value="{{$option->value}}">{{$option->label}}</option>
    @endif
    @endforeach
    </select>
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }}.</h5>
    @endif
    </div>
    </div>
    </div>
    {{--Adiciona um componente textarea--}}
    @elseif ($item->type == 'textarea')
    <div class="form-group">
    <div class="row">
    <div class="col-md-3">
    @if (!empty($item->label) && !empty($item->name))
    <label for="{{$item->id}}"  class="d-none d-md-block col-form-label {{$textAlign}}">{{$item->label}}:</label>
    <label for="{{$item->id}}"  class="d-block d-md-none col-form-label" style="font-size:90%">{{$item->label}}:</label>
    @endif
    </div>
    <div class="col-md-9">
    @if (!empty($item->name) && !empty($item->id))
    <textarea class="form-control {{$item->name}}" id="{{$item->id}}" rows="{{$item->row}}" name="{{$item->id}}">
    @if (!empty($item->currentValue))
    "{{$item->currentValue}}"
    @endif
    </textarea>
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }}.</h5>
    @endif
    </div>
    </div>
    </div>
    @elseif ($item->type == 'btn-group')
    @php
    if (!empty($item->btnColor)){
    $btnOptions = ['primary', 'Secondary', 'Success', 'Danger', 'Warning', 'Info', 'Dark', 'link'];
    $btnBorder = '';
        if (!in_array($item->btnColor, $btnOptions)){
            $btnColor = 'light';
            $btnBorder = 'btn-outline-secondary';
        }else{
            $btnColor = $item->btnColor;
            $btnBorder = '';
            }
    }else{
        $btnColor = 'light';
        $btnBorder = 'btn-outline-secondary';
    }
    $btnColorTmp = $btnColor;
    $btnBorderTmp = $btnBorder;
    @endphp
    @if (!empty($item->items))
    {{--Bloco de adição de botões ------------------------}}
    <div class="d-none d-sm-block">
    @foreach ($item->items as $btn)
    @if ($btn->subType == 'submit' OR $btn->subType == 'reset')
    <button type="{{$btn->subType}}" class="btn btn-{{$btnColor}} {{$btnBorder}}">{{$btn->label}}</button>
    @elseif($btn->subType == 'btn' OR $btn->subType == 'button')
    @php
        $btnColor = $btnColorTmp;
        $btnBorder = $btnBorderTmp;
        $btnStatus = '';
        if (!empty($btn->action) && !empty($btn->active)){
            if ($btn->action == 'suspend' && $btn->active == 0){
                $btnStatus = 'disabled';
                $btnColor = 'secondary';
                $btnBorder = '';
            }elseif($btn->action == 'publish' && $btn->active == 1){
                $btnStatus = 'disabled';
                $btnColor = 'secondary';
                $btnBorder = '';
            }
        }
    @endphp
    <a href="{{$util->toRoute($btn->route)}}" class="btn btn-{{$btnColor}} {{$btnBorder}} {{$btnStatus}}" tabindex="-1" role="button">{{$btn->label}}</a>
    @endif
    @endforeach
    </div>
    {{--*************************************************--}}
    <div class="d-block d-sm-none">
    @foreach ($item->items as $btn)
    @if ($btn->subType == 'submit' OR $btn->subType == 'reset')
    <button type="{{$btn->subType}}" class="btn btn-sm btn-{{$btnColor}} {{$btnBorder}}">{{__($btn->label)}}</button>
    @elseif($btn->subType == 'btn' OR $btn->subType == 'button')
    @php
    $btnColor = $btnColorTmp;
    $btnBorder = $btnBorderTmp;
    $btnStatus = '';
    if (!empty($btn->action) && !empty($btn->active)){
        if ($btn->action == 'suspend' && $btn->active == 0){
            $btnStatus = 'disabled';
            $btnColor = 'secondary';
            $btnBorder = '';
        }elseif($btn->action == 'publish' && $btn->active == 1){
            $btnStatus = 'disabled';
            $btnColor = 'secondary';
            $btnBorder = '';
        }
    }
    @endphp
    <a href="{{$util->toRoute($btn->route)}}" class="btn btn-sm btn-{{$btnColor}} {{$btnBorder}} {{$btnStatus}}" tabindex="-1" role="button">{{__($btn->label)}}</a>
    @endif
    @endforeach
    </div>
    {{-----------------------------------------------------}}
    @endif
    {{--Adinona um componente file--}}
    @elseif($item->type == 'file')
    <div class="form-group row">
    <div class="col-md-3">
    @if (!empty($item->label) && !empty($item->name))
    <label for="{{$item->id}}" class="d-none d-md-block col-form-label {{$textAlign}}">{{$item->label}}:</label>
    <label for="{{$item->id}}" class="d-block d-md-none col-form-label" style="font-size:90%">{{$item->label}}:</label>
    @endif
    </div>
    <div class="col-md-9">
    @if (!empty($item->name) && !empty($item->id))
    @if (property_exists($item, "image") && $item->image != NULL)
    @if (!empty($item->imagePath) && !empty($item->image))
    <div class="mb-3 mt-2">
    <img src="{{$util->toImage($item->imagePath, $item->image)}}" style="widht:100px; height:100px;">
    </div>
    @endif
    @endif
    <input type="file" class="form-control-file pl-2 {{$item->name}}" id="{{$item->id}}" name="{{$item->name}}" style="font-size:90%">
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }}.</h5>
    @endif
    </div>
    </div>
    @else
    {{--Adiciona componentes imput text--}}
    <div class="form-group row">
    <div class="col-md-3">
    @if (!empty($item->label) && !empty($item->name))
    <label for="{{$item->id}}" class="d-none d-md-block col-form-label {{$textAlign}}">{{$item->label}}:</label>
    <label for="{{$item->id}}" class="d-block d-md-none col-form-label" style="font-size:90%">{{$item->label}}:</label>
    @endif
    </div>
    <div class="col-md-9">
    @if (!empty($item->name) && !empty($item->id))
    <input type="{{$item->type}}" class="form-control {{$item->name}}" id="{{$item->id}}"
    @if (!empty($item->placeHolder))
    placeholder="{{$item->placeHolder}}"
    @endif
    @if (!empty($item->currentValue))
    value="{{$item->currentValue}}"
    @endif
    name="{{$item->name}}">
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }}.</h5>
    @endif
    </div>
    </div>
    @endif
    @endforeach
      </form>
</div>
</section>
@else
<div class="text-center p-4 mt-3 mb-3 {{$border}}">
<h5>{{ __('There are no form items to display.') }}.</h5>
</div>
@endif


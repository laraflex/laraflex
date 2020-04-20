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
       }elseif ($form->textAlign == 'right') {
           $textAlign = 'text-left text-md-right';
       }else{
            $textAlign = 'text-left';
       }
   }else{
       $textAlign = 'text-left';
   }
   if(!empty($form->topAlign) && $form->topAlign == true){
       $labelStyle = 'col-md-12';
       $inputStyle = 'col-md-12';
   }else{
       $labelStyle = 'col-md-3';
       $inputStyle = 'col-md-9';
   }

    if (!empty($form->fontFamily->title)){
        $font_family_title = 'font-family:'.$form->fontFamily->title .';';
    }else{
        $font_family_title = '';
    }
    if (!empty($form->fontFamily->shared)){
        $font_family = 'font-family:'.$form->fontFamily->shared .';';
    }else{
        $font_family = '';
    }
@endphp
<!--Section formulário ------------------------------------------------------->
<section id="form">
<div class="pb-4 p-3 mb-4 mt-4 {{$border}}">
    @php
        if (!empty($form)){
            $formItems = $form->items;
        }
    @endphp
    <div class="pt-2 pb-3 text-center">
    @if (!empty($form->title))
    <div class="form-title text-center pt-1 pb-0" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
    {{$form->title}}</div>

    @endif
    @if (!empty($form->legend))
    <div class="form-item-shared text-center pt-1" style="font-size:calc(0.76em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
    <span style="color:gray">{{$form->legend}}</span></div>

    @endif

    </div>

    @php
        $enctype = '';
        $route = url($form->action);
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
    @foreach ($formItems as $key => $item)
    @if ($item->type == 'fieldset')
    <fieldset class="form-group">
    <div class="row">
    {{--------------------------------------------}}
    <div class="{{$labelStyle}}">
    @if (!empty($item->label) && !empty($item->name))
    <legend for="{{$item->name}}" class="col-form-label {{$textAlign}} w-100">{{$item->label}}:</legend>

    @endif
    </div>
    <div class="{{$inputStyle}}">
    @if (!empty($item->name) && !empty($item->id) && !empty($item->items))
    {{--Adiciona um grupo de Radio ou de checkbox--}}
    @foreach ($item->items as $key => $option)
    @if($item->subType == 'radio')
    <div class="form-check">
    <input class="form-check-input {{$item->name}}" type="{{$item->subType}}" name="{{$item->name}}" id="{{$item->id}}"
    value="{{$option->value}}"
        @if ($loop->first)
            checked
        @endif
    >
    <label class="form-check-label" for="{{$item->name}}">
    {{$option->label}}
    </label>
    </div>
    @elseif($item->subType == 'checkbox')
    <div class="form-check">
    <input class="form-check-input {{$item->name}}" type="{{$item->subType}}" name="{{$item->name}}" id="{{$item->id}}"
    value="{{$option->value}}">
    <label class="form-check-label" for="{{$item->name}}">
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
    {{-----------------------------------------------------}}
    <div class="{{$labelStyle}}">
    @if (!empty($item->label) && !empty($item->name))
    <label for="{{$item->name}}" class="col-form-label {{$textAlign}} w-100">{{$item->label}}:</label>

    @endif
    </div>
    <div class="{{$inputStyle}}">
    @if (!empty($item->name) && !empty($item->id) && !empty($item->items))
    <select id="{{$item->id}}" class="form-control {{$item->name}}" name="{{$item->name}}">
    <option>{{$item->legendOption}}...</option>
    @foreach ($item->items as $key => $option)
    <option value="{{$option->value}}">{{$option->label}}</option>
    @endforeach
    </select>
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }}.</h5>
    @endif
    </div>
    </div>
    </div>
    {{--Adiciona um componente textarea--}}
    @elseif ($item->type == 'textarea' OR $item->type == 'summernote')
    <div class="form-group">
    <div class="row">
    {{------------------------------------------------------}}
    <div class="{{$labelStyle}}">
    @if (!empty($item->label) && !empty($item->name))
    <label for="{{$item->name}}" class="col-form-label {{$textAlign}} w-100">{{$item->label}}:</label>

    @endif
    </div>
    <div class="{{$inputStyle}}">
    @if (!empty($item->name) && !empty($item->id))
        @php
            if (!empty($item->row)){
            $row = $item->row;
            }else {
            $row = 5;
            }
            if($item->type == 'summernote'){
                $id = 'summernote';
                $name = 'summernote';
            }else{
                $id = $item->id;
                $name = $item->name;
            }
        @endphp
    <textarea class="form-control {{$name}}" id="{{$id}}" rows="{{$row}}" name="{{$item->id}}"></textarea>
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
    @endphp
    @if (!empty($item->items))
    @foreach ($item->items as $btn)
    @if ($btn->subType == 'submit' OR $btn->subType == 'reset')
    <button type="{{$btn->subType}}" class="btn btn-sm btn-{{$btnColor}} {{$btnBorder}} px-3">{{__($btn->label)}}</button>
    @endif
    @endforeach
    @endif
    {{--Adinona um componente file--}}
    @elseif($item->type == 'file')
    <div class="form-group row">
    {{-------------------------------------------------------------------}}
    <div class="{{$labelStyle}}">
    @if (!empty($item->label) && !empty($item->name))
    <label for="{{$item->name}}" class="col-form-label {{$textAlign}} w-100">{{$item->label}}:</label>

    @endif
    </div>
    <div class="{{$inputStyle}}">
    @if (!empty($item->name) && !empty($item->id))
    <input type="file" class="form-control-file pl-2 {{$item->name}}" id="{{$item->id}}" name="{{$item->name}}" style="font-size:90%">
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }}.</h5>
    @endif
    </div>
    </div>
    {{--Adiciona componentes hidden--}}
    @elseif($item->type == 'hidden')
    @if (!empty($item->name) && !empty($item->id) && !empty($item->value))
    <input type="{{$item->type}}" class="{{$item->name}}" id="{{$item->id}}" name="{{$item->name}}" value="{{$item->value}}">
    @endif
    {{--Adiciona componentes imput text--}}
    @elseif(!empty($item->type))
    <div class="form-group row">
    {{----------------------------------------------------------------}}
    <div class="{{$labelStyle}}">
    @if (!empty($item->label) && !empty($item->name))
    <label for="{{$item->name}}" class="col-form-label {{$textAlign}} w-100">{{$item->label}}:</label>

    @endif
    </div>
    <div class="{{$inputStyle}}">
    @if (!empty($item->name) && !empty($item->id))
    <input type="{{$item->type}}" class="form-control {{$item->name}}" id="{{$item->id}}" name="{{$item->name}}"
    @if (!empty($item->value))
    value="{{$item->value}}"
    @endif
    >
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
<h5>{{ __('There are no form items to display.') }}</h5>
</div>
@endif


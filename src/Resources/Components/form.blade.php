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
       $textAlign = 'text-left text-md-right';
   }
    if(!empty($form->topAlign) && $form->topAlign == true){
        $labelStyle = 'col-md-12';
        $inputStyle = 'col-md-12';
        $fileConfig = false;
    }elseif(!empty($form->fullPage) && $form->fullPage == true){
        $labelStyle = 'col-md-12';
        $inputStyle = 'col-md-12';
        $fileConfig = false;
    }else{
        $labelStyle = 'col-md-3 pt-0 pt-md-1';
        $inputStyle = 'col-md-8';
        $fileConfig = true;
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
<section id="form" class="pb-1 pt-3 pt-md-4">
<div class="container-xl px-0">
<div class="mx-0 mb-0 mt-1 px-2 px-lg-3 px-xl-0">

<div class=" mb-3 p-3 px-xl-4 pb-4 {{$border}}">
    @php
        if (!empty($form)){
            $formItems = $form->items;
        }
    @endphp
    <div class="pt-2 pb-3 text-center">
    @if (!empty($form->title))
    <div class="form-title text-center pt-2 pb-2" style="font-size:calc(1.1em + 0.6vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
    {{$form->title}}</div>
    @endif
    @if (!empty($form->legend))
    <div class="form-item-shared text-center pb-2" style="font-size:calc(0.76em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
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
    @if (!empty($form->token) && $form->token === false)
    {{--Caso falso--}}
    @else
    @csrf
    @endif

    @foreach ($formItems as $key => $item)
    @if ($item->type == 'fieldset')
    <fieldset class="form-group">
    <div class="row mb-2 mb-md-3">
    {{--------------------------------------------}}
    <div class="{{$labelStyle}}">
    @if (!empty($item->label) && !empty($item->name))
    <legend for="{{$item->name}}" class="col-form-label {{$textAlign}} w-100 py-0" style="font-size:calc(14px + 0.10vw);">{{$item->label}}:</legend>
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
    {{--adiciona regras regras de validação--}}
    @if (!empty($item->required) && $item->required === true)
    required />
    @else
    />
    @endif
    {{---------------------------------------}}
    <label class="form-check-label" for="{{$item->name}}" style="font-size:calc(14px + 0.10vw);">
    {{$option->label}}
    </label>
    </div>
    @elseif($item->subType == 'checkbox')
    <div class="form-check">
    <input class="form-check-input {{$item->name}}" type="{{$item->subType}}" name="{{$item->name}}" id="{{$item->id}}"
    value="{{$option->value}}">
    <label class="form-check-label" for="{{$item->name}}" style="font-size:calc(14px + 0.10vw);">
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
    <div class="row mb-2 mb-md-3">
    {{-----------------------------------------------------}}
    <div class="{{$labelStyle}}">
    @if (!empty($item->label) && !empty($item->name))
    <label for="{{$item->name}}" class="col-form-label {{$textAlign}} w-100 py-0" style="font-size:calc(14px + 0.10vw);">{{$item->label}}:</label>
    @endif
    </div>
    <div class="{{$inputStyle}}">
    @if (!empty($item->name) && !empty($item->id) && !empty($item->items))
    {{--adiciona regras regras de validação--}}
    @if (!empty($item->required) && $item->required === true)
    <select id="{{$item->id}}" class="custom-select  {{$item->name}}" name="{{$item->name}}" required>
    @else
    <select id="{{$item->id}}" class="form-control {{$item->name}}" name="{{$item->name}}">
    @endif
    {{---------------------------------------}}
    @if (!empty($item->legendOption))
    <option value="" style="font-size:calc(14px + 0.10vw);">{{$item->legendOption}}...</option>
    @else
    <option value="">...</option>
    @endif
    @foreach ($item->items as $key => $option)
    <option value="{{$option->value}}" style="font-size:calc(14px + 0.10vw);">{{$option->label}}</option>
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
    <div class="row mb-2 mb-md-3">
    {{------------------------------------------------------}}
    <div class="{{$labelStyle}}">
    @if (!empty($item->label) && !empty($item->name))
    <label for="{{$item->name}}" class="col-form-label {{$textAlign}} w-100 py-0" style="font-size:calc(14px + 0.10vw);">{{$item->label}}:</label>
    @endif
    </div>
    <div class="{{$inputStyle}}">
    @if (!empty($item->name) && !empty($item->id))
        @php
            if($item->type == 'summernote'){
                $id = 'summernote';
                $name = 'summernote';
            }else{
                $id = $item->id;
                $name = $item->name;
            }
            $attributes = '';
            if (!empty($item->attributes)){
                $attributes = $item->attributes;
            }
            elseif(!empty($item->rows)) {
                $attributes .= ' rows ="' . $item->rows . '"';
            }
            else{
                $attributes = 'rows="5"';
            }
        @endphp
    {{--Adição de regra de validação--}}
    @if (!empty($item->required) && $item->required === true)
    <textarea class="form-control {{$name}}" id="{{$id}}" {!!$attributes!!} name="{{$item->id}}" style="width:100%" required></textarea>
    @else
    <textarea class="form-control {{$name}}" id="{{$id}}" {!!$attributes!!} name="{{$item->id}}" style="width:100%"></textarea>
    @endif
    {{--------------------------------}}
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
    @foreach ($item->items as $key => $btn)
    @php
    if ($key == 0){
        $btnColor = 'secondary';
        $btnBorder = '';
    }else{
        $btnColor = $btnColorTmp;
        $btnBorder = $btnBorderTmp;
    }
    if (!empty($btn->disabled) && $btn->disabled === true){
        $disabled = 'disabled';
    }else{
        $disabled = '';
    }
    @endphp
    @if ($btn->subType == 'submit' OR $btn->subType == 'reset')
    @if (!empty($btn->legend) && $key == 0)
    <div class="pb-2"><small><i>* {{$btn->legend}}</i></small></div>
    @endif
    <button type="{{$btn->subType}}" class="btn btn-sm btn-{{$btnColor}} {{$btnBorder}} px-3" {{$disabled}}>{{__($btn->label)}}</button>
    @endif
    @endforeach
    @endif
    {{--Adinona um componente file--}}

    @elseif($item->type == 'file')
    <div class="form-group row mb-2 mb-md-3 px-3">
    @if ($fileConfig === true)
    <div class="{{$labelStyle}}">
    @if (!empty($item->label) && !empty($item->name))
    <label for="{{$item->name}}" class="col-form-label {{$textAlign}} w-100 py-0" style="font-size:calc(14px + 0.10vw);">{{$item->label}}:</label>
    @endif
    </div>
    @else

    @endif

    <div class="{{$inputStyle}} custom-filex">
    @if (!empty($item->name) && !empty($item->id))

    {{--adiciona regras regras de validação--}}
    @php
    if (!empty($item->attributes)){
        $attributes = $item->attributes;
    }else{
        $attributes = '';
    }
    if (!empty($item->multiple) && $item->multiple === true){
        $item->name = $item->name . '[]';
        $multiple = 'multiple="multiple"';
    }else{
        $multiple ='';
    }
    $marginFile = '';
    if ($fileConfig === true){
        $label = '';
        $marginFile = 'ml-2';
    }
    elseif (!empty($item->label)){
        $label = $item->label;
    }
    else{
        $label = 'Add a file';
    }
    @endphp
    @if (!empty($item->required) && $item->required === true)
    <input type="file" class="custom-file-input {{$marginFile}} {{$item->name}}" {!!$attributes!!} id="{{$item->id}}" style="font-size:90%;" {!!$multiple!!} required>
    <label class="custom-file-label {{$marginFile}}" for="customFile">{{__($label)}}</label>
    @else
    <input type="file" class="custom-file-input  {{$marginFile}} {{$item->name}}" {!!$attributes!!} id="{{$item->id}}" style="font-size:90%;" {!!$multiple!!}>
    <label class="custom-file-label {{$marginFile}}" for="customFile">{{__($label)}}</label>
    @endif
    {{----------------------------------------}}
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
    {{--Adiciona componentes imput checkbox -----------------}}
    @elseif(!empty($item->type) && $item->type == 'checkbox')
    <div class="form-group row mb-2 mb-md-3">
    <div class="{{$labelStyle}}">
    </div>
    <div class="{{$inputStyle}} form-check py-2">
        @if (!empty($item->name) && !empty($item->id))
        <input type="{{$item->type}}" class="form-check-input ml-1" {{$item->name}} " id="{{$item->id}}" name="{{$item->name}}"
        @if (!empty($item->value))
        value="{{$item->value}}"
        @endif
        {{--Adiciona regras de validação--}}
        @if (!empty($item->required) && $item->required === true)
        required />
        @else
        />
        @endif
        {{--------------------------------}}
        @if (!empty($item->label) && !empty($item->name))
        <span for="{{$item->name}}" class="col-form-label {{$textAlign}} w-100x ml-4 pl-1" style="font-size:calc(14px + 0.10vw);">{{$item->label}}:</span>
        @endif
        @else
        <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }}.</h5>
        @endif
    </div>
    </div>
    {{--Adiciona componentes imput data -------------------}}
    @elseif(!empty($item->type) && $item->type == 'date')
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
        @if (!empty($item->value))
        value="{{$item->value}}"
        @endif
        {{--Adiciona regras de validação--}}
        @if (!empty($item->required) && $item->required === true)
        required />
        @else
        />
        @endif
        </label>
        {{--------------------------------}}
        @else
        <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }}.</h5>
        @endif
    </div>
    </div>
    @elseif(!empty($item->type))
    <div class="form-group row mb-2 mb-md-3">
    {{----------------------------------------------------------------}}
    <div class="{{$labelStyle}}">
    @if (!empty($item->label) && !empty($item->name))
    <label for="{{$item->name}}" class="col-form-label {{$textAlign}} w-100 py-0" style="font-size:calc(14px + 0.10vw);">{{$item->label}}:</label>
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
    @if (!empty($item->value))
    value="{{$item->value}}"
    @endif
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
    @endif
    @endforeach
      </form>
</div>
</div>
</div>
</section>
@else
<div class="container-xl px-3 mt-4 pb-2" translation="no">
    <div class="alert alert-primary {{$border}}" role="alert">
    <div class="content-message alert-heading" style="font-size:calc(0.85em + 0.4vw)"><strong>{{__('Message')}}!</strong></div>
    <hr class="d-none d-sm-block">
    <div class="mb-0" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.18vw);">{{ __('There are no items to display.') }}</div>
    </div>
</div>
@endif




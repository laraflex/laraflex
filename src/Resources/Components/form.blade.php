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
       //$textAlign = 'text-left text-md-right';
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
    $labelstyle = $labelStyle;
    $textalign = $textAlign;
    $inputstyle = $inputStyle;
@endphp

{{----Section form =============================================--}}
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

    {{--title component form ===================================--}}
    @if (!empty($form->title))
    @php
        $title = $form->title;
        $font = $font_family_title;
    @endphp
        {{--@include('laraflex::ComponentParts.form.title')--}}
        <x-laraflex::form.title :title="$title" :font="$font" />
    @endif
    {{--legend component form ===================================--}}
    @if (!empty($form->legend))
    @php
        $legend = $form->legend;
        $font = $font_family;
    @endphp
        {{--@include('laraflex::ComponentParts.form.legend')--}}
        <x-laraflex::form.legend :legend="$legend" :font="$font" />
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

    {{--add fieldset component form ================================--}}
    @if ($item->type === 'fieldset')
    @if (!empty($item->name) && !empty($item->items))
    @php
        $name = $item->name;
        $labelcomponent = $item->label;
        $itemscomponent = $item->items;
        if (!empty($item->subtype)){
            $subtype = $item->subtype;
        }
        $required = "";
        if (!empty($item->required) && $item->required === true){
            $required = "required";
        }
    @endphp
    {{--@props(['labelstyle', 'textalign','inputstyle','labelcomponent', 'name', 'subtype', 'id', 'value', 'label', 'checked', 'required'])--}}
    <x-laraflex::form.fieldset :labelstyle="$labelstyle" :textalign="$textalign" :inputstyle="$inputstyle" :itemscomponent="$itemscomponent" :labelcomponent="$labelcomponent" :name="$name" :subtype="$subtype" :required="$required"/>
    {{--@include('laraflex::ComponentParts.form.fieldset')--}}
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.')}} "{{$item->type}}" {{__('and subtype')}} "{{$item->subtype}}".</h5>
    @endif

    {{--add select component form ===============================--}}
    @elseif ($item->type == 'select')
    @if (!empty($item->name) && !empty($item->items))
    @php
        $legendoption = $item->legendOption;
        $itemlabel = $item->label;
        $itemname = $item->name;
        $itemsoption = $item->items;
        if (!empty($item->id)){
            $id = $item->id;
        }else{
            $id = $item->name;
        }
        if (!empty($item->required)){
            $required = $item->required;
        }else{
            $required = "";
        }
    @endphp
    {{--@props(['labelstyle', 'textalign', 'inputstyle','itemsoption', 'legendoption', 'itemlabel', 'itemname', 'id', 'required'])--}}
    <x-laraflex::form.select :labelstyle="$labelstyle" :textalign="$textalign" :inputstyle="$inputstyle" :itemsoption="$itemsoption" :legendoption="$legendoption" :itemlabel="$itemlabel" :itemname="$itemlabel" :id="$id" :required="$required" />
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.')}} {{$item->type}}.</h5>
    @endif

    {{--add textarea component form =================================--}}
    @elseif ($item->type == 'textarea' OR $item->type == 'summernote')
    @if (!empty($item->name) && !empty($item->id))
    @php
        if($item->type == 'summernote'){
            $id = 'summernote';
            $name = 'summernote';
        }else{
            $id = $item->id;
            $name = $item->name;
        }
        $properties = "";
        if (!empty($item->attributes)){
            $properties = $item->attributes;
        }
        elseif(!empty($item->rows)) {
            $properties = ' rows =' . $item->rows;
        }
        else{
            $properties = ' rows=10';
        }
        //Adição de regra de validação -----
        if (!empty($item->required) && $item->required === true){
            $required = "required";
        }else{
            $required = "";
        }
        $label = $item->label;
    @endphp
    {{--@props(['labelstyle','textalign', 'inputstyle', 'label', 'name', 'id', 'properties', 'required'])--}}
    <x-laraflex::form.textarea :labelstyle="$labelstyle" :textalign="$textalign" :inputstyle="$inputstyle" :label="$label" :name="$name" :id="$id" :properties="$properties" :required="$required" />
    {{--@include('laraflex::ComponentParts.form.textarea')--}}
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.')}} "{{$item->type}}".</h5>
    @endif


    {{--btn-group component form =================================--}}
    @elseif ($item->type == 'btn-group')
    @if (!@empty($item->items))
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
    $buttons = $item->items;
    @endphp
    {{--@props(['buttons', 'btnColorTmp', 'btnBorderTmp'])--}}
    <x-laraflex::form.btn-group :buttons="$buttons" :btnColorTmp="$btnColorTmp" :btnBorderTmp="$btnBorderTmp" />
    {{--@include('laraflex::ComponentParts.form.btn-group')--}}
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }} "{{$item->type}}".</h5>
    @endif

    {{--file component form ====================================--}}
    @elseif($item->type == 'file')
    @if (!empty($item->name) && !empty($item->id))
    @php
    $name = $item->name;
    $id = $item->id;
    if (!empty($item->attributes)){
        $properties = $item->attributes;
    }else{
        $properties = '';
    }
    if (!empty($item->multiple) && $item->multiple === true){
        $name = $item->name . '[]';
        $multiple = 'multiple="multiple"';
    }else{
        $multiple ='';
    }
    $marginFile = '';
    if ($fileConfig === true){
        //$label = '';
        $label = $item->label;
        $marginFile = 'ml-2';
    }
    elseif (!empty($item->label)){
        $label = $item->label;
    }
    else{
        $label = 'Add a file';
    }
    $id = $item->id;
    if (!empty($item->required) && $item->required === true){
        $required = "required";
    }else{
        $required = "";
    }
    @endphp
    {{--@props(['fileConfig', 'labelStyle', 'textAlign', 'inputStyle', 'properties', 'marginFile', 'label', 'name', 'id', 'multiple'])--}}
    <x-laraflex::form.file :fileConfig="$fileConfig" :labelStyle="$labelStyle" :textAlign="$textAlign" :inputStyle="$inputStyle" :properties="$properties" :marginFile="$marginFile" :label="$label" :name="$name" :id="$id" :multiple="$multiple" />
    {{--@include('laraflex::ComponentParts.form.file')--}}
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }} "{{$item->type}}".</h5>
    @endif

    {{--hidden component form ====================================--}}
    @elseif($item->type == 'hidden')
    @if (!empty($item->name) && !empty($item->id) && !empty($item->value))
    @php
        $name = $item->name;
        $id = $item->id;
        $value = $item->value;
    @endphp
    {{--@props(['name', 'id', 'value'])--}}
    <x-laraflex::form.hidden :name="$name" :id="$id" :value="$value" />
    {{--@include('laraflex::ComponentParts.form.hidden')--}}
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type')}} "{{$item->type }}."</h5>
    @endif


    {{--link checkbox component form ==================================--}}
    @elseif(!empty($item->type) && $item->type == 'link')
    @if (!empty($item->url) && !empty($item->label))
    @php
        $url =$item->url;
        $label = $item->label;
        $target = 'target = "_blank"';
    @endphp
    <div class="form-group row mt-0 mb-1 md-3 ml-2">
    <div class="{{$inputStyle}} form-check py-2">
    {{--@props(['url', 'label', 'target'])--}}
    <x-laraflex::link :url="$url" :label="$label" :target="$target"/>
    {{--@include('laraflex::ComponentParts.link')--}}
    </div>
    </div>
<<<<<<< HEAD



=======
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }} "{{$item->type}}".</h5>
    @endif

<<<<<<< HEAD
=======










>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da
    {{--imput checkbox component form ==================================--}}
    @elseif(!empty($item->type) && $item->type == 'checkbox')
    @if (!empty($item->name) && !empty($item->id))
    @php
        $name =$item->name;
        $id = "$item->id";
        $value = $item->value;
        $label = $item->label;
        if (!empty($item->required) && $item->required === true){
            $required = "required";
        }else{
            $required = "";
        }
    @endphp
    <div class="form-group row mb-2 mb-md-3 ml-2">
    <div class="{{$inputStyle}} form-check py-2">
    {{--@props(['name', 'id', 'value', 'label', 'required'])--}}
    <x-laraflex::form.checkbox :name="$name" :id="$id" :value="$value" :label="$label" :required="$required" />
    {{--@include('laraflex::ComponentParts.form.checkbox')--}}
    </div>
    </div>
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }} "{{$item->type}}".</h5>
    @endif

    {{--Multiples components form (date,time, month, week)===================================--}}
    @elseif(!empty($item->type) && ($item->type == 'date' OR $item->type == 'time') OR  $item->type == 'month' OR  $item->type == 'week')
    @if (!empty($item->label) && !empty($item->name))
    @php
        $type = $item->type;
        $name = $item->name;
        $label = $item->label;
        if (!empty($item->id)){
            $id = $item->id;
        }else{
            $id = $item->name;
        }
        $id = $item->id;
        if (!empty($item->attributes)){
            $properties = $item->attributes;
        }else{
            $properties = "";
        }
        if (!empty($item->required) && $item->required === true){
            $required = "required";
        }else{
            $required = "";
        }
        if (!empty($item->value)){
            $value = 'value = "'.$item->value.'"';
        }else{
            $value = "";
        }
    @endphp
    {{--@props(['type','labelStyle','textAlign','inputStyle' 'name', 'id', 'value', 'label','properties', 'required'])--}}
    <x-laraflex::form.date-time :type="$type" :labelStyle="$labelStyle" :textAlign="$textAlign" :inputStyle="$inputStyle" :name="$name" :id="$id" :value="$value" :label="$label" :properties="$properties" :required="$required" />
    {{--@include('laraflex::ComponentParts.form.date-time')--}}
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }}.</h5>
    @endif

    {{--Multiples components form (text, email, number, color, search, password, )=========--}}
    @elseif(!empty($item->type))

    @if (!empty($item->label) && !empty($item->name))
    @php
        $type = $item->type;
        $name = $item->name;
        $label = $item->label;
        if ($item->type == 'color'){
            $width = ' w-25';
        }else{
            $width = '';
        }
        if (!empty($item->id)){
            $id = $item->id;
        }else{
            $id = $item->name;
        }
        if (!empty($item->pattern)){
            if (!empty($item->message)){
                $pattern = 'pattern="' . $item->pattern . '" title="' . strtoupper($item->message) . '"';
            }else{
                $pattern = 'pattern="' . $item->pattern . '"';
            }
        }else{
            $pattern = '';
        }
        if (!empty($item->attributes)){

            $properties = $item->attributes;
        }else{
            $properties = "";
        }
        if (!empty($item->placeholder)){
            $properties .= ' placeholder="'.$item->placeholder.'"';
        }
        $value = "";
        if (!empty($item->readonly) && $item->readonly === true ){
            $value = 'value="'.$item->value.'"';
            $rules = "readonly";
        }elseif (!empty($item->required) && $item->required === true){
            $rules = "required";
        }else{
            $rules = "";
        }
    @endphp
    {{--@props(['type','labelStyle','textAlign','inputStyle', 'name', 'id','width', 'value', 'label','properties', 'pattern', 'rules'])--}}
    <x-laraflex::form.input :type="$type" :labelStyle="$labelStyle" :textAlign="$textAlign" :inputStyle="$inputStyle" :name="$name" :id="$id" :value="$value" :width="$width"  :label="$label" :properties="$properties" :pattern="$pattern" :rules="$rules" />
    {{--@include('laraflex::ComponentParts.form.input')--}}
    @else
    <h5 style="color:red">{{ __('Alert - Check your Presenter class for this type.') }} "{{$item->type}}".</h5>
    @endif
    {{--end of adding form components--}}
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



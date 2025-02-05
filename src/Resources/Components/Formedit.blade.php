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
           $textAlign = 'text-left text-md-right';
        }else{
            $textAlign = 'text-left';
        }
    }else{
        $textAlign = 'text-left text-md-right';
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

    if(!empty($form->topAlign) && $form->topAlign == true){
        $labelStyle = 'col-md-12';
        $inputStyle = 'col-md-12';
        $textAlign = 'text-left';
    }else{
        $labelStyle = 'col-md-3 pt-0 pt-md-1';
        $inputStyle = 'col-md-9';
    }
@endphp

<!--Section formulário ------------------------------------------------------->
<section id="form" class="pb-1 pt-2 pt-md-3">
<div class="container-xl px-0">
<div class="mx-0 mb-0 mt-1 px-2 px-lg-3 px-xl-0">
<div class="pb-4 p-3 px-md-4 px-lg-5 mb-4 mt-4 {{$border}}">
        @php
        if (!empty($form)){
            $formConfig = $form->items;
        }

        // Controle de edição de dados inválidos
        $font_color = 'text-secondary';
        if (empty($form->updateId) OR $form->updateId === false){
        $form->updateId = 0;
        $form->legend = "**You must pass a valid item to be edited";
        $font_color = 'text-danger h5';
        }
        if (!empty($form->title)){
            $title = $form->title;
        }else{
            $title = NULL;
        }
        if (!empty($form->legend)){
            $legend = $form->legend;
        }else{
            $legend = NULL;
        }
    @endphp
    {{--Title component FormEdit ====================================--}}
    {{--@props(['title', 'legend', 'font_color', 'font_family_title', 'font_family'])--}}
    @include('laraflex::ComponentParts.formedit.title')

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
    {{-------------}}
    <input type="hidden" class="updateId" id="updateId" name="updateId" value="{{$form->updateId}}">
    {{-------------}}
    @foreach ($formConfig as $key => $item)

    {{--fieldset Component FormEdit =================================--}}
    @if ($item->type == 'fieldset')
    @php
        if (!empty($item->label)){
            $label = $item->label;
        }else{
            $label = NULL;
        }
        if (!empty($item->name)){
            $name = $item->name;
        }else{
            $name = NULL;
        }
        if (!empty($item->items)){
            $items = $item->items;
        }else{
            $items = NULL;
        }
        if (!empty($item->id)){
            $id = $item->id;
        }else{
            $id = NULL;
        }
        if (!empty($item->subType)){
            $subType = $item->subType;
        }else{
            $subType = 'radio';
        }
        if (!empty($item->currentValue)){
            $currentValue = $item->currentValue;
        }else{
            $currentValue = NULL;
        }
        if (!empty($item->required)){
            $required = $item->required;
        }else{
            $required = NULL;
        }
    @endphp

    {{--@props(['name', 'label','labelStyle' 'items', 'subType', 'currentValue', 'required', 'textAlign', 'inputStyle'])--}}
    <x-laraflex::formedit.fieldset :name="$name" :label="$label" :labelStyle="$labelStyle" :items="$items" :subType="$subType" :currentValue="$currentValue" :required="$required" :textAlign="$textAlign" :inputStyle="$inputStyle" />

    {{--Select Component FormEdit =================================--}}
    @elseif ($item->type == 'select')
    @php
        if (!empty($item->label)){
            $label = $item->label;
        }else{
            $label = NULL;
        }
        if (!empty($item->name)){
            $name = $item->name;
        }else{
            $name = NULL;
        }
        if (!empty($item->required)){
            $required = $item->required;
        }else{
            $required = NULL;
        }
        if (!empty($item->items)){
            $items = $item->items;
        }else{
            $items = NULL;
        }
        if (!empty($item->legendOption)){
            $legendOption = $item->legendOption;
        }else{
            $legendOption = __('Select an option');
        }
        if (!empty($item->id)){
            $id = $item->id;
        }else{
            $id = NULL;
        }
        if (!empty($item->currentValue)){
            $currentValue = $item->currentValue;
        }else{
            $currentValue = NULL;
        }
    @endphp
    {{--@props(['name', 'label','labelStyle','legendOption', 'items', 'subType', 'currentValue', 'required', 'textAlign', 'inputStyle'])--}}
    <x-laraflex::formedit.select :name="$name" :label="$label" :id="$id" :legendOption="$legendOption" :labelStyle="$labelStyle" :items="$items" :currentValue="$currentValue" :required="$required" :textAlign="$textAlign" :inputStyle="$inputStyle" />

    {{--Textarea and Summernote Component FormEdit =================================--}}
    @elseif ($item->type == 'textarea' OR $item->type == 'summernote')
    @php
        if($item->type == 'summernote'){
            $id = 'summernote';
            $name = 'summernote';
        }else{
            $id = $item->id;
            $name = $item->name;
        }
        if (!empty($item->label)){
            $label = $item->label;
        }else{
            $label = NULL;
        }
        $properties = '';
        if (!empty($item->attributes)){
            $properties = $item->properties;
        }
        elseif(!empty($item->rows)){
            $properties .= ' rows="' . $item->rows . '"';
        }
        else{
            $properties = 'rows="5"';
        }
        if (!empty($item->required)){
            $required = $item->required;
        }else{
            $required = NULL;
        }
        if (!empty($item->currentValue)){
            $currentValue = $item->currentValue;
        }else{
            $currentValue = NULL;
        }
        $item->label
    @endphp
    {{--@props(['name', 'label','id', 'labelStyle', 'currentValue', 'required', 'textAlign', 'inputStyle', 'attributes'])--}}
    {{--<x-laraflex::formedit.textarea :name="$name" :label="$label" :id="$id" :labelStyle="$labelStyle" :currentValue="$currentValue" :required="$required" :textAlign="$textAlign" :inputStyle="$inputStyle" :properties="$properties" />
    --}}
    @include('laraflex::ComponentParts.formedit.textarea')

    {{--btn-group Component FormEdit =================================--}}
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
    if (!empty($item->items)){
        $items = $item->items;
    }else{
        $items = NULL;
    }
    if (empty($form->updateId)){
        $updateId= NULL;
    }else{
        $updateId = true;
    }
    @endphp
    {{--@props(['items','btnColorTmp','btnBorderTmp','updateId','util' ])--}}
    <x-laraflex::formedit.btn-group :items="$items" :btnColorTmp="$btnColorTmp" :btnBorderTmp="$btnBorderTmp" :updateId="$updateId" :util="$util" />

    {{--File Component FormEdit =================================--}}
    @elseif($item->type == 'file')
    @if(!empty($form->topAlign) && $form->topAlign === true)
    <div class="form-group row pb-2 pb-md-3 pl-3 pr-3 pt-2">
    @else
    <div class="form-group row pb-2 pb-md-3 pl-3 pl-md-4 pr-3 pt-2">
    @endif
    {{--@props(['item', 'labelStyle', 'textAlign', 'inputStyle','util'])--}}
    <x-laraflex::formedit.file :util="$util" :item="$item" :labelStyle="$labelStyle" :textAlign="$textAlign" :inputStyle="$inputStyle" />
    </div>

    {{--Checkbox Component FormEdit =================================--}}
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

    {{--Input date Component FormEdit =================================--}}
    @elseif(!empty($item->type) && $item->type == 'date')

    {{--@props(['item', 'labelStyle', 'textAlign', 'inputStyle','util'])--}}
    <x-laraflex::formedit.date :util="$util" :item="$item" :labelStyle="$labelStyle" :textAlign="$textAlign" :inputStyle="$inputStyle" />

    {{--Other input Components FormEdit =================================--}}
    @elseif(!empty($item->type))
    {{--@props(['item', 'labelStyle', 'textAlign', 'inputStyle','util'])--}}
    <x-laraflex::formedit.input :util="$util" :item="$item" :labelStyle="$labelStyle" :textAlign="$textAlign" :inputStyle="$inputStyle" />

    @endif
    @endforeach
      </form>
</div>
</div>
</div>
</section>
@else

{{--messageNull component Blogcardes ==========================================--}}
<x-laraflex::shared.messagenull />

@endif

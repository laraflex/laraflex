@props(['util','id','button','id'])
@php
    if (!empty($button->btnColor)){
    $btnOptions = ['primary', 'Secondary', 'Success', 'Danger', 'Warning', 'Info', 'Dark', 'link'];
    $btnBorder = '';
    if (!in_array($button->btnColor, $btnOptions)){
        $btnColor = 'light';
        $btnBorder = 'btn-outline-secondary';
    }else{
        $btnColor = $button->btnColor;
        $btnBorder = '';
    }
    }else{
        $btnColor = 'light';
        $btnBorder = 'btn-outline-secondary';
    }
    if (!empty($button->route)){
        $buttonRoute = $util->toRoute($button->route, $id);
    }else{
        $buttonRoute = '#';
    }
 @endphp

<div class="px-2 px-sm-3" style="height:14%;">
<a href="{{$buttonRoute}}" class="btn btn-{{$btnColor}} {{$btnBorder}} btn-sm btn-block mt-3" role="button"
style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.7em + 0.17vw);">
{{$button->caption}}</a>
</div>

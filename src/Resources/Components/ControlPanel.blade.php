@php
/**
 * --------------------------------------------------------------
 * Componentes de cartões para itens de painel de controlle
 */
if (!empty($objeto)) {
    $controlpanel = $objeto;
}
elseif(!empty($object)) {
    $controlpanel = $object;
}


$arrayIcon = ['address-card', 'archive', 'truck-loading', 'clipboard-list', 'copy', 'donate', 'fax',  'file-image', 'id-card',
             'weight', 'volleyball-ball', 'users-cog', 'store', 'building', 'pallet', 'basketball-ball',  'film', 'file-archive',
             'baseball-ball', 'cogs'];

$iconColorArray = ['#B45F04', '#397A33', '#DF0101', '#0B3861', '#FFBF00', '#088A29', '#0B4C5F', '#E7CC32', '#B45F04', '#397A33', '#DF0101',
             '#0B3861', '#FFBF00', '#088A29', '#0B4C5F', '#E7CC32'];

$collumnConfig = 'col-6 col-sm-4 col-md-3 col-lg-2';

/**
 * -----------------------------------------------------------------
 */
@endphp

@if (!empty($controlpanel) && !empty($controlpanel->items))

@php
if (!empty($controlpanel->fontFamily->title)){
    $font_family_title = 'font-family:'.$controlpanel->fontFamily->title;
}else{
    $font_family_title = '';
}
if (!empty($controlpanel->fontFamily->shared)){
    $font_family = 'font-family:'.$controlpanel->fontFamily->shared;
}else{
    $font_family = '';
}


@endphp

<section id="card-control-panel" class="pb-1 pt-2 pt-md-3">
{{--BLOCO PARA COMPONENTES VUEJS--}}
@if (!empty($controlpanel->vuejsComponents))
@php
    $vuejsComponents = $controlpanel->vuejsComponents;
@endphp
@include('components.vuejsComponents')
@endif
{{--FIM DE BLOCO PARA COMPONENTES VUEJS--}}

<div class="container-xl pl-0 pr-0 pr-sm-0 mb-2">
<div class="mx-0 mb-0 mt-1 px-2 px-md-3 px-xl-0">
{{--INICIO DE BLOCO DE COMPONENTE--}}


@if(!empty($controlpanel->title))
    <div class="controlpanel-title text-center pt-3 pb-2" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
    {{$controlpanel->title}}</div>
    @if (!empty($controlpanel->legend))
    <div class="controlpanel-shared text-center pb-3" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
    <span>{{$controlpanel->legend}}</span></div>
    @else
    <div class="pt-2"></div>
    @endif
@endif

<div class="cards row p-0 m-0">

    @foreach ($controlpanel->items as $key => $item)

    @php
    // -------------------------------------------------------------------------
        if (!empty($item->icon)) {
            $icon = 'fa-' . $item->icon;
        }
        else {
            $icon = 'fa-' . $arrayIcon[$key];
        }

        if (property_exists($item, "subItems")) {
            $icon = 'fa-th';
            $dropdown = 'dropdown';
        }
        // --------------------------------
        if (!empty($controlpanel->iconColor)) {
            if ($controlpanel->iconColor == 'allColor') {
                $iconColor = 'color:' . $iconColorArray[$key];
            }else {
                $iconColor = 'color:' . $controlpanel->iconColor;
            }
        }else {
            $iconColor = '';
        }
        $fontColor = '';
        if (!empty($item->bgColor)) {
            $bgColor = 'background-color:' . $item->bgColor;
            $iconColor = 'color: #FFFFFF';
            $fontColor = 'color: #FFFFFF';
        }else {
            $bgColor = '';
        }
        // -----------------------------------
        $subItems = false;
        $dropdown = '';
        $ariaLabel = '';
        if (property_exists($item, "subItems")) {
            $subItems = true;
            $icon = 'fa-th-list';
            $dropdown = 'dropdown';
            $ariaLabel = 'dropdownMenu' . $key;
        }
    // ---------------------------------------------------------------------------
    @endphp

    <div class="{{$collumnConfig}} p-0 m-0">
    <div class="m-2 m-md-1 {{$border}}">

        <div id="cardItem" class="card {{$dropdown}}" style="min-height:8em;{{$bgColor}}">

            @if ($subItems === true)
            <a href="#" class="" id="{{$ariaLabel}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="min-height:8em;">

            @elseif (!empty($item->route))
            <a href="{{$util->toRoute($item->route)}}">
            @else
            <a href="#" >
            @endif
            <div id="item-card" class="card-img-overlay text-center">

            <i class="fas {{$icon}} mt-2 mb-2" style="font-size:180%;{{$iconColor}};"></i>

            @if ($item->label)
            <div class="card-title mt-1" style="font-size:calc(13px + 0.10vw); line-height: 1.2;{{$fontColor}}">{{$item->label}}</div>
            @endif
            </div>
            </a>

            @if ($subItems === true)
            <div class="dropdown-menu mt-5x" aria-labelledby="{{$ariaLabel}}" style="min-width:10em;">
                @foreach ($item->subItems as $subItem)
                @if (!empty($item->route) && !empty($subItem->route))
                <a class="dropdown-item py-2" href="{{$util->toRoute($item->route, $subItem->route)}}" style="font-size:calc(14px + 0.08vw); line-height: 1.2;">
                {{$subItem->label}}</a>
                @endif
                @endforeach

            </div>
            @endif

        </div>

    </div>
    </div>
    @endforeach
</div>
{{--FIM DE BLOCO DE COMPONENTE--}}
</div>
</div>
</section>
@else
<div class="container-xl mt-4 pb-2 px-2 px-md-3 px-xl-0"" translation="no">
    <div class="alert alert-primary {{$border}}" role="alert">
    <div class="content-message alert-heading" style="font-size:calc(0.85em + 0.4vw)"><strong>{{__('Message')}}!</strong></div>
    <hr class="d-none d-sm-block">
    <div class="mb-0" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.18vw);">{{ __('There are no items to display.') }}</div>
    </div>
</div>
@endif

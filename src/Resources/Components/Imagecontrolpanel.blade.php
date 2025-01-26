@php
/**
 * --------------------------------------------------------------
 * Componentes de cartões para itens de painel de controlle
 */
if (!empty($objeto)) {
    $imagecontrolpanel = $objeto;
}
elseif(!empty($object)) {
    $imagecontrolpanel = $object;
}


$arrayIcon = ['address-card', 'archive', 'truck-loading', 'clipboard-list', 'copy', 'donate', 'fax',  'file-image', 'id-card',
    'weight', 'volleyball-ball', 'users-cog', 'store', 'building', 'pallet', 'basketball-ball',  'film', 'file-archive',
     'baseball-ball', 'cogs'];

$collumnConfig = 'col-6 col-sm-4 col-md-3 col-lg-2';

/**
 * -----------------------------------------------------------------
 */
@endphp

@if (!empty($imagecontrolpanel) && !empty($imagecontrolpanel->items))

@php
if (!empty($blogcards->fontFamily->title)){
    $font_family_title = 'font-family:'.$blogcards->fontFamily->title;
}else{
    $font_family_title = '';
}
if (!empty($blogcards->fontFamily->shared)){
    $font_family = 'font-family:'.$blogcards->fontFamily->shared;
}else{
    $font_family = '';
}
@endphp

<section id="image-control-panel" class="pb-1 pt-2 pt-md-3">
{{--BLOCO PARA COMPONENTES VUEJS--}}
@if (!empty($imagecontrolpanel->vuejsComponents))
@php
    $vuejsComponents = $imagecontrolpanel->vuejsComponents;
@endphp
@include('components.vuejsComponents')
@endif
{{--FIM DE BLOCO PARA COMPONENTES VUEJS--}}

<div class="container-xl pl-0 pr-0 pr-sm-0 mb-2">
<div class="mx-0 mb-0 mt-1 px-2 px-md-3 px-xl-0">
{{--INICIO DE BLOCO DE COMPONENTE--}}

@if(!empty($imagecontrolpanel->title))
    <div class="imagecontrolpanel-title text-center pt-3 pb-2" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
    {{$imagecontrolpanel->title}}</div>
    @if (!empty($imagecontrolpanel->legend))
    <div class="imagecontrolpanel-shared text-center pb-3" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
    <span>{{$imagecontrolpanel->legend}}</span></div>
    @else
    <div class="pt-2"></div>
    @endif
@endif

<div class="cards row p-0 m-0">

    @foreach ($imagecontrolpanel->items as $key => $item)

    @php
    // -------------------------------------------------------------------------
        if (!empty($item->image)) {
            $image = $util->toImage($item->image);
        }
        elseif(!empty($item->imagePath)) {
            $image = $util->toImage($item->imagePath);
        }
        elseif(!empty($item->imageStorage)) {
            $image = $item->imageStorage;
        }
        else {
            $image = $util->toImage('local/images/components/cp_image015.jpg');
        }

        if (!empty($item->icon)) {
            $icon = 'fa-' . $item->icon;
        }else {
            $icon = 'fa-' . $arrayIcon[$key];
        }
    // ---------------------------------------------------------------------------
    @endphp

    <div class="{{$collumnConfig}} p-0 m-0">
    <div class="m-2 m-md-1">
    <div class="card bg-dark {{$border}}" style="background-image: url({{$image}});background-repeat:round; min-height:8em">
            @if (!empty($item->route))
            <a href="{{$util->toRoute($item->route)}}">
            @else
            <a href="#" >
            @endif
            {{--<img src="{{$image}}" class="card-img img-fluid" alt="...">--}}
            <div id="item-card" class="card-img-overlay text-center">
                <i class="fas {{$icon}} mt-2 mb-1" style="font-size: 150%"></i>
                @if ($item->label)
                <div class="card-title mt-1" style="font-size:calc(13px + 0.10vw); line-height: 1.2"><b>{{$item->label}}</b></div>
                @endif
            </div>
            </a>
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

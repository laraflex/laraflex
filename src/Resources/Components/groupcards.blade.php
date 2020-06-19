@if (!empty($objeto))
    @php
        $groupCards = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $groupCards = $object;
    @endphp
@endif

@if (!empty($groupCards) && !empty($groupCards->items))
    @php
    if (!empty($groupCards->fontFamily->title)){
        $font_family_title = 'font-family:'.$groupCards->fontFamily->title .';';
    }else{
        $font_family_title = '';
    }
    if (!empty($groupCards->fontFamily->shared)){
        $font_family = 'font-family:'.$groupCards->fontFamily->shared .';';
    }else{
        $font_family = '';
    }
    @endphp


@if (!empty($objectConfig->onePage) && $objectConfig->onePage === true)
    <section id="groupcards" class="m-0 p-0 mx-0 pb-3 pb-lg-4 pt-1 pt-sm-2">
@else
    <section id="groupcards" class="m-0 p-0 mx-0 pb-3 pb-sm-3 pt-1 pt-sm-3">
@endif


<div class="container-xl px-0">
<div class="mx-0 mb-0 mt-1 px-2 px-lg-3 px-xl-0">
<div class="">


    @if (!empty($groupCards->seeMore))
    <div class="row m-0 p-0">
        <div class="col-12 col-sm-9 p-0">
            @if(!empty($groupCards->title))
            <div class="groupcards-title text-left pt-3 pb-2 pl-3" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
            {{$groupCards->title}}</div>
            @if (!empty($groupCards->legend))
                <div class="groupcards-shared text-left pb-3 pl-3" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
                <span>{{$groupCards->legend}}</span></div>
            @endif
            @endif
        </div>
        <div class="col-0 col-sm-3 text-right p-0 pr-2 d-none d-sm-block align-text-bottomx" style="width: 100%;">
            @if(!empty($groupCards->legend) && !empty($groupCards->title))
            <div class="py-2 mb-sm-1 py-xl-2"></div>
            <div class="pt-1 pt-md-2 pt-lg-3 pr-3 pr-lg-4 align-text-bottom" style="height: 100%;">
            <a href="{{$util->toRoute($groupCards->seeMore)}}" class="btn btn-dark m-0">
            {{__('See more')}}
            </a>
            </div>
            @else
            <div class="pb-sm-3 pt-1 pt-md-2 pt-lg-3 pr-3 pr-lg-4 align-text-bottom" style="height: 100%;">
            <a href="{{$util->toRoute($groupCards->seeMore)}}" class="btn btn-dark m-0">
            {{__('See more')}}
            </a>
            </div>
            @endif

        </div>
    </div>

    @else
        @if(!empty($groupCards->title))
        <div class="groupcards-title mt-1 text-center pt-2 pb-3 pr-2 pl-2" style="font-size:calc(1.1em + 0.6vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
        {{$groupCards->title}}</div>
        @endif
        @if (!empty($groupCards->legend))
        <div class="slidebar-shared text-center pb-2 pb-sm-3" style="font-size:calc(0.78em + 0.29vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
        <span style="color:gray">{{$groupCards->legend}}</span></div>
        @endif
    @endif


    <div class="row p-0 m-0 pt-1">

    @php
    $visibility = ['d-block ', 'd-block ', 'd-block ', 'd-block', 'd-none d-sm-block d-lg-none', 'd-none d-sm-block d-lg-none'];
    $array_margin_bottom = ['mb-3 mb-lg-0','mb-3 mb-lg-0','mb-sm-3 mb-lg-0','mb-0', 'mb-0','mb-0'];
    $margin_bottom = 'mb-2 mb-md-3';
    $num_limit = 6;
    $showLimit = false;

    if (!empty($groupCards->seeMore)){
        $showLimit = true;
    }else{
        $showLimit = false;
    }

    @endphp

    @foreach ($groupCards->items as $key =>$item)
     {{--Início das colunas do componente--}}
    @php
    if (!empty($num_limit) && $key >= $num_limit){
    break;
    }

    if ($showLimit === true){
        $margin_bottom = $array_margin_bottom[$key];
    }
    @endphp

    <div class="col-6 col-sm-4 col-md-4 col-lg-3  {{$margin_bottom}} p-0">

    @if ($showLimit === true)
    <div class="mx-1 h-100 {{$border}} {{$visibility[$key]}}">
    @else
    <div class="mx-1 h-100 {{$border}}">
    @endif

    {{--<div id="groupcard" class="groupcards-item ml-1 mr-1 pb-2 pb-md-0 {{$border}}" style="height:100%;">--}}

    {{--Bloco interno----}}
    @if (!empty($groupCards->button))
    <div class="p-2 p-md-3 m-0 " style="height:86%">
    @else
    <div class="p-2 p-md-3" style="height:100%">
    @endif

    {{--Controle para adicionar imagem--}}
    @if (in_array('image', $groupCards->showItems) && !empty($item->image))
        @php
        if (!empty($groupCards->imagePath)){
            $image = $util->toImage($groupCards->imagePath, $item->image);
        }else{
            $image = $util->toImage($item->image);
        }
        @endphp

    @if (!empty($groupCards->bgEffect) && $groupCards->bgEffect === true)
    <div class="groupcards-panel text-center rounded mb-0" style="min-height: calc(110px + 6vw);">
    @else
    <div class="text-center mb-0" style="min-height: calc(60px + 12vw) height:100%;">
    @endif
    <a href="{{$util->toRoute($groupCards->route, $item->id)}}" class="" >
    <img src="{{$image}}" class="img-fluid mx-auto " alt="...">
    </a>
    </div>
    
    @endif

    {{--Fim Controle para adicionar imagem--}}
    <div class="">
    @foreach($groupCards->showItems as $fieldName)

    @php
        //-> Separa as propriedades de fonte do atributo de showItems
        if (strpos($fieldName, '->>')){
            $arrayTmp = explode('->>', $fieldName);
            $fieldName = $arrayTmp[0];
            $fontOptions = $arrayTmp[1];
        }else{
            $fontOptions ="";
        }
        //-> Fim ------------------------------------------
    @endphp

    @if(!empty($item->$fieldName))
    @if($fieldName != 'image')
    @if($fieldName == 'title')
    <div class="card-text pt-2 pt-lg-3" style="font-size:calc(0.76em + 0.3vw);line-height:calc(14px + 0.3vw);{{$font_family_title}}">
    <strong>{{$item->title}}</strong></div>
    @elseif($fieldName != 'rating')
    <div class="">

    {{--Algoritmo de codificaçãode de fonte -----------------------------------------}}
    @php
        $style_font = 'font-size:calc(0.73em + 0.25vw);line-height:calc(1.1em + 0.28vw);';
        $optionsStyle = ['italic','normal','strong'];
        $styleFont = "";
        $endStyleFont = "";
        $font_color = "";
        if ($fontOptions != ""){
            $arrayOptions = explode('|', $fontOptions);

            if (!empty($arrayOptions[0]) && in_array(strtolower($arrayOptions[0]), $optionsStyle)){
                if($arrayOptions[0] == 'italic'){
                    $styleFont = '<i>';
                    $endStyleFont = '</i>';
                }else{
                    $styleFont = '<' .$arrayOptions[0] . '>';
                    $endStyleFont = '</' . $arrayOptions[0] . '>';
                }
                if(!empty($arrayOptions[1])){
                    if (strtolower($arrayOptions[1]) == 'large'){
                        $style_font = 'font-size:calc(0.9em + 0.20vw);line-height:calc(1.1em + 0.28vw);';
                    }elseif (strtolower($arrayOptions[1]) == 'x-large'){
                        $style_font = 'font-size:calc(1em + 0.25vw);line-height:calc(1.1em + 0.28vw);';
                    }if (strtolower($arrayOptions[1]) == 'normal'){
                        $style_font = 'font-size:calc(0.73em + 0.25vw);line-height:calc(1.1em + 0.28vw);';
                    }
                    if(!empty($arrayOptions[2])){
                        $font_color = 'color:' . $arrayOptions[2] . ';';
                    }
                }
            }
        }
    @endphp
    {{--End de codificaçãode de fonte -----------------------------------------}}

    <p class="card-text pt-1 pt-lg-2" style="{{$style_font}}{{$font_color}}{{$font_family}}">
    {!!$styleFont!!} {{--Potions: italic, normal, strong--}}
    {{$item->$fieldName}}
    {!!$endStyleFont!!}
    </p>

    </div>
    @endif
    @endif
    @endif

    @endforeach

    @foreach ($groupCards->items as $item)
    {{--Adicionando rating --------------------------------------------------}}
    @if(!empty($item->rating) && in_array('rating', $groupCards->showItems))
        <div class="mt-2" style="font-size:calc(11px + 0.25vw);line-height:1.3;{{$font_family}}">
        {{$item->rating}}
        @for ($i = 1; $i <= intval($item->rating); $i++)
        <img src="{{$util->toImage('images/icons', 'star.png')}}" width="13px" height="12px" class="m-0 mb-1" />
        @endfor
        @if ($item->rating != intval($item->rating))
        <img src="{{$util->toImage('images/icons', 'starsmall.png')}}" width="13px" height="12px" class="m-0 mb-1" />
        @endif
        </div>
        @php
        break;
        @endphp
    @endif
    {{--Fim de rating --------------------------------------------------------}}
    @endforeach

    </div>

    </div>

    @if (!empty($groupCards->button))
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
    <div class="px-2 px-sm-3" style="height:14%;">
    <a href="{{$util->toRoute($groupCards->button->route, $item->id)}}" class="btn btn-{{$btnColor}} {{$btnBorder}} btn-sm btn-block mt-3" role="button"
    style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.7em + 0.17vw);">
    {{$groupCards->button->caption}}</a>
    </div>
    @endif

    {{--End bloco interno----}}
    </div>
    </div>
    {{--Fim das colunas do componente--}}
    @endforeach
</div>

{{--Bloco de see more ---------------------------}}
@if (!empty($groupCards->seeMore))
<div class="pl-3 pl-lg-4 mt-3 d-block d-sm-none">
    <a href="{{$util->toRoute($groupCards->seeMore)}}" class="btn btn-sm btn-dark m-0">
    <span class="px-2">{{__('See more')}}</span>
    </a>
</div>
{{--pagination--------------------------------------}}
@elseif (!empty($groupCards->paginate))
<div id="default-paginator" class="text-center nav justify-content-center pt-sm-2" aria-label="Page" translator>
{!!$groupCards->paginate->links()!!}
</div>
@endif
{{--Fim de bloco seeMore--}}

</div>
</div>

{{--Icon de retorno ao topo da página--}}
@if (!empty($objetoConfig->onePage) && $objetoConfig->onePage === true)
<div class="w-100 pb-sm-3 pt-sm-3 d-none d-sm-block pl-5 container-xl">
<a href="#top">
<img src="{{$util->toImage('images/icons', 'setadupla.png')}}" width="26" height="26" class="float-left rounded d-block">
</a>
</div>
@endif
{{--End Icon de retorno ao topo da página--}}


</div>
</section>
@else
@if (!empty($blogcards->nullable) && $blogcards->nullable === true)
    <div class="text-center mt-2 mb-2"></div>
@else
<div class="container-xl px-3 mt-4 pb-2" translation="no">
    <div class="alert alert-primary {{$border}}" role="alert">
    <div class="content-message alert-heading" style="font-size:calc(0.85em + 0.4vw)"><strong>{{__('Message')}}!</strong></div>
    <hr class="d-none d-sm-block">
    <div class="mb-0" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.18vw);">{{ __('There are no items to display.') }}</div>
    </div>
</div>
@endif
@endif

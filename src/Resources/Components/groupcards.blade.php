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

<section class="groupcards">
<div class="mb-4 mt-3">
    @if(!empty($groupCards->title))
    <div class="groupcards-title mt-1 text-center pt-2 pb-3 pr-2 pl-2" style="font-size:calc(0.85em + 0.6vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
    {{$groupCards->title}}</div>
    @endif
    <div class="row border rounded p-0 m-0 pt-1">
    @foreach ($groupCards->items as $key =>$item)
     {{--Início das colunas do componente--}}
    <div class="col-6 col-sm-4 col-md-4 col-lg-3 mb-3 p-0">
    <div id="groupcard" class="ml-1 mr-1 pb-2 {{$border}}">
    <header class="p-2 p-md-3">

    {{--Controle para adicionar imagem--}}
    @if (in_array('image', $groupCards->showItems))
    @if (!empty($groupCards->imagePath) && !empty($item->image))
        @php
        $image = $util->toImage($groupCards->imagePath, $item->image);
        @endphp
    <div class="w-100 text-center">
    <a href="{{$util->toRoute($groupCards->route, $item->id)}}" class="" >
    <img src="{{$image}}" class="card-img-top mx-auto p-0 mb-2" alt="..."/ style="width:85%;">
    </a>
    </div>
    @endif
    @endif
    {{--Fim Controle para adicionar imagem--}}

    @foreach($groupCards->showItems as $fieldName)
    <div class="">
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
    <div class="card-text pt-1 pt-lg-2" style="font-size:calc(0.76em + 0.3vw);line-height:calc(14px + 0.3vw);{{$font_family_title}}">
    <strong>{{$item->subTitle}}</strong></div>
    @else
    <div>

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
    </div>
    @endforeach

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
    <a href="{{$util->toRoute($groupCards->button->route, $item->id)}}" class="btn btn-{{$btnColor}} {{$btnBorder}} btn-sm btn-block mt-3" role="button"
        style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.7em + 0.17vw);">
    {{$groupCards->button->caption}}</a>
    @endif
    </header>
    </div>
    </div>
    {{--Fim das colunas do componente--}}
    @endforeach
</div>
{{--$paginate--------------------------------------}}
@if (!empty($groupCards->paginate))
<div class="text-center nav justify-content-center">
    {!!$groupCards->paginate->links()!!}
</div>
@endif
</div>
</section>
@else
@if (!empty($groupCards->nullable) && $groupCards->nullable === true)
    <div class="text-center mt-2 mb-2"></div>
@else
    <div class="text-center p-4 mt-3 mb-3 {{$border}}">
    <h5>{{ __('There are no items to display.') }}</h5>
    </div>
@endif
@endif

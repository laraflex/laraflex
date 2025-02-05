@props(['util','data','showItems','font_family' ])
@foreach($showItems as $item)
@php
//-> Separa as propriedades de fonte do atributo de showItems
    if (strpos($item, '->>')){
        $arrayTmp = explode('->>', $item);
        $item = $arrayTmp[0];
        $fontOptions = $arrayTmp[1];
    }else{
        $fontOptions ="";
    }
        //-> Fim ------------------------------------------
@endphp
{{--Algoritmo de codificaçãode de fonte -----------------------------------------}}
@php
    $style_font = 'font-size:calc(0.8em + 0.25vw);line-height:calc(1.1em + 0.28vw);';
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
                $style_font = 'font-size:calc(0.8em + 0.9vw);line-height:calc(1.1em + 0.28vw);';
            }elseif (strtolower($arrayOptions[1]) == 'x-large'){
                $style_font = 'font-size:calc(0.9em + 1vw);line-height:calc(1.1em + 0.28vw);';
                }if (strtolower($arrayOptions[1]) == 'normal'){
                    $style_font = 'font-size:calc(0.8em + 0.25vw);line-height:calc(1.1em + 0.28vw);';
                }
                if(!empty($arrayOptions[2])){
                     $font_color = 'color:' . $arrayOptions[2] . ';';
                }
            }
        }
    }
@endphp
{{--End de codificaçãode de fonte -----------------------------------------}}
<p class="m-0 p-0 mb-1 mb-sm-2" style="{{$style_font}}{{$font_color}}{{$font_family}}">
    {!!$styleFont!!} {{--Potions: italic, normal, strong--}}
    {{$data->$item}}
    {!!$endStyleFont!!}
</p>
@endforeach

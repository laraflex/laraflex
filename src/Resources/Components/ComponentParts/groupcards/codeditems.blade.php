@props(['util','fieldNameTmp','font_family','fontOptions'])
<div class="">
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
    <p class="card-text pt-1 pt-lg-2" style="{{$style_font}}{{$font_color}}{{$font_family}}">
    {!!$styleFont!!} {{--Potions: italic, normal, strong--}}
    {{$fieldNameTmp}}
    {!!$endStyleFont!!}
    </p>
    </div>






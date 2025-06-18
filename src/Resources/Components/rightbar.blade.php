@php
    if(!empty($objectBlog)){
        $rightBar = $objectBlog;
    }
    elseif(!empty($object)){
        $rightBar = $object;
    }

    if (!empty($rightBar->title)){
        $titleBar = $rightBar->title;
    }else{
        $titleBar = "Side Bar";
    }

    if (!empty($rightBar->fontStyle->font_size)){
        $size = $rightBar->fontStyle->font_size;
        if ($size == 'x-large'){
            $font_title_size = 'font-size:calc(1.2em + 0.4vw);line-height:calc(16px + 1.5vw);'; //x_large
            $font_size = 'font-size:calc(1.0em + 0.3vw);'; //x_large
        }elseif ($size == 'large'){
            $font_title_size = 'font-size:calc(1.1em + 0.4vw);line-height:calc(16px + 1.5vw);'; //large
            $font_size = 'font-size:calc(0.95em + 0.2vw);'; //large
        }elseif ($size == 'normal'){
            $font_title_size = 'font-size:calc(1.0em + 0.2vw);line-height:calc(16px + 1.4vw);'; //normal
            $font_size = 'font-size:calc(0.95em + 0.1vw);'; //normal
        }else{
            $font_title_size = 'font-size:calc(1.0em + 0.2vw);line-height:calc(16px + 1.4vw);'; //default
            $font_size = 'font-size:calc(0.8em + 0.2vw);'; //default
        }
    }else{
        $font_title_size = 'font-size:calc(1.0em + 0.2vw);line-height:calc(16px + 1.4vw);'; //default
        $font_size = 'font-size:calc(0.8em + 0.2vw);'; //default
    }

    $font_family = (!empty($rightBar->fontStyle->font_family)) ? 'font-family:' . $rightBar->fontStyle->font_family . ';' : '';
    $font_style = (!empty($rightBar->fontStyle->font_style)) ? 'font-style:' . $rightBar->fontStyle->font_style . ';' : '';

@endphp


@if (!empty($rightBar) && !empty($rightBar->items))

<div class="d-flex flex-column align-items-stretch flex-shrink-0x bg-white mt-2 mt-lg-5 w-100">

    <div href="/" class="w-100 d-flex text-start flex-shrink-0 pt-2 pt-lg-3 mb-4">
      <span class="text-start mx-2" style="{{$font_title_size}}{{$font_family}}{{$font_style}}">{{$titleBar}}</span>
    </div>

<div class="row  w-100 pl-2 pl-lg-0 pl-xl-2 mx-0 mb-3">

    @foreach($rightBar->items as $key => $item)
    @php
        //Controle das variáveis do componente
        $borderTop = ($key == 0) ? "border-top" : "";
        $title =  (!empty($item->title)) ? $item->title : "";
        $abstract =  (!empty($item->abstract)) ? $item->abstract : "";

        if (!empty($rightBar->route)){
        $route = $util->toRoute($rightBar->route) . '/'. $item->id;
        }else{
            $route = '#';
        }

        if ($abstract != ""){
            $num_words = str_word_count($abstract);
            if ($num_words > 15){
                $words = explode(" ", $abstract);
                $stringView = implode(" ", array_slice($words, 0, 15)) . ' ...';

            }else{
                $stringView = $abstract;
            }
        }

        if (!empty($item->flag)){
             $flag = $item->flag;
        }else{
            $flag = NULL;
        }

    @endphp

    <div class="col-md-6 col-lg-12 align-items-start py-3 pl-lg-0 pl-xl-3 border-dark border-bottom {{$borderTop}}">
        <a href="{{$route}}" class="list-group-item list-group-item-actionx  lh-tightx">
        <div class="d-flex w-100">
            <span class=" mb-1" style="{{$font_size}}{{$font_family}}{{$font_style}}">{{$title}}</span>
        </div>
        <div class="mb-1 small" style="{{$font_style}}">{{$stringView}}</div>
        </a>
    </div>

    @endforeach




</div>
</div>

@endif

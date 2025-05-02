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
        if ($size == 'x_large'){
            $font_title_size = 'font-size:calc(1.2em + 0.4vw);line-height:calc(16px + 1.5vw);'; //x_large
            $font_size = 'font-size:calc(1.0em + 0.3vw);line-height:calc(16px + 1.5vw);'; //x_large
        }elseif ($size == 'large'){
            $font_title_size = 'font-size:calc(1.1em + 0.4vw);line-height:calc(16px + 1.5vw);'; //large
            $font_size = 'font-size:calc(0.8em + 0.4vw);line-height:calc(16px + 1.5vw);'; //large
        }elseif ($size == 'normal'){
            $font_title_size = 'font-size:calc(1.0em + 0.2vw);line-height:calc(16px + 1.4vw);'; //normal
            $font_size = 'font-size:calc(0.8em + 0.1vw);line-height:calc(16px + 1.4vw);'; //normal
        }elseif ($size == 'small'){
            $font_title_size = 'font-size:calc(0.8em + 0.2vw);line-height:calc(16px + 1.3vw);'; //small
            $font_size = 'font-size:calc(0.6em + 0.2vw);line-height:calc(16px + 1.3vw);'; //small
        }
    }else{
        $font_title_size = 'font-size:calc(1.0em + 0.2vw);line-height:calc(16px + 1.4vw);'; //default
        $font_size = 'font-size:calc(0.8em + 0.2vw);line-height:calc(16px + 1.4vw);'; //default
    }

    $font_family = (!empty($rightBar->fontStyle->font_family)) ? 'font-family:' . $rightBar->fontStyle->font_family . ';' : '';
    $font_style = (!empty($rightBar->fontStyle->font_style)) ? 'font-style:' . $rightBar->fontStyle->font_style . ';' : '';

@endphp


@if (!empty($rightBar) && !empty($rightBar->items))

<div class="d-flex flex-column align-items-stretch flex-shrink-0x bg-white mt-2 mt-lg-5 w-100">

    <div href="/" class="w-100 d-flex text-left flex-shrink-0 py-2 py-lg-3 ml-4 ml-lg-0 ml-xl-4">
      <span class="text-left" style="{{$font_title_size}}{{$font_family}}{{$font_style}}">{{$titleBar}}</span>
    </div>

<div class="row  w-100 pl-2 pl-lg-0 pl-xl-2 list-group-flushx scrollareax mx-0">

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
            $flag = '12';
        }

    @endphp

    <div class="col-md-6 col-lg-12 align-items-start py-3 pl-lg-0 pl-xl-3 border-bottom {{$borderTop}}">
        <a href="{{$route}}" class="list-group-itemx list-group-item-action  lh-tightx ">
        <div class="d-flex w-100 align-items-center justify-content-between">
          <strong class="mb-1" style="{{$font_size}}{{$font_family}}{{$font_style}}">{{$title}}</strong>
          <span class="badge rounded-pill text-bg-primary border"><i>{{$flag}}</i></span>
        </div>
        <div class="mb-1 small" style="{{$font_style}}">{{$stringView}}</div>
      </a>
    </div>

    @endforeach




</div>
</div>

@endif

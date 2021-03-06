@if(!empty($objeto))
    @php
        $panel = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $panel = $object;
    @endphp
@endif

@if (!empty($panel))
@php
    if (!empty($panel->fontFamily->title)){
        $font_family_title = 'font-family:'.$panel->fontFamily->title .';';
    }else{
        $font_family_title = '';
    }
    if (!empty($panel->fontFamily->shared)){
        $font_family = 'font-family:'.$panel->fontFamily->shared .';';
    }else{
        $font_family = '';
    }
        $stylePanel = $border;
@endphp

    <section id="panel" class="pb-1 pt-3 pt-md-4">
    <div class="container-xl px-0">
    <div class="mx-0 mb-0 mt-1 px-2 px-lg-3 px-xl-0">

    @if(!empty($panel->title))
    <div class="mt-1 text-center pt-2 pb-3" style="font-size:calc(1.0em + 0.75vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
    {{$panel->title}}</div>
    @endif

    @if(!empty($panel->bgColor))
    <div class="row w-100 p-0 m-0 pt-3 pt-sm-0 pb-2 {{$stylePanel}}" style="background-color:{{$panel->bgColor}}">
    @else
    <div class="row w-100 p-0 m-0 pt-3 pt-sm-0 pb-2 {{$stylePanel}}">
    @endif
    @if(!empty($panel->images))
    <div class="col-12 col-sm-5 col-md-4 bg-white p-0 m-0 my-auto">
    <!-- Carousel ================================================== -->
    <div id="CarouselItems" class="carousel slide pt-lg-4" data-ride="carousel">
    <ol class="carousel-indicators mb-0">
    @foreach($panel->images as $key => $image)
        @if($key == 0)
        <li data-target="#CarouselItems" data-slide-to="{{$key}}" class="active bg-dark"></li>
        @else
        <li data-target="#CarouselItems" data-slide-to="{{$key}}" class="bg-dark"></li>
        @endif
    @endforeach
    </ol>
    <div class="carousel-inner">
    @foreach($panel->images as $key => $imageItem)
        @if ($key == 0)
        <div class="carousel-item active" >
        @else
        <div class="carousel-item" >
        @endif
    @php
    if (!empty($imageItem->imageStorage)){
        $image = $imageItem->imageStorage;
    }
    elseif (!empty($imageItem->imagePath)){
        $image = $util->toImage($imageItem->imagePath);
    }
    elseif (!empty($imageItem->image)){
        $image = $util->toImage($imageItem->image);
    }
    @endphp
    @if(!empty($panel->lightbox)  && $panel->lightbox == true && !empty($image))
    <a href="{{$image}}" class="stretched-link" data-toggle="lightbox" data-gallery="gallery" style="cursor:zoom-in">
    <img class="d-none d-sm-block mx-auto img-fluid p-0 pb-0"src="{{$image}}" alt="" style="max-height:350px; width:80%">
    <img class="d-block d-sm-none mx-auto img-fluid p-0 pb-0"src="{{$image}}" alt="" style="max-height:320px; width:60%">
    </a>
    @elseif(!empty($image))
    <img class="d-none d-sm-block mx-auto img-fluid p-0 pb-0"src="{{$image}}" alt="" style="max-height:350px; width:80%">
    <img class="d-block d-sm-none mx-auto img-fluid p-0 pb-0"src="{{$image}}" alt="" style="max-height:320px; width:60%">
    @endif
    </div>
    @endforeach
    </div>
    <a class="carousel-control-prev" href="#CarouselItems" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon " aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#CarouselItems" role="button" data-slide="next">
    <span class="carousel-control-next-icon " aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
    <div class="mt-2" style="color:white">
    click here
    </div>
    </div>
    </div>
    {{--Fim do carrocel---------------}}
    <div class="col-12 col-sm-7 col-md-8 contents pt-2 pb-2 pt-sm-4 pt-md-5 pb-sm-3 pl-sm-3 pr-lg-3 ">
    @else
    <div class="col-12 contents py-3 py-sm-4 py-lg-5 px-3 px-sm-4 px-lg-5">
    @endif
    @foreach($panel->showItems as $item)
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
        {{$panel->data->$item}}
        {!!$endStyleFont!!}
    </p>
    @endforeach
    @if (!empty($panel->form))
    {{--Formulário de componente ---------------------------------}}
    @php
        $route = $util->toRoute($panel->form->action);
        if (!empty($panel->form->method)){
            $method = $panel->form->method;
        }else{
            $method = 'post';
        }
    @endphp
        <form class="form-inline mt-2 mt-md-3" method="{{$method}}" action="{{$route}}" id="{{$panel->form->id}}">
            @csrf
            <input type="hidden" id="id" name="id" value="{{$panel->data->id}}">
            @if (!empty($panel->form->items))
            @foreach ($panel->form->items as $i => $item)
            {{--Input increment--}}
            @if (!empty($item->type) && $item->type == 'increment')
            <div class="d-none d-md-block">
            <a href="#" onclick="decrementaValor(1); return false;" >
            <span class="pr-1 " style="font-size:20px;color:#000000;">-</span></a>     
            <a href="#" onclick="incrementaValor(10);return false;">
            <span class="pl-1 pr-2" style="font-size:16px;color:#000000;">+</span></a>
            </div>
            <div class="form-groupx plx-2 mb-2 p-0 pr-2">          
            <div class="plx-2 m-0" style="font-size:calc(0.65em + 0.2vw)">{{$item->label}}</div>       
            <input name="{{$item->name}}" id="increment" value="1" style="width: 45px;" class="form-control m-0">        
            </div>
            @elseif(!empty($item->type) && $item->type == 'select') 
            {{--End increment--}}
            <div class="form-groupx mb-2 mr-2">
            <div class="pl-2 text-left" style="font-size:calc(0.65em + 0.2vw)">{{$item->label}}</div>
            <select id="{{$item->id}}" class="form-control" name="{{$item->name}}" style="font-size:calc(0.76em + 0.25vw);line-height: 2;" >
            <option value="" style="font-sizex:calc(0.76em + 0.25vw); line-height: 1.5;">{{$item->label}}...</option>
            @if (!empty($item->options))
            @foreach ($item->options as $key => $option)
            @if ($key == 0)
            <option value="{{$option->value}}" style="font-sizex:calc(0.76em + 0.25vw); line-height:2;"  selected="selected">
            @else
            <option value="{{$option->value}}" style="font-sizex:calc(0.76em + 0.25vw); line-height:2;">
            @endif
            <span class="border">
            {{$option->label}}
            </span>
            </option>
            @endforeach
            @endif
            </select>
            </div>
            @endif      
            @php
            if ($i == 1){
            break;
            }
            @endphp

        @endforeach
        @endif
        @php
            if (!empty($panel->form->items)){
                $marginTop = 'mt-3';
            }else{
                $marginTop = '';
            }

        @endphp

        <div class="p-1">
        <button type="submit" class="btn btn-light btn-outline-secondary mb-2 {{$marginTop}}"  style="font-size:calc(0.76em + 0.25vw);line-height:calc(1.1em + 0.28vw);">
        {{$panel->form->button}}</button>
        </div>
    </form>
    {{--End formúlário -------------------------------------------}}

    @endif
    </div>
    </div>
</div>
@if(!empty($panel->showAddons))
@php
    $style_font_title = 'font-size:calc(0.96em + 0.25vw);line-height:calc(1.3em + 0.3vw);';
    $style_font = 'font-size:calc(0.8em + 0.28vw);line-height:calc(1.3em + 0.35vw);';
@endphp
<div class="px-2 px-lg-3 px-xl-0">
<div class="w-100 p-3 p-sm-4 p-lg-5 mb-4 mt-3 text-justify {{$stylePanel}}">
    @if(!empty($panel->addionTitle))
    <div style="{{$style_font_title}}{{$font_family_title}}">{{$panel->addionTitle}}</div>
    @endif
    @foreach($panel->showAddons as $item)
    <p class="mt-2 mt-sm-3" style="{{$style_font}}{{$font_family}}">{{$panel->data->$item}}</p>
    @endforeach
</div>
</div>
@endif
</section>
@else
<div class="container-xl px-3 mt-4 pb-2" translation="no">
    <div class="alert alert-primary {{$border}}" role="alert">
    <div class="content-message alert-heading" style="font-size:calc(0.85em + 0.4vw)"><strong>{{__('Message')}}!</strong></div>
    <hr class="d-none d-sm-block">
    <div class="mb-0" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.18vw);">{{ __('There are no items to display.') }}</div>
    </div>
</div>
@endif

@if (!empty($objeto))
    @php
        $blogcards = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $blogcards = $object;
    @endphp
@endif


@if (!empty($blogcards) && !empty($blogcards->items))
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

<section id="blogcards" class="pb-1 pt-3 pt-md-4">
<!--div id="blogcards" class="pb-1 pt-3 pt-md-4"-->

{{--BLOCO PARA COMPONENTES VUEJS--}}
@if (!empty($blogcards->vuejsComponents))
@php
    $vuejsComponents = $blogcards->vuejsComponents;
@endphp
@include('components.vuejsComponents')
@endif
{{--FIM DE BLOCO PARA COMPONENTES VUEJS--}}
<div class="container-xl px-0">
<div class="mx-0 mb-0 mt-1 px-2 px-lg-3 px-xl-0">
    <div class="d-none d-sm-block pb-0 mb-0">
        @if (!empty($blogcards->seeMore))
        <div class="row m-0 p-0">
            <div class="col-12 col-sm-9 p-0">
                @if(!empty($blogcards->title))
                <div class="blogcards-title text-left pt-3 pb-2 pl-3" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
                {{$blogcards->title}}</div>
                @if (!empty($blogcards->legend))
                    <div class="blogcards-shared text-left pb-3 pl-3" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
                    <span>{{$blogcards->legend}}</span></div>
                @endif
                @endif
            </div>
            <div class="col-0 col-sm-3 text-right p-0 pr-2 d-none d-sm-block" style="width: 100%;">
                @if(!empty($blogcards->legend) && !empty($blogcards->title))
                <div class="py-2 mb-sm-1 py-xl-2"></div>
                <div class="pt-1 pt-md-2 pt-lg-3 pr-3 pr-lg-4 align-text-bottom" style="height: 100%;">
                <a href="{{$util->toRoute($blogcards->seeMore)}}" class="btn btn-dark m-0">
                {{__('See more')}}
                </a>
                </div>
                @else
                <div class="pb-sm-3 pt-1 pt-md-2 pt-lg-3 pr-3 pr-lg-4 align-text-bottom" style="height: 100%;">
                <a href="{{$util->toRoute($blogcards->seeMore)}}" class="btn btn-dark m-0">
                {{__('See more')}}
                </a>
                </div>
                @endif
            </div>
        </div>
        @else
            @if(!empty($blogcards->title))
            <div class="blogcards-title text-center pt-3 pb-2" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
            {{$blogcards->title}}</div>
            @if (!empty($blogcards->legend))
                <div class="blogcards-shared text-center pb-3" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
                <span>{{$blogcards->legend}}</span></div>
            @else
                <div class="pt-2"></div>
            @endif
            @endif
        @endif
    <div class="row p-2">
        {{--Início linha linha ==== --}}
    @php
    $column = 'col-sm-4 col-md-4 col-lg-3';
    $titleFont = 'font-size:calc(0.8em + 0.2vw); line-height:1.2;';
    $sharedFont = 'font-size:calc(0.6em + 0.15vw);letter-spacing: 2px;';
    $fontAbstract = 'font-size:calc(0.68em + 0.15vw);';
    $visibility = ['d-block', 'd-block', 'd-block', 'd-none d-lg-block', 'd-none d-lg-block', 'd-none d-lg-block', 'd-none d-lg-block', 'd-none d-lg-block'];
    $num_limit = 4;
    @endphp
    @foreach ($blogcards->items as $key => $item)
    @if (!empty($blogcards->seeMore))
    @php
    if ($key == $num_limit){
    break;
    }
    @endphp
    <div class="{{$column}} p-0 pb-2 pb-lg-3 {{$visibility[$key]}}">
    @else
    <div class="{{$column}} p-0 pb-2 pb-lg-3">
    @endif
    <article class= "mx-sm-1 mx-lg-2 h-100 {{$border}}">
    <header class="p-sm-3 p-md-3">
    @if (in_array('title', $blogcards->showItems) && !empty($item->title))
    <div class="blogcards-item-title" style="{{$titleFont}} ;{{$font_family_title}}">{{$item->title}}</div>
    @endif
    @if (in_array('date', $blogcards->showItems) && !empty($item->date))
    <div class="blogcards-item-shared pt-1" style="{{$sharedFont}} {{$font_family}}">
    <span><small>  {{$item->date}}</small></span>
    </div>
    @endif
    @if (in_array('image', $blogcards->showItems))
        @php
        if (!empty($item->imageStorage)){
            $image = $item->imageStorage;
        }
        elseif (!empty($item->imagePath)){
            $image = $util->toImage($item->imagePath);
        }
        elseif(!empty($item->image)){
            $image = $util->toImage($item->image);
        }
        @endphp
    @if (!empty($image))
    <img class="card-img mt-2 mb-2" src="{{$image}}" alt="" />
    @endif
    @endif
    @if (in_array('abstract', $blogcards->showItems))
    @if (!empty($item->abstract))
            @php
            if (in_array('title', $blogcards->showItems) && !empty($item->title)){
                $numCharTitle = strlen($item->title);
            }else{
                $numCharTitle = 30;
            }
                if (!empty($blogcards->expanded) && $blogcards->expanded === true){
                    if ($numCharTitle <= 32){
                        $numChar = 252;
                    }elseif($numCharTitle > 31 && $numCharTitle < 64){
                        $numChar = 220;
                    }else{
                        $numChar = 160;
                    }
                }else{

                    if ($numCharTitle <= 28){
                        $numChar = 150;
                    }elseif($numCharTitle > 26 && $numCharTitle <= 52){
                        $numChar = 135;
                    }else{
                        $numChar = 100;
                    }
                }
                $str1 = substr("$item->abstract", 0, $numChar);
            @endphp
    <div class="blogcards-item-shared text-justify mt-2 mb-2" style="{{$fontAbstract}} line-height:calc(0.92em + 0.4vw);{{$font_family}}">{!!$str1!!}...</div>
    @endif
    @endif
    {{--Adicionando rating --------------------------------------------------}}
    @if(!empty($item->rating) && in_array('rating', $blogcards->showItems))
    <div>
    @for ($i = 1; $i <= intval($item->rating); $i++)
    <img src="{{$util->toImage('local/images/icons', 'star.png')}}" width="13px" height="12px" class="m-0 mb-1" />
    @endfor
    @if ($item->rating != intval($item->rating))
    <img src="{{$util->toImage('local/images/icons', 'starsmall.png')}}" width="13px" height="12px" class="m-0 mb-1" />
    @endif
    </div>
    @endif
    {{--Fim de rating --------------------------------------------------------}}
    {{--Button --------------------}}
    @if (!empty($blogcards->vueAction) && !empty($blogcards->vuejsComponents))
    <a href="#" class="btn btn-sm btn-outline-dark mt-2" v-on:click="{{$blogcards->vueAction}}('{{$item->id}}')" >{{__('Read more')}}</a>
    @elseif (!empty($blogcards->route))
        @php
           $link = $util->toRoute($blogcards->route, $item->id);
           if (!empty($blogcards->target) && $blogcards->target == 'blank'){
               $target = 'target="_blank"';
           }else{
               $target = '';
           }
        @endphp
    <a class="btn btn-sm btn-outline-secondary mt-2" href="{{$link}}" role="button" rel="noopener noreferrer" {!!$target!!}>Leia mais</a>
    @endif
    {{--End button ----------------}}
    </header>
    </article>
    </div>
    @endforeach
    </div>

{{--pagination--------------------------------------}}
@if (!empty($blogcards->seeMore))

@elseif (!empty($blogcards->paginate))
<div id="default-paginator" class="text-center nav justify-content-center pt-sm-2" aria-label="Page" translator>
{!!$blogcards->paginate->links('components.bootstrap')!!}
</div>
@endif
{{--End Pagination----------------------------------}}
</div>
{{--Icon de retorno ao topo da página--}}
@if (!empty($objetoConfig->onePage) && $objetoConfig->onePage === true)
<div class="w-100 pb-sm-3 pt-sm-0 d-none d-sm-block pl-5 container-xl">
<a href="#top">
<img src="{{$util->toImage('local/images/icons', 'setadupla.png')}}" width="26" height="26" class="float-left rounded d-block">
</a>
</div>
@endif
{{--End Icon de retorno ao topo da página--}}
</div>
</div>
{{--8888888888888888888888888888888888888888888888888888888888--}}
<div class="d-block d-sm-none mb-3 bg-white">
    <div id="headerSection" class="pt-0 pb-2">
        <h6 class="text-center font-weight-normal">{{$blogcards->title}}</h6>
    </div>
    <ul class="list-unstyled">
    @foreach ($blogcards->items as $key => $item)
        @php
            if (!empty($blogcards->seeMore) && $key == 4){
            break;
            }

            if(!empty($blogcards->route)){
                $link = $util->toRoute($blogcards->route, $item->id);
            }elseif(!empty($item->link)){
                $link = $item->link;
            }else{
                $link = '#';
            }

        @endphp

@if (!empty($blogcards->vueAction) && !empty($blogcards->vuejsComponents))
<a href="#" v-on:click="{{$blogcards->vueAction}}('{{$item->id}}')" >
@else
<a href="{{$link}}">
@endif
    <li class="media pb-0 pl-1 pr-2 mb-1 mx-2 border rounded bg-light">
    @php
    if (!empty($item->imageStorage)){
        $image = $item->imageStorage;
    }
    elseif (!empty($item->imagePath)){
        $image = $util->toImage($item->imagePath);
    }
    elseif(!empty($item->image)){
        $image = $util->toImage($item->image);
    }
    @endphp
    @if (in_array('image', $blogcards->showItems) && !empty($image))
    <img src="{{$image}}" class="mr-2 mb-1 mt-1" alt="..." style="border-radius: 10px;width: 80px; height: 80px">
    <div class="media-body pl-1 my-auto">
    @else
    <div class="media-body pl-1 my-auto py-2">
    @endif
    @if (!empty($item->title))
    <div class="pb-0 mb-0 p-0 pt-1 pb-1">
    <div class=" mb-1 text-dark" style="font-size:calc(10px + 1vw);font-family:arial; line-height: 1.1">{{$item->title}}</div>
    @if (!empty($item->abstract))
            @php
                $numChar = strlen($item->title);
                    if ($numChar > 35){
                        if($numChar > 72){
                            $num = 30;
                        }else{
                            $num = 65;
                        }
                    }else{
                        $num = 90;
                    }
                $str = substr("$item->abstract", 0, $num);
            @endphp
    @if($num != 0)
    <p style="line-height: 1.0; font-family:arial;" class="text-dark pb-0 mb-0"><small>{!!$str!!} ...</small></p>
    @endif
    @endif
</div>
@endif
    </div>
    </li>
    </a>
    @endforeach
    </ul>

{{--Bloco de see more ---------------------------}}
@if (!empty($blogcards->seeMore))
<div class="pl-3 pl-lg-4 mt-3 d-block d-sm-none">
    <a href="{{$util->toRoute($blogcards->seeMore)}}" class="btn btn-sm btn-dark m-0">
    <span class="px-2">{{__('See more')}}</span>
    </a>
</div>
{{--pagination--------------------------------------}}
@elseif (!empty($blogcards->paginate))
<div id="default-paginator" class="text-center nav justify-content-center pt-sm-2" aria-label="Page" translator>
{!!$blogcards->paginate->links('components.bootstrap')!!}
</div>
@endif
{{--End Pagination----------------------------------}}
</div>
<!--/div-->
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

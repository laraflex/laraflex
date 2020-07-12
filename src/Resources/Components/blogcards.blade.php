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
<div class="container-xl px-0">
<div class="mx-0 mb-0 mt-1 px-2 px-lg-3 px-xl-0">
    <div class="d-none d-sm-block pb-0 mb-0">
    <div id="headerSection" class="">
        @if (!empty($blogcards->title))
        <div class="blogcards-title text-center pt-2 pb-2" style="font-size:calc(1.1em + 0.6vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">{{$blogcards->title}}</div>
        @endif
        @if (!empty($blogcards->legend))
        <div class="slidebar-shared text-center pb-2" style="font-size:calc(0.78em + 0.29vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
        <span style="color:gray">{{$blogcards->legend}}</span></div>
        @endif
    </div>
    <div class="row p-2">
        {{--Início linha linha ==== --}}
    @php
    if (!empty($blogcards->expanded) && $blogcards->expanded === true){
        $column = 'col-sm-6 col-md-4 col-lg-4';
        $titleFont = 'font-size:calc(0.9em + 0.4vw); line-height:1.2';
        $sharedFont = 'font-size:calc(0.8em + 0.15vw);';
        $fontAbstract = 'font-size:calc(0.82em + 0.15vw);';
    }else{
        $column = 'col-sm-4 col-md-4 col-lg-3';
        $titleFont = 'font-size:calc(0.8em + 0.2vw); line-height:1.2;';
        $sharedFont = 'font-size:calc(0.6em + 0.15vw);letter-spacing: 2px;';
        $fontAbstract = 'font-size:calc(0.68em + 0.15vw);';
    }
    @endphp
    @foreach ($blogcards->items as $item)
    <div class="{{$column}} p-0 pb-2 pb-lg-3">
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
    <img src="{{$util->toImage('images/icons', 'star.png')}}" width="13px" height="12px" class="m-0 mb-1" />
    @endfor
    @if ($item->rating != intval($item->rating))
    <img src="{{$util->toImage('images/icons', 'starsmall.png')}}" width="13px" height="12px" class="m-0 mb-1" />
    @endif
    </div>
    @endif
    {{--Fim de rating --------------------------------------------------------}}
    {{--Button --------------------}}
    @if (!empty($blogcards->route))
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
@if (!empty($blogcards->paginate))
<div id="default-paginator" class="text-center nav justify-content-center pt-sm-2" aria-label="Page" translator>
{!!$blogcards->paginate->links()!!}
</div>
@endif
{{--End Pagination----------------------------------}}
</div>
{{--Icon de retorno ao topo da página--}}
@if (!empty($objetoConfig->onePage) && $objetoConfig->onePage === true)
<div class="w-100 pb-sm-3 pt-sm-0 d-none d-sm-block pl-5 container-xl">
<a href="#top">
<img src="{{$util->toImage('images/icons', 'setadupla.png')}}" width="26" height="26" class="float-left rounded d-block">
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
            if(!empty($blogcards->route)){
                $link = $util->toRoute($blogcards->route, $item->id);
            }elseif(!empty($item->link)){
                $link = $item->link;
            }else{
                $link = '#';
            }

        @endphp
    <a href="{{$link}}">
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
    <h6 class=" mb-1 text-dark" style="font-family:arial; line-height: 1.1">{{$item->title}}</h6>

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

{{--pagination--------------------------------------}}
@if (!empty($blogcards->paginate))
<div id="default-paginator" class="text-center nav justify-content-center pt-sm-2" aria-label="Page" translator>
{!!$blogcards->paginate->links()!!}
</div>
@endif
{{--End Pagination----------------------------------}}


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

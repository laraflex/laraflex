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

<section id="blogcards">
<div class="d-none d-sm-block mb-2">
    <div id="headerSection" class="pt-3 pb-3">
    @if (!empty($blogcards->title))
    <div class="blogcards-title text-center" style="font-size:calc(0.85em + 0.6vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">{{$blogcards->title}}</div>

     @endif
    </div>

    <div class="row p-2">
        {{--Início linha linha ==== --}}
    @foreach ($blogcards->items as $item)
    <div class="col-sm-6 col-md-6 col-lg-4 p-0 ">
    <article class= "mb-4 ml-2 mr-2 {{$border}}">
    <header class="p-3">
    @if (in_array('title', $blogcards->showItems) && !empty($item->title))
    <div class="blogcards-item-title" style="font-size:calc(0.9em + 0.4vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">{{$item->title}}</div>
    @endif
    @if (in_array('author', $blogcards->showItems) && !empty($item->author))
    <div class="blogcards-item-shared pt-1" style="font-size:calc(0.8em + 0.15vw);{{$font_family}}"><strong>{{$item->author}}</strong>
    @if (in_array('date', $blogcards->showItems) && !empty($item->date))
    <span><small>  {{$item->date}}</small></span>
    @endif
    </div>
    @endif

    @if (in_array('image', $blogcards->showItems))
    @if (!empty($item->image))
        @php
        $image = $util->toImage($blogcards->imagePath, $item->image);
        @endphp
    <img class="card-img mt-2 mb-2" src="{{$image}}" alt="" />
    @endif
    @endif
    @if (in_array('abstract', $blogcards->showItems))
    @if (!empty($item->abstract))
            @php
                $numChar = strlen($item->title);
                    if ($numChar < 30){
                        $num1 = 315;
                    }elseif($numChar > 31 && $numChar < 64){
                        $num1 = 280;
                    }else{
                        $num1 = 200;
                    }

                $str1 = substr("$item->abstract", 0, $num1);
            @endphp
    <div class="blogcards-item-shared text-justify mt-2 mb-2" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.17vw);{{$font_family}}">{!!$str1!!}...</div>

    @endif
    @endif
    {{--Button --------------------}}
    @if (!empty($blogcards->route))
        @php
           $link = $util->toRoute($blogcards->route, $item->id);
        @endphp
    <a class="btn btn-sm btn-outline-secondary mt-2" href="{{$link}}" role="button">Leia mais</a>
    @endif
    {{--End button ----------------}}
    </header>
    </article>
    </div>
    @endforeach
    </div>
{{--$paginate--------------------------------------}}
@if (!empty($blogcards->paginate))
<div class="text-center nav justify-content-center">
    {!!$blogcards->paginate->links()!!}
</div>
{{--button read more-------------------------------}}
@elseif (!empty($blogcards->readMore->label) && !empty($blogcards->readMore->route))
<div class="text-center">
        <a class="btn btn-outline-secondary mb-4" href="{{$util->toRoute($blogcards->readMore->route)}}" role="button">{{$blogcards->readMore->label}}</a>
</div>
@endif
</div>

{{--8888888888888888888888888888888888888888888888888888888888--}}


<div class="d-block d-sm-none mb-3 bg-white">
    <div id="headerSection" class="pt-3 pb-2">
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
    <li class="media pt-1 pb-0 pl-1 pr-2 mb-1 {{$border}}">
    @if (!empty($item->image))
    <img src="{{$util->toImage($blogcards->imagePath, $item->image)}}" class="mr-2 rounded mb-1 mt-1" alt="..." style="width: 80px; height: 80px">
    @endif
    <div class="media-body pl-1 my-auto">
    @if (!empty($item->title))
    <div class="pb-0 mb-0 p-0">
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

{{--$paginate--------------------------------------}}
@if (!empty($blogcards->paginate))
<div class="text-center nav justify-content-center">
    {!!$blogcards->paginate->links()!!}
</div>
{{--button read more-------------------------------}}
@elseif (!empty($blogcards->readMore->label) && !empty($blogcards->readMore->route))
<div class="text-center">
    <a class="btn btn-outline-secondary mb-4" href="{{$util->toRoute($blogcards->readMore->route)}}" role="button">{{$blogcards->readMore->label}}</a>
</div>
@endif
</div>


</section>
@else
@if (!empty($blogcards->nullable) && $blogcards->nullable === true)
    <div class="text-center mt-2 mb-2"></div>
@else
    <div class="text-center p-4 mt-3 mb-3 {{$border}}">
    <h5>{{ __('There are no items to display.') }}</h5>
    </div>
@endif
@endif

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

<section id="blogcards">
<div class="d-none d-sm-block mb-2 hiflex">
    <div id="headerSection" class="pt-3 pb-3">
    @if (!empty($blogcards->title))
    <h3 class="d-none d-sm-none d-md-block text-center font-weight-normal">{{$blogcards->title}}</h3>
    <h3 class="d-block d-sm-block d-md-none text-center font-weight-normal">{{$blogcards->title}}</h3>
     @endif
    </div>
    {{-----------------------------------------}}
    @if(!empty($blogcardsMessage))
    <h6 class="pb-3 text-center">{{$blogcardsMessage}}</h6>
    @endif
    @if(!empty($blogcardsAlert))
    @php
    $alertColor = 'alert-primary';
    $color = array('primary', 'secundary', 'success', 'danger', 'warning', 'info', 'light', 'dark');
    if($colorTmp = stristr($blogcardsAlert, ':')){
    $blogcardsAlert =  str_replace($colorTmp, '', $blogcardsAlert);
    $colorTmp = str_replace(':', '', $colorTmp);
    if(in_array($colorTmp, $color)){
        $alertColor = 'alert-' . $colorTmp;
    }
    }
    @endphp
    <div class="alert {{$alertColor}}" role="alert">
    {{$blogcardsAlert}}
    </div>
    @endif
    {{-------------------------------------------}}
    <div class="row p-2">
        {{--Início linha linha ==== --}}
    @foreach ($blogcards->items as $item)
    <div class="col-sm-6 col-md-4 p-0 ">
    <article class= "mb-4 ml-2 mr-2 {{$border}} hiflex">
    <header class="p-3">
    @if (in_array('title', $blogcards->showItems))
    @if (!empty($item->title))
    <h5 class="font-weight-normal">{{$item->title}}</h5>
    @endif
    @endif
    @if (in_array('authorName', $blogcards->showItems))
    @if (!empty($item->authorName))
    <p><strong>{{$item->authorName}}</p></strong>
    @endif
    @endif
    @if (in_array('date', $blogcards->showItems))
    @if (!empty($item->date))
    <div id="time">
    <time datetime="{{$item->date}}"><small>{{$item->date}}</small></time>
    </div>
    @endif
    @endif
    @if (in_array('image', $blogcards->showItems))
    @if (!empty($item->image))
        @php
        $image = $util->toImage($blogcards->imagePath, $item->image);
        @endphp
    <img class="card-img mt-2 mb-2" src="{{$image}}" alt="" />
    @endif
    @endif
    @if (in_array('content', $blogcards->showItems))
    @if (!empty($item->content))
            @php
                $numerChar = strlen($item->title);
                    if($numerChar > 30){
                        $num1 = 280;
                        $num2 = 105;
                    }else{
                        $num1 = 315;
                        $num2 = 120;
                    }
                $str1 = substr("$item->content", 0, $num1);
                $str2 = substr("$item->content", 0, $num2);
            @endphp
    <p class="d-none d-sm-none d-md-block text-justify mt-2 mb-2">{{$str1}}...</p>
    {{-- controle de apresentação para mobile--}}
    <p class="d-block d-sm-block d-md-none text-justify mt-2 mb-2">{{$str2}}...</p>
    @endif
    @endif
    @if (!empty($blogcards->route))
        @php
           $link = $util->toRoute($blogcards->route, $item->id);
        @endphp
    <a class="btn btn-sm btn-outline-secondary mt-2" href="{{$link}}" role="button">Leia mais</a>
    @endif
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
        <h4 class="text-center font-weight-normal">{{$blogcards->title}}</h4>
    </div>
    {{-----------------------------------------}}
    @if(!empty($blogcardsMessage))
    <h6 class="pb-2 text-center">{{$blogcardsMessage}}</h6>
    @endif
    @if(!empty($blogcardsAlert))
    @php
    $alertColor = 'alert-primary';
    $color = array('primary', 'secundary', 'success', 'danger', 'warning', 'info', 'light', 'dark');
    if($colorTmp = stristr($blogcardsAlert, ':')){
    $blogcardsAlert =  str_replace($colorTmp, '', $blogcardsAlert);
    $colorTmp = str_replace(':', '', $colorTmp);
    if(in_array($colorTmp, $color)){
        $alertColor = 'alert-' . $colorTmp;
    }
    }
    @endphp
    <div class="alert {{$alertColor}}" role="alert">
    {{$blogcardsAlert}}
    </div>
    @endif
    {{-------------------------------------------}}
    <ul class="list-unstyled hiflex">
    @foreach ($blogcards->items as $key => $item)
        @php
            if(!empty($blogcards->route)){
                $link = $util->toRoute($blogcards->route, $item->id);
            }else{
                $link = '#';
            }

        @endphp
    <a href="{{$link}}">
    <li class="media pt-1 pb-1 pl-1 pr-2 mb-1 {{$border}}">
    @if (!empty($item->image))
    <img src="{{$util->toImage($blogcards->imagePath, $item->image)}}" class="mr-2 align-self-centerx rounded" alt="..." style="width: 80px; height: 80px">
    @endif
    <div class="media-body stretched-link">
    @if (!empty($item->title))
    <div style="line-height: 1.1" class="pt-1 mb-0">
    <h5 class="pn-3 mb-1 text-dark" ><strong>{{$item->title}}</strong></h5>

    </div>
    @endif
    @if (!empty($item->content))
            @php
                $numerChar = strlen($item->title);
                    if ($numerChar > 35){
                        $num = 45;
                    }else{
                        $num = 65;
                    }
                $str = substr("$item->content", 0, $num);
            @endphp
    <p style="line-height: 1.0" class="text-dark"><small>{{$str}} ...</small></p>
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
<div class="text-center p-4 mt-3 mb-3 {{$border}}">
<h5>{{ __('There are no items to display.') }}</h5>
</div>
@endif


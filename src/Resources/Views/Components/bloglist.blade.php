
@if(!empty($objeto))
    @php
        $bloglist = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $bloglist = $object;
    @endphp
@endif

@if (!empty($bloglist) && !empty($bloglist->items))

<section id="bloglist">
<div id="bloglist" class="d-none d-sm-block">
    <div class="mt-4 mb-0 pr-0 pl-0 pt-1 pb-2 hiflex">
    <div id="headerSection" class="pb-3">
    @if (!empty($bloglist->title))
    <h3 class="d-none d-sm-none d-md-block text-center font-weight-normal">{{$bloglist->title}}</h3>
    <h3 class="d-block d-sm-block d-md-none text-center font-weight-normal">{{$bloglist->title}}</h3>
    @endif
    </div>
    {{---------------------------------------------}}
    @if(!empty($bloglistMessage))
    <h6 class="pb-3 text-center">{{$bloglistMessage}}</h6>
    @endif
    @if(!empty($bloglistAlert))
    @php
    $alertColor = 'alert-primary';
    $color = array('primary', 'secundary', 'success', 'danger', 'warning', 'info', 'light', 'dark');
    if($colorTmp = stristr($bloglistAlert, ':')){
    $bloglistAlert =  str_replace($colorTmp, '', $bloglistAlert);
    $colorTmp = str_replace(':', '', $colorTmp);
    if(in_array($colorTmp, $color)){
        $alertColor = 'alert-' . $colorTmp;
    }
    }
    @endphp
    <div class="alert {{$alertColor}}" role="alert">
    {{$bloglistAlert}}
    </div>
    @endif
    {{-----------------------------------------------}}
    <div class="{{$border}} pt-3 pb-3 mb-3">
    @foreach ($bloglist->items as $item)
    <div class="row w-100 p-3 mb-3 ml-0 hiflex">
    @if (in_array('image', $bloglist->showItems) && !empty($item->image))
    <div class="col-sm-5 col-md-4 pl-2">
    <img src="{{$util->toImage($bloglist->imagePath, $item->image)}}" class="mt-2 mb-2" alt="..." style="width:100%;" id="imageBox">
    </div>
    <div class="col-sm-7 col-md-8 pl-3 pr-3">
    @else
    <div class="pr-3 pl-3">
    @endif
    @if (in_array('title', $bloglist->showItems) && !empty($item->title))
    <h4 class="d-none d-lg-block font-weight-normal pt-2">{{$item->title}}</h4>
    <h4 class="d-block d-lg-none font-weight-normal pt-2">{{$item->title}}</h4>
    @endif
    @if (in_array('subTitle', $bloglist->showItems) && !empty($item->subTitle))
    <h6 class="d-none d-md-block ">{{$item->subtitle}}</h6>
    @endif
    @if (in_array('categoryName', $bloglist->showItems) && !empty($item->icategoryName))
    <p class="d-none d-md-block"><strong>{{$item->categoryName}}</strong></p>
    @endif
    @if (in_array('authorName', $bloglist->showItems) && !empty($item->authorName))
    <p class="d-none d-md-block card-text">{{$item->authorName}}</p>
    @endif
    @if (in_array('date', $bloglist->showItems)&& !empty($item->date))
    <div class="card-text"><small class="text-muted">{{$item->date}}</small></div>
    @endif
    {{--Bloco de conteúdo -----------------------------------------------}}
    @if (in_array('content', $bloglist->showItems) && !empty($item->content))
    <p class="d-none d-xl-block text-justify">@php echo substr($item->content, 0, 430) @endphp...</p>
    <p class="d-none d-lg-block d-xl-none text-justify">@php echo substr($item->content, 0, 300) @endphp...</p>
    <p class="d-none d-md-block d-lg-none text-justify">@php echo substr($item->content, 0, 180) @endphp...</p>
    {{-- controle de apresentação para mobile--}}
    <p class="d-block d-md-none text-justify" style="line-height: 1.1";><small class="text-muted">
    @php echo substr($item->content, 0, 150) @endphp...
    </small></p>
    @endif
        @php
        $link = $util->toRoute($bloglist->route, $item->id);
        @endphp
    <a class="btn btn-sm btn-outline-secondary" href="{{$link}}" role="button">{{__('Read more')}}</a>
    </div>
    </div>
    @endforeach
    </div>
    {{--$paginate--------------------------------------}}
    @if (!empty($bloglist->paginate))
    <div class="text-center nav justify-content-center pt-2">
         {!!$bloglist->paginate->links()!!}
    @endif
    </div>
    </div>
</div>
</div>
{{--8888888888888888888888888888888888888888888888888988888888888--}}

<div class="d-block d-sm-none mb-3 bg-white">
    <div class="hiflex pr-3 pl-3 pt-0">
    <div id="headerSection" class="pt-3 pb-2">
    <h4 class="text-center font-weight-normal">{{$bloglist->title}}</h4>
    </div>
    {{---------------------------------------------}}
    @if(!empty($bloglistMessage))
    <h6 class="pb-2 text-center">{{$bloglistMessage}}</h6>
    @endif
    @if(!empty($bloglistAlert))
    @php
    $alertColor = 'alert-primary';
    $color = array('primary', 'secundary', 'success', 'danger', 'warning', 'info', 'light', 'dark');
    if($colorTmp = stristr($bloglistAlert, ':')){
    $bloglistAlert =  str_replace($colorTmp, '', $bloglistAlert);
    $colorTmp = str_replace(':', '', $colorTmp);
    if(in_array($colorTmp, $color)){
        $alertColor = 'alert-' . $colorTmp;
    }
    }
    @endphp
    <div class="alert {{$alertColor}}" role="alert">
    {{$bloglistAlert}}
    </div>
    @endif
    {{-----------------------------------------------}}
    <ul class="list-unstyled hiflex">
    @foreach ($bloglist->items as $key => $item)
    <a href="{{$util->toRoute($bloglist->route, $item->id)}}">
    <li class="media pt-1 pb-1 pl-1 pr-2 mb-1 {{$border}}">
    @if (!empty($item->image))
    <img src="{{$util->toImage($bloglist->imagePath, $item->image)}}" class="mr-2 align-self-centerx rounded" alt="..." style="width: 80px; height: 80px">

    @endif
    <div class="media-body">
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
    @if (!empty($bloglist->paginate))
    <div class="text-center nav justify-content-center pt-2">
         {!!$bloglist->paginate->links()!!}
    @endif
    </div>
    </div>
</div>
</section>
@else
    <div class="text-center p-4 mt-3 mb-3 {{$border}}">
    <h5>{{ __('There are no items to display.') }}</h5>
    </div>
@endif


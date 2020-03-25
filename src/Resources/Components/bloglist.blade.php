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
    @if (in_array('categoryName', $bloglist->showItems) && !empty($item->categoryName))
    <p class="d-none d-md-block"><strong>{{$item->categoryName}}</strong></p>
    @endif
    @if (in_array('authorName', $bloglist->showItems) && !empty($item->authorName))
    <p class="d-none d-md-block card-text">{{$item->authorName}}</p>
    @endif
    @if (in_array('date', $bloglist->showItems)&& !empty($item->date))
    <div class="card-text"><small class="text-muted">{{$item->date}}</small></div>
    @endif
    {{--Bloco de conteúdo -----------------------------------------------}}
    @if (in_array('abstract', $bloglist->showItems) && !empty($item->abstract))
    <p class="d-none d-xl-block text-justify">{{substr($item->abstract, 0, 430)}}...</p>
    <p class="d-none d-lg-block d-xl-none text-justify">{{substr($item->abstract, 0, 300)}}...</p>
    <p class="d-none d-md-block d-lg-none text-justify">{{substr($item->abstract, 0, 180)}}...</p>
    {{-- controle de apresentação para mobile--}}
    <p class="d-block d-md-none text-justify" style="line-height: 1.1";><small class="text-muted">
    {{substr($item->abstract, 0, 150)}}...
    </small></p>
    @endif
    {{--Button------------------------------------}}
    @if(!empty($bloglist->route))
        @php
        $link = $util->toRoute($bloglist->route, $item->id);
        @endphp
    <a class="btn btn-sm btn-outline-secondary" href="{{$link}}" role="button">{{__('Read more')}}</a>
    @endif
    {{--End button------------------------------------}}
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
{{--8888888888888888888888888888888888888888888888888988888888888--}}

<div class="d-block d-sm-none mb-3 bg-white">
    <div id="headerSection" class="pt-3 pb-2">
        <h4 class="text-center font-weight-normal">{{$bloglist->title}}</h4>
    </div>
    
    <ul class="list-unstyled hiflex">
    @foreach ($bloglist->items as $key => $item)
        @php
            if(!empty($bloglist->route)){
                $link = $util->toRoute($bloglist->route, $item->id);
            }elseif(!empty($item->link)){
                $link = $item->link;
            }else{
                $link = '#';
            }

        @endphp
    <a href="{{$link}}">
    <li class="media pt-1 pb-0 pl-1 pr-2 mb-1 {{$border}}">
    @if (!empty($item->image))
    <img src="{{$util->toImage($bloglist->imagePath, $item->image)}}" class="mr-2 align-self-centerx rounded mb-1 mt-1" alt="..." style="width: 80px; height: 80px">
    @endif
    <div class="media-body pl-1">
    @if (!empty($item->title))
    <div style="line-height: 1.1" class="pt-1 mb-0">
    <h5 class="pn-3 mb-1 text-dark" ><strong>{{$item->title}}</strong></h5>

    </div>
    @endif
    @if (!empty($item->abstract))
            @php
                $numChar = strlen($item->title);
                    if ($numChar > 35){
                        if($numChar > 72){
                            $num = 0;
                        }else{
                            $num = 40;
                        }
                    }else{
                        $num = 60;
                    }
                $str = substr("$item->abstract", 0, $num);
            @endphp
    @if($num != 0)
    <p style="line-height: 1.0" class="text-dark"><smallx>{{$str}} ...</smallx></p>
    @endif
    @endif
    </div>
    </li>
    </a>
    @endforeach
    </ul>

{{--$paginate--------------------------------------}}
@if (!empty($bloglist->paginate))
<div class="text-center nav justify-content-center">
    {!!$bloglist->paginate->links()!!}
</div>
{{--button read more-------------------------------}}
@elseif (!empty($bloglist->readMore->label) && !empty($bloglist->readMore->route))
<div class="text-center">
    <a class="btn btn-outline-secondary mb-4" href="{{$util->toRoute($bloglist->readMore->route)}}" role="button">{{$bloglist->readMore->label}}</a>
</div>
@endif
</div>


</section>
@else
    <div class="text-center p-4 mt-3 mb-3 {{$border}}">
    <h5>{{ __('There are no items to display.') }}</h5>
    </div>
@endif

{{--27-02-2020--}}

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
    @php
        if (!empty($bloglist->fontFamily->title)){
            $font_family_title = 'font-family:'.$bloglist->fontFamily->title;
        }else{
            $font_family_title = '';
        }
        if (!empty($bloglist->fontFamily->shared)){
            $font_family = 'font-family:'.$bloglist->fontFamily->shared;
        }else{
            $font_family = '';
        }

        $num_char = 242;
        
    @endphp

<section id="bloglist" class="pb-1 pt-3 pt-md-4">
<div class="container-xl px-0">
<div class="mx-0 mb-0 mt-1 px-2 px-md-3 px-xl-0">

<div id="bloglist" class="d-none d-sm-block">
    <div class="mt-0 mb-0 pr-0 pl-0">
    <div id="headerSection" class="pb-0">


        @if (!empty($bloglist->seeMore))
        <div class="row m-0 p-0">
            <div class="col-12 col-sm-9 p-0">
                @if(!empty($bloglist->title))
                <div class="bloglist-title text-left pt-3 pb-2 pl-3" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
                {{$bloglist->title}}</div>
                @if (!empty($bloglist->legend))
                    <div class="bloglist-shared text-left pb-3 pl-3" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
                    <span>{{$bloglist->legend}}</span></div>
                @endif
                @endif
            </div>
            <div class="col-0 col-sm-3 text-right p-0 pr-2 d-none d-sm-block align-text-bottomx" style="width: 100%;">
                @if(!empty($bloglist->legend) && !empty($bloglist->title))
                <div class="py-2 mb-sm-1 py-xl-2"></div>
                <div class="pt-1 pt-md-2 pt-lg-3 pr-3 pr-lg-4 align-text-bottom" style="height: 100%;">
                <a href="{{$util->toRoute($bloglist->seeMore)}}" class="btn btn-dark m-0">
                {{__('See more')}}
                </a>
                </div>
                @else
                <div class="pb-sm-3 pt-1 pt-md-2 pt-lg-3 pr-3 pr-lg-4 align-text-bottom" style="height: 100%;">
                <a href="{{$util->toRoute($bloglist->seeMore)}}" class="btn btn-dark m-0">
                {{__('See more')}}
                </a>
                </div>
                @endif
            </div>
        </div>
        @else
            @if(!empty($bloglist->title))
            <div class="bloglist-title text-center pt-3 pb-2" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
            {{$bloglist->title}}</div>
            @if (!empty($bloglist->legend))
                <div class="bloglist-shared text-center pb-3" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
                <span>{{$bloglist->legend}}</span></div>
            @else
                <div class="pt-2"></div>
            @endif
            @endif
        @endif
    {{--
    @if (!empty($bloglist->title))
    <div class="bloglist-title text-center pt-2 pb-3" style="font-size:calc(1.1em + 0.6vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
    {{$bloglist->title}}</div>
    @endif
      @if (!empty($bloglist->legend))
    <div class="slidebar-shared text-center pb-1 pb-md-2 pl-2" style="font-size:calc(0.78em + 0.29vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
    <span style="color:gray">{{$bloglist->legend}}</span></div>
    @endif
    </div>
    --}}



    <div class="{{$border}} pt-3 pt-lg-4 pb-3 mb-3 mt-2">

    @foreach ($bloglist->items as $key => $item)
    @php 
    if (!empty($bloglist->seeMore) && $key == 2){
        break;
    }
    @endphp

    <div class="row w-100 p-3 p-md-3 px-md-4 px-lg-5  mb-3 ml-0">

    {{--Colunas de painel----}}
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

    
    if ($key % 2 == 0){
        $side = 'left';
        $padding = 'pl-3 pl-lg-4 pl-xl-5 pr-0';
    }else{
        $side = 'right';
        $padding = 'pr-3 pr-lg-4 pr-xl-5 pl-0';
    }

    @endphp

    @if (in_array('image', $bloglist->showItems) && !empty($image))
    
    @if ($side == 'left')
    <div class="col-sm-4 col-md-5 m-0 p-0" style="min-height:calc(50px + 10vw);">
    <img src="{{$image}}" class="" style="width:100%;">
    </div>
    @endif

    <div class="col-sm-8 col-md-7 p-0">
    <div class="{{$padding}}" style="margin: 0; position: absolute; top: 50%; transform: translatey(-50%)">
    @else
    @php
        $num_char = 1000;
    @endphp
    <div class=" col-12 pl-0 pl-md-2 pr-0 ">
    <div>
    @endif
    @if (in_array('title', $bloglist->showItems) && !empty($item->title))
    <div class="bloglist-item-title pt-0 mb-2 d-sm-none d-md-block" style="font-size:calc(11px + 1vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
    {{$item->title}}</div>

    <div class="bloglist-item-title pt-0 mb-2 d-sm-block d-md-none" style="font-size:calc(11px + 1vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
    <a href="{{$util->toRoute($bloglist->route, $item->id)}}">
    {{$item->title}}
    </a>
    </div>

    @endif

    @if (in_array('author', $bloglist->showItems) && !empty($item->author))

    <div class="bloglist-item-shared d-none d-lg-block pb-1"><span card-text" style="font-size:calc(0.8em + 0.15vw);{{$font_family}}"><b>{{ucfirst($item->author->name)}}</b></span>
        @if (in_array('date', $bloglist->showItems)&& !empty($item->date))
        <span class="card-text ml-2" style="font-size:calc(0.59em + 0.12vw);{{$font_family}}">{{$item->date}}</span>
        @endif
    </div>
    @else
    <div class="p-2 d-none d-lg-block"></div>
    @endif
    {{--Bloco de conteúdo -----------------------------------------------}}
    @if (in_array('abstract', $bloglist->showItems) && !empty($item->abstract))
    <p class="bloglist-item-shared d-none d-sm-block text-justify" style="line-height:calc(0.8em + 0.8vw); font-size:calc(0.86em + 0.17vw);{{$font_family}}">
    @if (strlen($item->abstract) > $num_char)
    {!!substr($item->abstract, 0, $num_char)!!}...</p>
    @else
    {!!$item->abstract!!}</p>
    @endif
    @endif
    {{--Button------------------------------------}}
    @if(!empty($bloglist->route))
        @php
        $link = $util->toRoute($bloglist->route, $item->id);
           if (!empty($bloglist->target) && $bloglist->target == 'blank'){
               $target = 'target="_blank"';
           }else{
               $target = '';
           }
        @endphp
    {{----}}
    <div class="d-none d-md-block">
    @if (!empty($bloglist->button))
        <a class="btn btn-sm btn-outline-secondary" href="{{$link}}" role="button" rel="noopener noreferrer" {!!$target!!}>{{$bloglist->button}}</a>
    @else
        <a class="btn btn-sm btn-outline-secondary" href="{{$link}}" role="button" rel="noopener noreferrer" {!!$target!!}>{{__('Read more')}}</a>
    @endif
    </div>
    {{----}}
    @endif
    {{--End button------------------------------------}}
    </div>
    </div>

    @if (in_array('image', $bloglist->showItems) && !empty($image))
    
    @if ($side == 'right')
    <div class="col-sm-4 col-md-5 m-0 p-0" style="min-height:calc(50px + 10vw);">
    <img src="{{$image}}" class="" style="width:100%;">
    </div>
    @endif
    @endif


    </div>
    @endforeach




    </div>
    {{--seeMOre and pagination--------------------------------------}}
    @if (!empty($bloglist->seeMore))

    @elseif (!empty($bloglist->paginate))
    <div id="default-paginator" class="text-center nav justify-content-center pt-sm-2" aria-label="Page" translator>
    {!!$bloglist->paginate->links()!!}
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
{{--8888888888888888888888888888888888888888888888888988888888888--}}

<div class="d-block d-sm-none mb-3 bg-white">
    <div id="headerSection" class="pt-0 pb-2">
        <h6 class="text-center font-weight-normal">{{$bloglist->title}}</h6>
    </div>
    <ul class="list-unstyled">
    @foreach ($bloglist->items as $key => $item)
        @php
            if (!empty($bloglist->seeMore) && $key == 4){
            break;
            }
            if(!empty($bloglist->route)){
                $link = $util->toRoute($bloglist->route, $item->id);
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
    @if (in_array('image', $bloglist->showItems) && !empty($image))
    <img src="{{$image}}" class="mr-2 mb-1 mt-1" alt="..." style="border-radius: 10px; width: 80px; height: 80px">
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
{{--pagination--------------------------------------}}
{{--Bloco de see more ---------------------------}}
@if (!empty($bloglist->seeMore))
<div class="pl-3 pl-lg-4 mt-3 d-block d-sm-none">
    <a href="{{$util->toRoute($bloglist->seeMore)}}" class="btn btn-sm btn-dark m-0">
    <span class="px-2">{{__('See more')}}</span>
    </a>
</div>
@elseif (!empty($bloglist->paginate))
<div id="default-paginator" class="text-center nav justify-content-center pt-sm-2" aria-label="Page" translator>
{!!$bloglist->paginate->links()!!}
</div>
@endif
{{--End Pagination----------------------------------}}
</div>
</section>
@else
@if (!empty($bloglist->nullable) && $bloglist->nullable === true)
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



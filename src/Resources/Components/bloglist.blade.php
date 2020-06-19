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
    @if (!empty($bloglist->title))
    <div class="bloglist-title text-center pt-2 pb-3" style="font-size:calc(1.1em + 0.6vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
    {{$bloglist->title}}</div>
    @endif
      @if (!empty($bloglist->legend))
    <div class="slidebar-shared text-center pb-1 pb-md-2 pl-2" style="font-size:calc(0.78em + 0.29vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
    <span style="color:gray">{{$bloglist->legend}}</span></div>
    @endif
    </div>
    <div class="{{$border}} pt-3 pt-lg-4 pb-3 mb-3 mt-2">
    @foreach ($bloglist->items as $item)

    <div class="row w-100 p-3 p-md-3 px-md-4 px-lg-5  mb-3 ml-0">
    @if (in_array('image', $bloglist->showItems) && !empty($item->image))
    {{--Colunas de painel----}}
    @php
    if (!empty($bloglist->imagePath) && !empty($item->image)){
        $image = $util->toImage($bloglist->imagePath, $item->image);
    }elseif(!empty($item->image)){
        $image = $util->toImage($item->image);
    }
    @endphp



    <div class="col-sm-4 col-md-5 m-0 p-0">
    <img src="{{$image}}" class="image-fluidx mx-auto d-block" style="width:100%;">
    </div>
    <div class="col-sm-8 col-md-7 pl-3 pl-lg-4 pl-xl-5 pr-0">
    <div class="" style="margin: 0; position: absolute; top: 50%; transform: translate(0, -50%)">
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

    <div class="bloglist-item-shared d-none d-lg-block pb-1"><span card-text" style="font-size:calc(0.8em + 0.15vw);{{$font_family}}"><b>{{$item->author}}</b></span>
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
    </div>
    @endforeach
    </div>
    {{--pagination--------------------------------------}}
    @if (!empty($bloglist->paginate))
    <div id="default-paginator" class="text-center nav justify-content-center pt-sm-2" aria-label="Page" translator>
    {!!$bloglist->paginate->links()!!}
    </div>
    @endif
    {{--End Pagination----------------------------------}}

    </div>
</div>
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

<div class="d-block d-sm-none mb-3 bg-white pr-1">
    @php
    $nullImage = false;
    @endphp
    <div id="headerSection" class="pt-3 pb-2">
        <h6 class="text-center font-weight-normal">{{$bloglist->title}}</h6>
    </div>
    <ul class="list-unstyled">
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
    <a href="{{$link}}" rel="noopener noreferrer">
    <li class="media pb-0 pl-1 pr-2 mb-1 mx-2 border rounded" style="background-color: #F2F2F2;">
    @if (in_array('image', $bloglist->showItems) && !empty($item->image))

    @php
    if (!empty($bloglist->imagePath) && !empty($item->image)){
        $image = $util->toImage($bloglist->imagePath, $item->image);
    }elseif(!empty($item->image)){
        $image = $util->toImage($item->image);
    }
    @endphp

    <img src="{{$image}}" class="mr-2 mb-1 mt-1" alt="..." style="border-radius: 10px; width: 76px; height: 76px">
    <div class="media-body pl-1 my-auto">
    @else
    @php
    $nullImage = true;
    @endphp
    <div class="media-body pl-1 my-auto ">
    @endif

    @if (!empty($item->title))
    <div  class="mb-0 p-0 pt-1 pb-1">
    <h6 class="mb-1 text-dark" style="line-height: 1.1">{{$item->title}}</h6>

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
                    if ($nullImage === true){
                        $num = 150;
                    }
                $str = substr("$item->abstract", 0, $num);
            @endphp
    @if($num != 0)
    <div style="line-height: 1.0" class="text-dark"><small>{!!$str!!} ...</small></dv>
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
@if (!empty($bloglist->paginate))
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

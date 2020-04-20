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
    @endphp

<section id="bloglist">
<div id="bloglist" class="d-none d-sm-block">
    <div class="mt-4 mb-0 pr-0 pl-0 pt-1 pb-2">
    <div id="headerSection" class="pb-3">
    @if (!empty($bloglist->title))
    <div class="bloglist-title text-center" style="font-size:calc(0.85em + 0.6vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">{{$bloglist->title}}</div>

    @endif
    </div>

    <div class="{{$border}} pt-3 pt-xl-4 pb-3 mb-3">
    @foreach ($bloglist->items as $item)
    <div class="row w-100 p-3 pl-lg-4 pr-lg-4 pl-xl-5 pr-xl-5 mb-3 ml-0 ">
    @if (in_array('image', $bloglist->showItems) && !empty($item->image))
    <div class="col-4 colx-lg-5 ml-0" style="background-image: url('{{$util->toImage($bloglist->imagePath, $item->image)}}');background-size:cover">

    </div>
    <div class="col-8 colx-lg-7 pl-3 pr-0 pl-lg-4 pl-xl-5">
    @else
    <div class="pl-3 pr-0 ">
    @endif

    @if (in_array('title', $bloglist->showItems) && !empty($item->title))
    <div class="bloglist-item-title pt-0 mb-2" style="font-size:calc(0.9em + 0.6vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
    {{$item->title}}</div>

    @endif
    @php
        $num_char = 400;
    @endphp

    @if (in_array('author', $bloglist->showItems) && !empty($item->author))
    @php
        $num_char = 274;
    @endphp
    <div class="bloglist-item-shared card-text" style="font-size:calc(0.8em + 0.15vw);{{$font_family}}"><b>{{$item->author}}</b>
        @if (in_array('date', $bloglist->showItems)&& !empty($item->date))
        <span class="card-text" style="font-size:calc(0.59em + 0.12vw);{{$font_family}}">{{$item->date}}</span>
    @endif
    </div>
    @endif

    {{--Bloco de conteúdo -----------------------------------------------}}
    @if (in_array('abstract', $bloglist->showItems) && !empty($item->abstract))
    <p class="bloglist-item-shared d-none d-sm-block text-justify" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.17vw);{{$font_family}}">
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
        @endphp
    {{----}}
    @if (!empty($bloglist->button))
        <a class="btn btn-sm btn-outline-secondary" href="{{$link}}" role="button">{{$bloglist->button}}</a>
    @else
    <a class="btn btn-sm btn-outline-secondary" href="{{$link}}" role="button">{{__('Read more')}}</a>
    @endif
    {{----}}

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
    <a href="{{$link}}">
    <li class="media pt-1 pb-0 pl-1 pr-2 mb-1 {{$border}}">
    @if (!empty($item->image))
    <img src="{{$util->toImage($bloglist->imagePath, $item->image)}}" class="mr-2 ml-1 align-self-centerx rounded mb-1 mt-2" alt="..." style="width: 76px; height: 76px">
    @endif
    <div class="media-body pl-1 my-auto">
    @if (!empty($item->title))
    <div  class="mb-0 p-0 ">
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
                $str = substr("$item->abstract", 0, $num);
            @endphp
    @if($num != 0)
    <p style="line-height: 1.0" class="text-dark pb-0 mb-0"><small>{!!$str!!} ...</small></p>
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
@if (!empty($bloglist->nullable) && $bloglist->nullable === true)
<div class="text-center mt-2 mb-2"></div>
@else
<div class="text-center p-4 mt-3 mb-3 {{$border}}">
<h5>{{ __('There are no items to display.') }}</h5>
</div>
@endif
@endif

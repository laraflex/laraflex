@props(['util', 'showItems','seeMore', 'items', 'num_char', 'route', 'font_family', 'font_family_title'])
@foreach ($items as $key => $item)
@php
    $num_char = 242;
    /*
    if (!empty($item->id)){
        $id = $item->id;
    }else{
        $id = '';
    }
        */
    if (!empty($seeMore) && $key == 4){
        break;
    }
    $id = NULL;
    if ($key % 2 == 0){
        $side = 'left';
        $padding = 'pl-3 pl-lg-4 pl-xl-5 pr-0';
    }else{
        $side = 'right';
        $padding = 'pr-3 pr-lg-4 pr-xl-5 pl-0';
    }
    if (!empty($item->imageStorage)){
        $image = $item->imageStorage;
    }
    elseif (!empty($item->imagePath)){
        $image = $util->toImage($item->imagePath);
    }
    elseif(!empty($item->image)){
        $image = $util->toImage($item->image);
    }
    if (!empty($item->title)){
        $title = $item->title;
    }else{
        $title = NULL;
    }

    if (!empty($item->author)){
        $author = $item->author;
    }else{
        $author = NULL;
    }
    if (!empty($item->date)){
        $date = $item->date;
    }else{
        $date = NULL;
    }
    if (!empty($item->author->name)){
        $authorName = ucwords($item->author->name);
    }else{
        $authorName = '';
    }
    if (!empty($item->abstract)){
        $abstract = $item->abstract;
    }else{
        $abstract = NULL;
    }
    if (!empty($route)){
        $routeItem = $util->toRoute($route, $item->id);
    }else{
        $routeItem = NULL;
    }
@endphp

<div class="row w-100 p-0 m-0 pl-2 pr-2 p-sm-3 p-md-3 px-md-4 px-lg-5  mb-sm-3 ml-0">
{{--Colunas de painel----}}
@if (in_array('image', $showItems) && !empty($image))

@if ($side == 'left')
<div class="col-4 col-md-5 m-0 p-0" style="min-height:calc(50px + 10vw);">
{{--<div class="col-sm-4 col-md-5 m-0 p-0" style="min-height:calc(50px + 10vw);">--}}
<a href="{{$routeItem}}">
<img src="{{$image}}" class="mt-0 d-none d-sm-block rounded" style="width:100%;">
<img src="{{$image}}" class="mt-2 d-block d-sm-none rounded img-thumbnail" style="width:100%;">
</a>
</div>
@endif
<div class="col-8 col-md-7 p-0">
{{--<div class="col-sm-8 col-md-7 p-0">--}}
<div class="{{$padding}}" style="margin: 0; position: absolute; top: 50%; transform: translatey(-50%)">
@else
@php
    $num_char = 1000;
@endphp
<div class=" col-12 p-0 m-0 pl-0 pl-md-2 pr-0 ">
<div>
@endif
@if (in_array('title', $showItems) && !empty($title))
<div class="bloglist-item-title pt-0 mb-2 d-none d-sm-block" style="font-size:calc(11px + 1vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
{{$title}}</div>

<div class="bloglist-item-title pt-0 mb-0 d-block d-sm-none" style="font-size:calc(9px + 1vw);line-height:calc(14px + 1.0vw);{{$font_family_title}}">
<a href="{{$routeItem}}" style="color:black;">
{{$title}}
</a>
</div>
@endif
@if (in_array('author', $showItems) && !empty($author))
<div class="bloglist-item-shared d-none d-lg-block pb-1"><span card-text" style="font-size:calc(0.8em + 0.15vw);{{$font_family}}"><b>{{ucfirst($authorName)}}</b></span>
@if (in_array('date', $showItems)&& !empty($date))
<span class="card-text ml-2" style="font-size:calc(0.59em + 0.12vw);{{$font_family}}">{{$date}}</span>
@endif
</div>
@else
<div class="p-2 d-none d-lg-block"></div>
@endif
{{--Bloco de conteúdo -----------------------------------------------}}
@if (in_array('abstract', $showItems) && !empty($abstract))
<p class="bloglist-item-shared d-none d-sm-block text-justify" style="line-height:calc(0.8em + 0.8vw); font-size:calc(0.86em + 0.17vw);{{$font_family}}">
@if (strlen($abstract) > $num_char)
@php
    $abstract = substr($abstract, 0, $num_char);
@endphp
{!!$abstract!!}...</p>
@else
{{$abstract}}</p>
@endif
<div class="bloglist-item-shared d-block d-sm-none text-justify" style="line-height:calc(0.8em + 0.8vw); font-size:calc(0.86em + 0.17vw);{{$font_family}}">
    @php
    $abstract = substr($abstract, 0, 100);
@endphp
<small>{!!$abstract!!} ...</small></div>

@endif

{{--ROUTE DE COMPONENTE BLADE ------------------------------------}}
@if (!empty($routeItem))

{{--<div class="d-block d-md-block">--}}
<div class="d-none d-md-block">
    <a class="btn btn-sm btn-outline-secondary" href="{{$routeItem}}" role="button" rel="noopener noreferrer">{{__('Read more')}}</a>
</div>
@endif
{{--End button------------------------------------}}
</div>
</div>
@if (in_array('image', $showItems) && !empty($image))
@if ($side == 'right')
<div class="col-4 col-md-5 m-0 p-0" style="min-height:calc(50px + 10vw);">
{{--<div class="col-sm-4 col-md-5 m-0 p-0" style="min-height:calc(50px + 10vw);">--}}
<a href="{{$routeItem}}">
<img src="{{$image}}" class="mt-0 d-none d-sm-block rounded" style="width:100%;">
<img src="{{$image}}" class="mt-1 d-block d-sm-none rounded img-thumbnail" style="width:100%;">
</a>
</div>
@endif
@endif

</div>
<hr />
@endforeach

@props(['util','item','showItems','bgEffect','route','page','pageNumber'])
@if (in_array('image', $showItems))
@php
    if (!empty($item->imageStorage)){
        $image = $item->imageStorage;
    }elseif (!empty($item->imagePath)){
        $image = $util->toImage($item->imagePath);
    }elseif(!empty($item->image)){
        $image = $util->toImage($item->image);
    }else{
        $image = $util->toImage('local/images/app/foto02.jpg');
    }
    if (!empty($route)){
        if (!empty($page) && $page == true){
            $route = $util->toRoute($route, $item->id).'?page='.$pageNumber;
        }else{
            $route = $util->toRoute($route, $item->id);

    }
}

@endphp
@if (!empty($bgEffect) && $bgEffect === true)
<div class="groupcards-panel text-center rounded mb-0" style="min-height: calc(110px + 6vw);">
@else
<div class="text-center mb-0" style="min-height: calc(60px + 12vw) height:100%;">
@endif
@if(!empty($route))
<a href="{{$route}}" class="" >
@else
<a href="#">
@endif
<img src="{{$image}}" class="img-fluid mx-auto " alt="...">
</a>
</div>
@endif


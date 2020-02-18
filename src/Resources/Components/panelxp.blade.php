@if(!empty($objeto))
    @php
        $panel = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $panel = $object;
    @endphp
@endif

@if (!empty($panel))
@php
        $stylePanel = $border;
@endphp
<section id="panel">
<div class="mt-4 mb-4 hiflex">
    @if(!empty($panel->title))
    <h3 class="d-none d-sm-block mt-1 font-weight-normal text-center pt-2 pb-3">{{$panel->title}}</h3>
    <h4 class="d-block d-sm-none mt-1 font-weight-normal text-center pt-2 pb-2">{{$panel->title}}</h4>
    @endif

    @if(!empty($panel->bgColor))
    <div class="row w-100 p-0 m-0 pt-0 pb-2 {{$stylePanel}}" style="background-color:{{$panel->bgColor}}">
    @else
    <div class="row w-100 p-0 m-0 pt-0 pb-2 {{$stylePanel}}">
    @endif
    <div class="col-sm-5 bg-white p-0 m-0">
    @if(!empty($panel->images))
    <!-- Carousel ================================================== -->
    <div id="CarouselItems" class="carousel slide" data-ride="carousel">
    <img src="{{url('images/icons/lupa.png')}}" class="ml-2 " style="width: 15px; height:15px;">
    <ol class="carousel-indicators mb-0">
    @foreach($panel->images as $key => $image)
    @if($key == 0)
    <li data-target="#CarouselItems" data-slide-to="{{$key}}" class="active bg-dark"></li>
    @else
    <li data-target="#CarouselItems" data-slide-to="{{$key}}" class="bg-dark"></li>
    @endif
    @endforeach
    </ol>
    <div class="carousel-inner">
    @foreach($panel->images as $key => $image)
    @if ($key == 0)
    <div class="carousel-item active" >
    @else
    <div class="carousel-item" >
    @endif
    @php
    $image = $util->toImage($panel->imagePath, $image->fileName);
    @endphp
    @if(!empty($panel->lightbox)  && $panel->lightbox == true)
    <a href="{{$image}}" class="stretched-link" data-toggle="lightbox" data-gallery="gallery" style="cursor:zoom-in">
    <img class="d-block mx-auto img-fluid p-0 pb-2"src="{{$image}}" alt="" style="max-height:380px">
    </a>
    @else
    <img class="d-block mx-auto img-fluid p-0 pb-2"src="{{$image}}" alt="" style="max-height:380px">
    @endif
    </div>
    @endforeach
    </div>
    <a class="carousel-control-prev" href="#CarouselItems" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon " aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#CarouselItems" role="button" data-slide="next">
    <span class="carousel-control-next-icon " aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
    <div class="mt-2" style="color:white">
    click here
    </div>
    </div>
    </div>
    {{--Fim do carrocel---------------}}
    <div class="col-sm-7 contents pt-2 pb-2 pt-sm-5 pb-sm-5 pl-sm-4 pr-lg-4 hiflex">
    @else
    <div class="col-12 contents pt-5 pb-5 pl-5 pr-3 hiflex">
    @endif
    @foreach($panel->showItems as $item)
    @if (strpos($item, ':'))
    @php
        $arrayTmp = explode(':', $item);
    @endphp
    @if(!empty($arrayTmp[2]))
    @php
        $color = $arrayTmp[2];
    @endphp
    <div style="color:{{$color}}">
    @else
    <div>
    @endif
    @php
        $item = $arrayTmp[0];
        $config = $arrayTmp[1];
    @endphp
    @if (!empty($panel->data->$item))
    @if ($config == 'HTN')
    <h3 class="m-0 pb-2">{{$panel->data->$item}}</h3>
    @elseif($config == 'HTS')
    <h3 class="m-0 pb-2"><strong>{{$panel->data->$item}}</strong></h3>
    @else
    <p class="m-0 p-0">{{$panel->data->$item}}</p>
    @endif
    @endif
    </div>
    @elseif(!empty($panel->data->$item))
    <p class="m-0 p-0">{{$panel->data->$item}}</p>
    @endif
    @endforeach
    @if (!empty($panel->button))
    @php
        $route = $util->toRoute($panel->route, $panel->data->id);
    @endphp
    <a href="{{$route}}" class="btn btn-light btn-outline-secondary mt-3" tabindex="-1" role="button" aria-disabled="true">{{$panel->button}}</a>
    @endif
    </div>
        </div>
</div>
@if(!empty($panel->showAddons))
<div class="w-100 p-3 p-sm-4 p-lg-5 mb-4 mt-3 text-justify hiflex {{$stylePanel}}">
    @if(!empty($panel->subTitle))
    <h5>{{$panel->subTitle}}</h5>
    @endif
    @foreach($panel->showAddons as $item)
    <p>{{$panel->data->$item}}</p>
    @endforeach
</div>
@endif
</section>
@else
    <div class="text-center p-4 mt-3 mb-3 {{$border}}">
        <h5>{{ __('There are no items to display.') }}</h5>
    </div>
@endif

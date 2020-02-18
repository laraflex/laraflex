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
        <div class="row w-100 p-0 m-0 pt-3 pb-3 {{$stylePanel}}" style="background-color:{{$panel->bgColor}}">
        @else
        <div class="row w-100 p-0 m-0 pt-3 pb-3 {{$stylePanel}}">
        @endif
        @if(!empty($panel->data->image))
            @php
            $bgImage = $util->toImage($panel->imagePath, $panel->data->image);
            @endphp
        <div class="d-block col-sm-5 bg-white" style="background-image: url('{{$bgImage}}');background-size:contain; background-position:center center;background-repeat:no-repeat;min-width:230px;min-height:230px">
        @if(!empty($panel->lightbox)  && $panel->lightbox == true && !empty($panel->images))
        @foreach($panel->images as $key => $image)
        @if($key == 0)
        <a href="{{$util->toImage($panel->imagePath, $image->fileName)}}" class="stretched-link w-100" data-toggle="lightbox" data-gallery="gallery" style="cursor:zoom-in;">
        <img src="{{url('images/icons/lupa.png')}}" class="mt-2" style="width: 20px; height:20px;">
        </a>
        @else
        <div data-toggle="lightbox" data-gallery="gallery" data-remote="{{$util->toImage($panel->imagePath, $image->fileName)}}"></div>
        @endif
        @endforeach
        @endif
        </div>
        <div class="col-sm-7 contents pt-5 pb-sm-5 pb-4 pl-sm-5 pl-4 pr-4 hiflex">
        @else
        <div class="col-12 contents pt-5 pb-sm-5 pb-4 pl-sm-5 pl-4 pr-3 hiflex">
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
<div class="w-100 p-3 p-sm-4 p-lg-5 mb-4 mt-3 pt-4 text-justify hiflex {{$stylePanel}}">
    @if(!empty($panel->subTitle))
    <h6>{{$panel->subTitle}}</h6>
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



@if (!empty($objectHeader))
    @php
        $carousel = $objectHeader;
    @endphp
@endif
@if (!empty($carousel->images))

<section id="carousel">
<!-- Carousel ================================================== -->
<div id="carrocel ">
<div id="carouselMaster" class="carousel slide carousel-fade mt-0 mb-0 border-bottom shadow" data-ride="carousel">
    <ol class="carousel-indicators mb-4 mb-lg-5">
    @foreach($carousel->images as $key => $image)
    @if($key == 0)
    <li data-target="#carouselMaster" data-slide-to="{{$key}}" class="active"></li>
    @else
    <li data-target="#carouselMaster" data-slide-to="{{$key}}"></li>
    @endif
    @endforeach
    </ol>
    <div class="carousel-inner" style="min-height: 80px; background:#ccc">
    @foreach($carousel->images as $key => $image)
    @if ($key == 0)
    <div class="carousel-item active" >
    @else
    <div class="carousel-item">
    @endif
        @php
        if (!empty($carousel->imagePath)){
            $image = $util->toImage($carousel->imagePath, $image);
        }else{
            $image = $util->toImage($image);
        }
        @endphp
    <img class="img-fluid w-100"src="{{$image}}" alt="">
    <div class="carousel-caption pb-4 pb-lg-5 mb-lg-3 mb-xl-5 text-center" style="color:#FFF; text-shadow: 1px 1px 2px gray;">
    @if(!empty($carousel->titles[$key]))
    @if(!empty($carousel->routes[$key]))
    <a href="{{$util->toRoute($carousel->routes[$key])}}" style="color:#FFF; text-shadow: 1px 1px 2px gray;">
    <div class="mb-3 mt-0" style="font-size:calc(0.9em + 1.0vw); line-height: 1.4; letter-spacing: 2px; font-family: Arial;height:100%;">
    <strong>{{__($carousel->titles[$key])}}</strong>
    </div>
    </a>
    @else
    <div class="mb-3 mt-0" style="font-size:calc(0.9em + 1.0vw); line-height: 1.4; letter-spacing: 2px; font-family: Arial;height:100%;">
    <strong>{{__($carousel->titles[$key])}}</strong>
    </div>
    @endif
    @if(!empty($carousel->contents[$key]))
    <div class="mb-4 mb-lg-4 d-none d-md-block" style="font-size:calc(12px + 0.47vw); letter-spacing: 1px; font-family: Arial;">
    {{__($carousel->contents[$key])}}
    </div>
    <div class="mb-2 d-none d-sm-block d-md-none" style="font-size:calc(12px + 0.47vw); letter-spacing: 1px; font-family: Arial;">
    {{substr($carousel->contents[$key], 0, 80)}} ...
    </div>
    <div class="mb-2 d-block d-sm-none" style="font-size:calc(12px + 0.47vw); letter-spacing: 1px; font-family: Arial;">
    {{substr($carousel->contents[$key], 0, 50)}} ...
    </div>
    @endif
    @endif
    @if (!empty($carousel->button) && $carousel->button)
        <div class=" pb-1 pb-md-2 pt-lg-3 mb-2 mb-lg-3 d-none d-sm-block">
        @if (!empty($carousel->routes[$key]))
        <a id="imagebutton" class="btn btn-outline-light btn-md px-lg-4" href="{{$util->toRoute($carousel->routes[$key])}}" role="button" aria-pressed="true"
        style="color:#fff; font-size:calc(13px + 0.2vw);min-width:140px;">
        {{__('know more')}}
        </a>
        @endif
        </div>
    @else
        <div class="p-1 p-md-2"></div>
    @endif
    </div>
    </div>
    @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselMaster" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselMaster" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
</div>
</div>
</section>
<!-- /.carousel ==================================================-->
@endif

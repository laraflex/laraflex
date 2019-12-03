@if (!empty($objectHeader))
    @php
        $carousel = $objectHeader;
    @endphp
@endif
@if (!empty($carousel->images))

<section id="carousel">
<!-- Carousel ================================================== -->
<div id="carrocel" style="border-bottom: 1px solid #ccc">
<div id="carouselMaster" class="d-none d-sm-block carousel slide carousel-fade mt-0 mb-0" data-ride="carousel">
    <ol class="carousel-indicators mb-5">
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
    <div class="carousel-item" >
    @endif
        @php
        $image = $util->toImage($carousel->imagePath, $image);
        @endphp
    <img class="img-fluid w-100 "src="{{$image}}" alt="">
    <div class="carousel-caption pb-5 mb-0" style="color:#FFF; text-shadow: 1px 1px 2px gray;">
    @if(!empty($carousel->titles[$key]))
    @if(!empty($carousel->routes[$key]))
    <a href="{{$util->toRoute($carousel->routes[$key])}}" style="color:#FFF; text-shadow: 1px 1px 2px gray;">
    <h2 class="d-none d-md-block mb-3 mt-0"><strong>{{__($carousel->titles[$key])}}</strong></h2>
    <h2 class="d-block d-md-none mb-4 mt-0">{{__($carousel->titles[$key])}}</h2>
    </a>
    @else
    <h2 class="d-none d-md-block mb-3 mt-0"><strong>{{__($carousel->titles[$key])}}</strong></h2>
    <h2 class="d-block d-md-none mb-4 mt-0">{{__($carousel->titles[$key])}}</h2>
    @endif
    @if(!empty($carousel->contents[$key]))
    <h5 class="d-none d-lg-block mb-5 pb-5">{{__($carousel->contents[$key])}}</h5>
    <h5 class="d-none d-md-block d-lg-none mb-4">{{__($carousel->contents[$key])}}</h5>
    @endif
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

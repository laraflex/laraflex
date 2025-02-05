@props(['util','images','lightbox' ])
<div class="col-12 col-sm-5 col-md-4 bg-white p-0 m-0 my-auto">
    {{-- Carousel ================================================== --}}
    <div id="CarouselItems" class="carousel slide pt-lg-4" data-ride="carousel">
    <ol class="carousel-indicators mb-0">
    @foreach($images as $key => $image)
        @if($key == 0)
        <li data-target="#CarouselItems" data-slide-to="{{$key}}" class="active bg-dark"></li>
        @else
        <li data-target="#CarouselItems" data-slide-to="{{$key}}" class="bg-dark"></li>
        @endif
    @endforeach
    </ol>

    <div class="carousel-inner">
    @foreach($images as $key => $imageItem)
        @if ($key == 0)
        <div class="carousel-item active" >
        @else
        <div class="carousel-item" >
        @endif
    @php
    if (!empty($imageItem->imageStorage)){
        $image = $imageItem->imageStorage;
    }
    elseif (!empty($imageItem->imagePath)){
        $image = $util->toImage($imageItem->imagePath);
    }
    elseif (!empty($imageItem->image)){
        $image = $util->toImage($imageItem->image);
    }
    @endphp
    @if(!empty($lightbox)  && $lightbox == true && !empty($image))

    <a href="{{$image}}" class="stretched-link" data-toggle="lightbox" data-gallery="gallery" style="cursor:zoom-in">
    <img class="d-none d-sm-block mx-auto img-fluid p-0 pb-0"src="{{$image}}" alt="" style="max-height:350px; width:80%">
    <img class="d-block d-sm-none mx-auto img-fluid p-0 pb-0"src="{{$image}}" alt="" style="max-height:320px; width:60%">
    </a>
    @elseif(!empty($image))
    <img class="d-none d-sm-block mx-auto img-fluid p-0 pb-0"src="{{$image}}" alt="" style="max-height:350px; width:80%">
    <img class="d-block d-sm-none mx-auto img-fluid p-0 pb-0"src="{{$image}}" alt="" style="max-height:320px; width:60%">
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

<div class="col-12 col-sm-7 col-md-8 contents pt-2 pb-2 pt-sm-4 pt-md-5 pb-sm-3 pl-sm-3 pr-lg-3 ">


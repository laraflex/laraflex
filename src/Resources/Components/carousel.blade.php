@if (!empty($objectHeader))
    @php
        $carousel = $objectHeader;
    @endphp
@endif

@if (!empty($carousel->images))

<section id="carousel">
{{-- Carousel ================================================== --}}
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
    @php
    if (!empty($carousel->imageStorage) && $carousel->imageStorage === true){
        // falta implementação
    }
    else{
        $image = $util->toImage($image);
    }
    @endphp
    @if ($key == 0)
    <div class="carousel-item active" >
    @else
    <div class="carousel-item">
    @endif
    {{--image component caroucel ========================================--}}
    @if (!empty($image))
        {{--@include('laraflex::ComponentParts.caroucel.image') --}}
        <x-laraflex::caroucel.image :image="$image"/>
    @endif
    {{--title component caroucel =========================================--}}
    <div class="carousel-caption pb-4 pb-lg-5 mb-lg-3 mb-xl-5 text-center" style="color:#FFF; text-shadow: 1px 1px 2px gray;">
    @if(!empty($carousel->titles[$key]))
        @php
            $title = $carousel->titles[$key];
            if (!empty($carousel->routes[$key])){
                $route = $util->toRoute($carousel->routes[$key]);
            }
            else{
                $route = "#";
            }
        @endphp
        <x-laraflex::caroucel.title :title="$title" :route="$route" />
        {{-- @include('laraflex::ComponentParts.caroucel.title') --}}
    @endif
    {{--content component caroucel ============================================--}}
    @if(!empty($carousel->contents[$key]))
        @php
            $content = $carousel->contents[$key];
        @endphp
        <x-laraflex::caroucel.content :content="$content" />
        {{--@include('laraflex::ComponentParts.caroucel.content')--}}
    @endif

    {{--button component caroucel ======================================================--}}
    @if (!empty($carousel->button) && $carousel->button)
        @include('laraflex::ComponentParts.caroucel.button')
    @else
        <div class="p-1 p-md-2"></div>
    @endif
    </div>
    </div>
    @endforeach
    </div>
    {{--Direction component caroucel ================================================--}}
    @include('laraflex::ComponentParts.caroucel.direction')
</div>
</div>
</section>
{{-- /.carousel ==================================================--> --}}
@endif

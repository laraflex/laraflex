@props(['util','images' ])
@foreach($images as $key => $imageItem)
    @php
    if (!empty($imageItem->imageStorage)){
        $image = $imageItem->imageStorage;
    }
    elseif (!empty($imageItem->imagePath)){
        $image = $util->toImage($imageItem->imagePath);
    }elseif(!empty($imageItem->image)){
        $image = $util->toImage($imageItem->image);
    }
    @endphp

    @if($key == 0)
    <a href="{{$image}}" class="stretched-link w-100" data-size="lg" data-toggle="lightbox" data-gallery="gallery" style="cursor:zoom-in;">
    </a>
    @else
    <div data-toggle="lightbox" data-size="lg" data-gallery="gallery" data-remote="{{$image}}"></div>
    @endif
@endforeach

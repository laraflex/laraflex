@props(['label', 'images'])
<div class="row px-3">
    @php
    $column = ['d-block', 'd-block', 'd-none d-sm-block', 'd-none d-lg-block']
    @endphp

    @if (!empty($images))
    <div class="col-12 pt-2">
        <span class="pl-2"><small><b>{{$label}}</b></small></span>
    </div>


    @foreach ($images as $key => $imageItem)
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

        @if (!empty($image))
        <div class="col-6 col-sm-4 col-lg-3 p-1 pt-2 {{$column[$key]}}">
        <div class="p-0" style="">
        <img src="{{$image}}" class="image-fluid img-thumbnail" style="">
        </div>
        </div>
        @endif
        @php
        if ($key == 3){
        break;
        }
        @endphp
    @endforeach
    @endif
</div>

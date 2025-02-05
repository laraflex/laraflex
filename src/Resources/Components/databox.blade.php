@if (!empty($objeto))
    @php
        $dataBox = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $dataBox = $object;
    @endphp
@endif

@if (!empty($dataBox->items))
@php
    if (!empty($dataBox->title)){
        $title = $dataBox->title;
    }else{
        $title = NULL;
    }
@endphp

<section id="databox" class="pb-1 pt-2 pt-md-3">
<div class="container-xl px-0">
<div class="mx-0 mb-0 mt-1 px-2 px-lg-3 px-xl-0">


<div class="p-3 pb-5 {{$border}} mt-3 mb-4" >
<<<<<<< HEAD
{{--Component title =================================--}}
@if(!empty($title))
    @include('laraflex::ComponentParts.databox.title')
=======
{{--Component title--}}
@if(!empty($dataBox->title))

<div class="mt-1 text-center pt-2 pb-2" style="  font-size:calc(0.9em + 1.0vw);">
{{$dataBox->title}}
</div>
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da
@endif

{{--component items--}}
<div class="row ml-0 mr-0">
@foreach($dataBox->items as $item)
<<<<<<< HEAD
=======
@php
    if (!empty($item->label)){
        $label = $item->label;
    }else{
        $label = "__('No value found for label')";
    }
@endphp

@if(!empty($item->type) && $item->type == 'longText')
<div class="col-sm-12 p-1 pt-2">
<span class="pl-2"><small><b>{{$item->label}}</b></small></span>
<div class="border rounded p-2">
{{$item->data}}
</div>
</div>
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da

@php
    if (!empty($item->label)){
        $label = $item->label;
    }else{
        $label = '';
    }
    if (!empty($item->type)){
        $type = $item->type;
    }else{
        $type = NULL;
    }
    if (!empty($item->data)){
        $data = $item->data;
    }else{
        $data = NULL;
    }
    if (!empty($item->images)){
        $images = $item->images;
    }else{
        $images = NULL;
    }
@endphp

{{--longText Component Databox ===================================--}}
@if(!empty($type) && $type == 'longText')
@include('laraflex::ComponentParts.databox.longtext')

{{--Image Component Databox ===================================--}}
@elseif(!empty($type) && $type == 'image')
@php
    if (!empty($item->imageStorage)){
        $image = $item->imageStorage;
    }
    elseif (!empty($item->imagePath)){
        $image = $util->toImage($item->imagePath);
    }
    elseif(!empty($item->image)){
        $image = $util->toImage($item->image);
    }
<<<<<<< HEAD
@endphp
@if (!empty($image))
@include('laraflex::ComponentParts.databox.image')
@endif

{{--Text Component Databox ===================================--}}
@elseif(empty($type) OR $type == 'text')
@include('laraflex::ComponentParts.databox.text')
=======

    @endphp
    @if (!empty($image))
    <div class="col-sm-12 p-1 pt-2">
    <span class="pl-2"><small><b>{{$item->label}}</b></small></span>
    <div class="p-0" style="max-width: 250px;">
    <img src="{{$image}}" class="image-fluid img-thumbnail d-none d-sm-block" style="max-width: 150px;">
    <img src="{{$image}}" class="image-fluid img-thumbnail d-block d-sm-none" style="max-width: 100px;">
    </div>
    </div>
    @endif


@elseif(empty($item->type) OR $item->type == 'text')
<div class="col-sm-6 col-xl-4 p-1 pt-2">
<span class="pl-2"><small><b>{{$label}}</b></small></span>
<div class="border rounded p-2">
{{$item->data}}
</div>
</div>
@endif

@if(!empty($item->type) && $item->type == 'images')
{{--</div>--}}
<div class="row px-3">
    @php
    $column = ['d-block', 'd-block', 'd-none d-sm-block', 'd-none d-lg-block']
    @endphp

    @if (!empty($item->images))
    <div class="col-12 pt-2">
        <span class="pl-2"><small><b>{{$item->label}}</b></small></span>
    </div>


    @foreach ($item->images as $key => $imageItem)
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
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da
@endif

{{--Images Component Databox ===================================--}}
@if(!empty($type) && $type == 'images')
@include('laraflex::ComponentParts.databox.images')
@endif

@endforeach
</div>
{{--Icon de retorno ao topo da página--}}
@if (!empty($objetoConfig->onePage) && $objetoConfig->onePage === true)
<div class="w-100 pb-sm-3 pt-sm-3 d-none d-sm-block pl-5 container-xl">
    <a href="#top">
    <img src="{{$util->toImage('local/images/icons', 'setadupla.png')}}" width="26" height="26" class="float-left rounded d-block">
    </a>
    </div>
@endif
{{--End Icon de retorno ao topo da página--}}
</div>
</section>
@else
{{--messageNull component ContentBox ==========================================--}}
<x-laraflex::shared.messagenull />
@endif

</div>
</div>
</section>

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
{{--Component title =================================--}}
@if(!empty($title))
    @include('laraflex::ComponentParts.databox.title')
@endif

{{--component items--}}
<div class="row ml-0 mr-0">
@foreach($dataBox->items as $item)

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
@endphp
@if (!empty($image))
@include('laraflex::ComponentParts.databox.image')
@endif

{{--Text Component Databox ===================================--}}
@elseif(empty($type) OR $type == 'text')
@include('laraflex::ComponentParts.databox.text')
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

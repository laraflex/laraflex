@props(['util','bgImage','images','lightbox' ])
<div class="col-12 col-sm-5 col-md-4 bg-white my-auto px-0 p-2">
<div class="" style="background-image: url('{{$bgImage}}');background-size:contain; background-position:center center;background-repeat:no-repeat;min-widthx:230px;min-height:calc(180px + 8vw); position:relative">
<img src="{{url('local/images/icons/lupa.png')}}" class="mt-2 ms-2" style="width: 25px; height:25px; position:absolute; top:45%; left:45%"/>
@if(!empty($lightbox)  && $lightbox == true && !empty($images))

{{--@props(['util','images' ])--}}
<x-laraflex::shared.lightbox :util="$util" :images="$images" />


@endif
</div>
</div>
<div class="col-12 col-sm-7 col-md-8 contents pt-4 pb-2 pb-sm-5 px-3 px-sm-4">

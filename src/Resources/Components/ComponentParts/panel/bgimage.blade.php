@props(['util','bgImage','images','lightbox' ])
<div class="col-12 col-sm-5 col-md-4 bg-white my-auto w-100 px-0 p-2">
<div class="w-100" style="background-image: url('{{$bgImage}}');background-size:contain; background-position:center center;background-repeat:no-repeat;min-widthx:230px;min-height:calc(180px + 8vw);">
<img src="{{url('local/images/icons/lupa.png')}}" class="mt-2 ml-2" style="width: 15px; height:15px;" />
@if(!empty($lightbox)  && $lightbox == true && !empty($images))

{{--@props(['util','images' ])--}}
<x-laraflex::shared.lightbox :util="$util" :images="$images" />
@endif
</div>
</div>
<div class="col-12 col-sm-7 col-md-8 contents pt-4 pb-2 pb-sm-5 px-3 px-sm-4">

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

<section id="databox" class="pb-1 pt-2 pt-md-3">
<div class="container-xl px-0">
<div class="mx-0 mb-0 mt-1 px-2 px-lg-3 px-xl-0">


<div class="p-3 pb-5 {{$border}} mt-3 mb-4" >
{{--Component title--}}
@if(!empty($dataBox->title))

<div class="mt-1 text-center pt-2 pb-2" style="  font-size:calc(1.1em + 0.6vw);">
{{$dataBox->title}}
</div>
@endif

{{--component items--}}
<div class="row ml-0 mr-0">
@foreach($dataBox->items as $item)
@if(!empty($item->type) && $item->type == 'longText')
<div class="col-sm-12 p-1 pt-2">
<span class="pl-2"><small><b>{{$item->label}}</b></small></span>
<div class="border rounded p-2">
{{$item->data}}
</div>
</div>


@elseif(!empty($item->type) && $item->type == 'image')
    @if (!empty($item->image) && !empty($item->imagePath))
    <div class="col-sm-12 p-1 pt-2">
    <span class="pl-2"><small><b>{{$item->label}}</b></small></span>
    <div class="p-0" style="max-width: 250px;">
    <img src="{{$util->toImage($item->imagePath, $item->image)}}" class="image-fluid img-thumbnail" style="max-width: 250px;">
    </div>
    </div>
    @endif


@elseif(empty($item->type) OR $item->type != 'images')
<div class="col-sm-6 col-xl-4 p-1 pt-2">
<span class="pl-2"><small><b>{{$item->label}}</b></small></span>
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

    @if (!empty($item->items))
    <div class="col-12 pt-2">
        <span class="pl-2"><small><b>{{$item->label}}</b></small></span>
    </div>
    @foreach ($item->items as $key => $image)
        @if (!empty($image->name) && !empty($item->imagePath))
        <div class="col-6 col-sm-4 col-lg-3 p-1 pt-2 {{$column[$key]}}">
        <div class="p-0" style="">
        <img src="{{$util->toImage($item->imagePath, $image->name)}}" class="image-fluid img-thumbnail" style="">
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
@endif


@endforeach
</div>
{{--Icon de retorno ao topo da página--}}
@if (!empty($objetoConfig->onePage) && $objetoConfig->onePage === true)
<div class="w-100 pb-sm-3 pt-sm-3 d-none d-sm-block pl-5 container-xl">
    <a href="#top">
    <img src="{{$util->toImage('images/icons', 'setadupla.png')}}" width="26" height="26" class="float-left rounded d-block">
    </a>
    </div>
@endif
{{--End Icon de retorno ao topo da página--}}
</div>
</section>
@else
<div class="container-xl px-3 mt-4 pb-2" translation="no">
    <div class="alert alert-primary {{$border}}" role="alert">
    <div class="content-message alert-heading" style="font-size:calc(0.85em + 0.4vw)"><strong>{{__('Message')}}!</strong></div>
    <hr class="d-none d-sm-block">
    <div class="mb-0" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.18vw);">{{ __('There are no items to display.') }}</div>
    </div>
</div>
@endif

</div>
</div>
</section>

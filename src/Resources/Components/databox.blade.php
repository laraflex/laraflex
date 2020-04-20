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

<section id="dataBox">

<div class="p-3 {{$border}} mt-3 mb-3 hiflex">
{{--Component title--}}
@if(!empty($dataBox->title))
<h3 class="d-none d-sm-block mt-1 font-weight-normal text-center pt-2 pb-3">{{$dataBox->title}}</h3>
<h4 class="d-block d-sm-none mt-1 font-weight-normal text-center pt-2 pb-2">{{$dataBox->title}}</h4>
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
@else
<div class="col-sm-6 col-xl-4 p-1 pt-2">
<span class="pl-2"><small><b>{{$item->label}}</b></small></span>
<div class="border rounded p-2">
{{$item->data}}
</div>
</div>
@endif
@endforeach
</div>
</div>
</section>
@else
@if (!empty($dataBox->nullable) && $dataBox->nullable === true)
    <div class="text-center mt-2 mb-2"></div>
@else
    <div class="text-center p-4 mt-3 mb-3 {{$border}}">
    <h5>{{ __('There are no items to display.') }}</h5>
    </div>
@endif
@endif

@if (!empty($objeto))
    @php
        $groupCards = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $groupCards = $object;
    @endphp
@endif

@if (!empty($groupCards) && !empty($groupCards->items))


<section class="groupcards">
<div class=" mb-4 mt-3 pr-2 pl-2 m-1 hiflex">
    @if(!empty($groupCards->title))
    <h3 class="d-none d-sm-block mt-1 font-weight-normal text-center pt-2 pb-3">{{$groupCards->title}}</h3>
    <h4 class="d-block d-sm-none mt-1 font-weight-normal text-center pt-2 pb-2">{{$groupCards->title}}</h4>
    @endif

    <div class="row">
    @foreach ($groupCards->items as $key =>$item)
     {{--Início das colunas do componente--}}
    <div class=" col-6 col-sm-4 col-md-4 col-lg-3 mb-4 hiflex pt-3 pb-3 {{$border}} hiflex">
    @if (in_array('image', $groupCards->showItems))
        @php
        $image = url($groupCards->imagePath . $item->image);
        @endphp
    <a href="{{$util->toRoute($groupCards->route, $item->id)}}">
    <img src="{{$image}}" class="d-none d-md-block col-lg-none card-img-top p-0 mb-2" alt="..." style="width: 90%;">
    <img src="{{$image}}" class="d-block d-md-none mx-auto card-img-top p-0 mb-2" alt="..." style="width: 70%;">
    </a>
    @endif
    @foreach($groupCards->showItems as $fieldName)
    <div class="hiflex p-0 m-0">
    @if(!empty($item->$fieldName))
    @if($fieldName != 'image')
    @if($fieldName == 'title')
    <h6 class="card-title pt-0">{{$item->title}}</h6>
    @elseif($fieldName == 'subTitle')
    <div class="pt-3">
    <h6 class="card-title"><strong>{{$item->subTitle}}</strong></h6>
    </div>
    @else
    <div>
    <p class="d-none d-sm-block card-text" style="line-height: 1.2">{{$item->$fieldName}}</p>
    <p class="d-block d-sm-none card-text" style="line-height: 1.2; font-size:80%">{{$item->$fieldName}}</p>
    </div>
    @endif
    @endif
    @endif
    </div>
    @endforeach




    @if (!empty($groupCards->button))
    @php
    if (!empty($item->btnColor)){
    $btnOptions = ['primary', 'Secondary', 'Success', 'Danger', 'Warning', 'Info', 'Dark', 'link'];
    $btnBorder = '';
    if (!in_array($item->btnColor, $btnOptions)){
        $btnColor = 'light';
        $btnBorder = 'btn-outline-secondary';
    }else{
        $btnColor = $item->btnColor;
        $btnBorder = '';
    }
    }else{
        $btnColor = 'light';
        $btnBorder = 'btn-outline-secondary';
    }
    @endphp
    <a href="{{$util->toRoute($groupCards->button->route, $item->id)}}" class="btn btn-{{$btnColor}} {{$btnBorder}} btn-sm btn-block mt-3" role="button" >{{$groupCards->button->caption}}</a>
    @endif
    </div>
    {{--Fim das colunas do componente--}}
    @endforeach
</div>
{{--$paginate--------------------------------------}}
@if (!empty($groupCards->paginate))
<div class="text-center nav justify-content-center">
    {!!$groupCards->paginate->links()!!}
</div>
@endif
</div>
</section>
@else
<div class="text-center p-4 mt-3 mb-3 {{$border}}">
<h5>{{ __('There are no items to display.') }}</h5>
</div>
@endif

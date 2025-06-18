{{--This component should only be added with PHP include--}}
<div class="row m-0 p-0">
    <div class="col-12 col-sm-9 p-0">
        @if(!empty($mediacards->title))
        <div class="mediacards-title text-left pt-3 pb-2 ps-3" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
        {{$mediacards->title}}</div>
        @if (!empty($mediacards->legend))
            <div class="mediacards-shared text-left pb-3 ps-3" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
            <span>{{$mediacards->legend}}</span></div>
        @endif
        @endif
    </div>
    <div class="col-0 col-sm-3 p-0 pe-2 d-none d-sm-block ">
        @if(!empty($mediacards->legend) && !empty($mediacards->title))
        <div class="py-2 mb-sm-1 py-xl-2"></div>
        <div class="pt-1 pt-md-2 pt-lg-3 pe-3 pe-lg-3 text-end" >
        <a href="{{$util->toRoute($mediacards->seeMore)}}" class="btn btn-dark m-0">
        {{__('See more')}}
        </a>
        </div>
        @else
        <div class="pb-sm-3 pt-1 pt-md-2 pt-lg-3 pe-3 pe-lg-3 text-end">
        <a href="{{$util->toRoute($mediacards->seeMore)}}" class="btn btn-dark m-0">
        {{__('See more')}}
        </a>
        </div>
        @endif
    </div>
</div>

<div class="mt-0">

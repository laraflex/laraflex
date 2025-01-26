@props(['seeMore','route', 'title','legend','objectClass','sharedClass', 'font_family', 'font_family_title'])
@if (!empty($seeMore))
<div class="row m-0 p-0">
    <div class="col-12 col-sm-9 p-0">
        @if(!empty($title))
        <div class="{{$objectClass}} text-left pt-3 pb-2 pl-3" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
        {{$title}}</div>
        @if (!empty($legend))
            <div class="{{$sharedClass}} text-left pb-3 pl-3" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
            <span>{{$legend}}</span></div>
        @endif
        @endif
    </div>
    <div class="col-0 col-sm-3 text-right p-0 pr-2 d-none d-sm-block" style="width: 100%;">
        @if(!empty($legend) && !empty($title))
        <div class="py-2 mb-sm-1 py-xl-2"></div>
        <div class="pt-1 pt-md-2 pt-lg-3 pr-3 pr-lg-4 align-text-bottom" style="height: 100%;">
        <a href="{{$route}}" class="btn btn-dark m-0">
        {{--__('See more')--}}
        <span class="px-2">{{__('See more')}}</span>
        </a>
        </div>
        @else
        <div class="pb-sm-3 pt-1 pt-md-2 pt-lg-3 pr-3 pr-lg-4 align-text-bottom" style="height: 100%;">
        <a href="{{$route}}" class="btn btn-dark m-0">
        {{--__('See more')--}}
        <span class="px-2">{{__('See more')}}</span>
        </a>
        </div>
        @endif
    </div>
</div>
@else
    @if(!empty($title))
    <div class="{{$objectClass}} text-center pt-3 pb-2" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
    {{$title}}</div>
    @if (!empty($legend))
        <div class="{{$sharedClass}} text-center pb-3" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
        <span>{{$legend}}</span></div>
    @else
        <div class="pt-2"></div>
    @endif
    @endif
@endif

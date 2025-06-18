@props(['seeMore','title','legend','font_family','font_family_title','position' ])
@php
    $position = 'text-start';
@endphp

<div class="row m-0 p-0 w-100">
    <div class="col-9 col-sm-8 p-0">

        @if(!empty($title))
            <div class="groupcards-title mt-1 {{$position}} pt-3 pb-0 pb-sm-3x pe-2 ps-2 w-100" style="font-size:calc(0.7em + 1.1vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
                {{$title}}
            </div>
         @endif
    </div>
    <div class="col-3 col-sm-4 text-end p-0 pe-2 pe-lg-0 pb-3 pt-0 d-none d-sm-block" style="widthxx: 100%;">
        @if(!empty($title))
        {{-- <div class="py-2 mb-sm-1 py-xl-2"></div> --}}
        <div class="pt-1 pt-md-2 pt-lg-3 pr-3 pr-lg-4 align-text-bottom" style="height: 100%;">
        <a href="{{$seeMore}}" class="btn btn-dark m-0">
        {{__('See more')}}
        </a>
        </div>

        @endif

    </div>
</div>

@props(['seeMore','title','legend','font_family','font_family_title','position' ])
<div class="row m-0 p-0">
    <div class="col-12 col-sm-9 p-0">

    {{-- TITLE COMPONENT GROUPCARDS ============================== --}}
    {{--@props(['title','legend','font_family','font_family_title' ])--}}
    <x-laraflex::groupcards.title :title="$title" :legend="$legend" :font_family="$font_family" :font_family_title="$font_family_title" :position="$position"  />

    </div>
    <div class="col-0 col-sm-3 text-right p-0 pr-2 d-none d-sm-block align-text-bottomx" style="width: 100%;">
        @if(!empty($legend) && !empty($title))
        <div class="py-2 mb-sm-1 py-xl-2"></div>
        <div class="pt-1 pt-md-2 pt-lg-3 pr-3 pr-lg-4 align-text-bottom" style="height: 100%;">
        <a href="{{$seeMore}}" class="btn btn-dark m-0">
        {{__('See more')}}
        </a>
        </div>
        @else
        <div class="pb-sm-3 pt-1 pt-md-2 pt-lg-3 pr-3 pr-lg-4 align-text-bottom" style="height: 100%;">
        <a href="{{$seeMore}}" class="btn btn-dark m-0">
        {{__('See more')}}
        </a>
        </div>
        @endif
    </div>
</div>

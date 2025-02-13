{{--This component should only be added with PHP include--}}
<div class="gridcards-title text-center pt-3 pb-2" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">
    {{$gridcards->title}}</div>
    @if (!empty($gridcards->legend))
        <div class="gridcards-shared text-center pb-3" style="font-size:calc(0.72em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
        <span>{{$gridcards->legend}}</span></div>
    @else
        <div class="pt-2"></div>
    @endif

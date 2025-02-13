{{--This component should only be added with PHP include--}}
@if (!empty($gridcards->styles->fileStyle) && $gridcards->styles->fileStyle === true)
<div class="px-3 {{$paddingText}}" style="text-align:center">
@else
<div class="px-3 {{$paddingText}}" style="text-align:left">
@endif
    @if(!empty($item->title) && in_array('title', $gridcards->showItems))
        <div class="gridcards-item-shared text-dark" style="font-size:calc(0.76em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
        {{$item->title}}
        </div>
    @endif
    @if(!empty($item->label) && in_array('label', $gridcards->showItems))
        <div class="gridcards-item-shared text-dark pb-1" style="font-size:calc(0.70em + 0.3vw);line-height:1.3;{{$font_family}}">
        <small>{{$item->label}}</small>
        </div>
    @endif
    @if(!empty($item->specialLabel) && in_array('specialLabel', $gridcards->showItems))
        <div class="gridcards-item-shared pb-1" style="color: blue; font-size:calc(11px + 0.25vw);line-height:1.3;{{$font_family}}">
        {{$item->specialLabel}}
        </div>
    @endif
    {{--Adicionando rating --------------------------------------------------}}
    @if(!empty($item->rating) && in_array('rating', $gridcards->showItems))
        <div class="" style="font-size:calc(11px + 0.25vw);line-height:1.3;{{$font_family}}">
        {{$item->rating}}
        @for ($i = 1; $i <= intval($item->rating); $i++)
            <img src="{{$util->toImage('local/images/icons', 'star.png')}}" width="13px" height="12px" class="m-0 mb-1" />
        @endfor
        @if ($item->rating != intval($item->rating))
            <img src="{{$util->toImage('local/images/icons', 'starsmall.png')}}" width="13px" height="12px" class="m-0 mb-1" />
        @endif
    </div>
@endif
{{--Fim de rating --------------------------------------------------------}}
</div>

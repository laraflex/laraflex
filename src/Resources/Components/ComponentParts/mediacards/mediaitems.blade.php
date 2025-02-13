{{--This component should only be added with PHP include--}}
<div class="px-2 px-md-3 pt-2 pt-md-2">
    @if(!empty($item->title) && in_array('title', $mediacards->showItems))
        <div class="mediacards-item-shared text-left text-dark mt-2 ml-1" style="font-size:calc(0.76em + 0.25vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
        {{$item->title}}</div>
    @endif
    @if(!empty($item->label) && in_array('label', $mediacards->showItems))
        <div class="mediacards-item-shared text-dark ml-1 mt-1" style="font-size:calc(0.70em + 0.3vw);line-height:calc(14px + 0.3vw);{{$font_family}}">
        <small>{{$item->label}}</small></div>
    @endif
    {{--Adicionando rating --------------------------------------------------}}
    @if(!empty($item->rating) && in_array('rating', $mediacards->showItems))
        <div class="pt-2 pl-1" style="font-size:calc(11px + 0.25vw);line-height:1.3;color:#000000;{{$font_family}}">
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

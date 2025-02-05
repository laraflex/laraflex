@props(['margin', 'photo', 'style', 'name', 'date', 'coment', 'id', 'comentResponse', 'font_family'])
<li class=" pb-2 pb-sm-3 {{$margin}}">
<div class="row">
    <div class="col-1 col-sm-1 m-0">
    <img src="{{$photo}}" class="m-0 img-fluid mx-auto d-none d-sm-block {{$style}}" alt="..." style="max-width:50px; max-height:50px;">
    </div>
    <div class="media-bodyx col-11 col-sm-11 m-0 p-0 pl-sm-3 pl-lg-0">
    <img src="{{$photo}}" class="m-0 img-fluid m-2 m-sm-2 d-block d-sm-none float-left {{$style}}" alt="..." style="max-width:40px; max-height:40px;">

    <div class="mt-0 mb-1">
    @if (!empty($name))
    <b><span class="" style="line-height:calc(0.8em + 0.8vw); font-size:calc(0.75em + 0.2vw);">{{$name}}</span></b>
    @endif
    @if (!empty($date))
    <span class="ml-2 ml-md-3" style="line-height:calc(0.8em + 0.8vw); font-size:calc(0.75em + 0.2vw);"><small>{{$date}}</small></span>
    @endif
</div>
@if (!empty($coment))
<div class="coment-shared text-justify prxxx-xl-3" style="line-height:calc(0.8em + 0.8vw); font-size:calc(0.75em + 0.2vw);{{$font_family}}">
    {!!$coment!!}</div>
@endif
@if(!empty($comentResponse) && $comentResponse === true)
<button type="button" class="btn btn-link mb-0" data-toggle="modal" data-target="#comentModal" data-id="{{$id}}">{{__('Reply')}}</buttom>
@endif
</div>
</div>
</li>

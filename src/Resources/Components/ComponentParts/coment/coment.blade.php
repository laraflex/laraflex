@props(['margin', 'photo', 'style', 'name', 'date', 'coment', 'id', 'comentResponse', 'font_family'])
<li class="m-0 p-0 pb-2 pb-sm-3 {{$margin}}">
<div class="row m-0 p-0">

    <div class="col-1 col-sm-1 m-0 p-0 d-none d-md-block">
        <img src="{{$photo}}" class="m-0 p-0 d-none d-sm-block mx-auto {{$style}} " alt="..." style="max-width:50px; max-height:50px;">
    </div>

    <div class=" col-12 col-md-11 col-sm-11 m-0 p-0 ps-0 ps-sm-2 ps-lg-0 pe-2">
        <img src="{{$photo}}" class="m-0 img-fluid me-2 me-sm-2 d-block d-sm-none float-left {{$style}}" alt="..." style="max-width:40px; max-height:40px;">
    <div class="mt-0 mb-1">
    @if (!empty($name))
    <b><span class="ms-0 ms-md-2" style="line-height:calc(0.8em + 0.8vw); font-size:calc(0.75em + 0.2vw);">{{$name}}</span></b>
    @endif
    @if (!empty($date))
    <span class="ms-2 ms-md-3" style="line-height:calc(0.8em + 0.8vw); font-size:calc(0.75em + 0.2vw);"><small>{{$date}}</small></span>
    @endif
</div>
@if (!empty($coment))
<div class="coment-shared text-justify prxxx-xl-3 ms-0 ms-md-2" style="line-height:calc(0.8em + 0.8vw); font-size:calc(0.75em + 0.2vw);{{$font_family}}">
    {!!$coment!!}</div>
@endif

@php
    //dd($id);
@endphp


@if(!empty($comentResponse) && $comentResponse === true)
<button type="button" class="btn btn-link mb-0" data-bs-toggle="modal" data-bs-target="#comentModal" data-bs-whatever="{{$id}}" data-id="{{$id}}">{{__('Reply')}}</buttom>
@endif
</div>
</div>
</li>

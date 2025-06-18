@props(['bgImage'])

<div class="backpanel jumbotron mb-0 p-0 shadow" style="background-image: url({{$bgImage}}); background-size:contain; padding-left:calc(1vw);padding-right:calc(1vw);">

<div class="container-xl py-2 py-sm-3 pt-md-4 text-center shadow" style="background-image: url({{$bgImage}}); background-size:cover; color:#fff; font-size:calc(0.8em + 1.3vw); line-height: 1.4; font-family: arial;height:100%;">

    @if ($tranparentTheme == true)
    <div class="py-4"></div>
    @endif

@if (!empty($backpanel->extend) && $backpanel->extend == true)
    <div class="d-none d-sm-block" style="height: 30px;"></div>
@endif
<div class="p-0 p-sm-3 p-xl-4" ></div>
<div class="p-1 py-md-2 py-lg-3">

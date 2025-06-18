@php
if (!empty($objectHeader)){
    $header = $objectHeader;
}elseif(!empty($objeto)){
    $header = $objeto;
}elseif(!empty($object)){
    $header = $object;
}
@endphp
@if (!empty($header))
@php

    if (!empty($header->bgImage)) {
        $bgImage = $util->toImage($header->bgImage);
    }else {
        $bgImage = $util->toImage('local/images/panels/imagePanel2.jpg');
    }

    $routeHeader = $util->toImage('local/images/app/logo-b.png');
    $height =
    $headerHeight = 'height: calc(3rem + 8vw);';
    if (!empty($header->route)) {
        $route = $util->toRoute($header->route);
    }else {
        $route = $util->toRoute('/');
    }
@endphp

<header class="bd-header bg-dark py-2 d-flex w-100" style="background-image:url({{$bgImage}});background-size:cover;border-bottom:1px solid #cccccc;">
<div class="container-fluid text-center pt-4 pt-md-3 pt-md-5 pt-lg-5 pb-2 pb-sm-0 " style="{{$headerHeight}}" >
<a href="{{$route}}">
<img src="{{$routeHeader}}" style="width:calc(90px + 10vw); height:calc(30px + 1.3vw);" class="me-3" alt="Bootstrap">
</a>
</div>
</header>
@endif

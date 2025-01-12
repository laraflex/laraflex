{{--Caroucel Button--}}
<div class=" pb-1 pb-md-2 pt-lg-3 mb-2 mb-lg-3 d-none d-sm-block">
    @if (!empty($carousel->routes[$key]))
    <a id="imagebutton" class="btn btn-outline-light btn-md px-lg-4" href="{{$util->toRoute($carousel->routes[$key])}}" role="button" aria-pressed="true"
    style="color:#fff; font-size:calc(13px + 0.2vw);min-width:140px;">
    {{__('know more')}}
    </a>
    @endif
</div>

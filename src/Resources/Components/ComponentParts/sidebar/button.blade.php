@props(['show_style','btnStyle','position' ])
<a id="show-sidebar" class="{{$show_style}} btn btn-md px-xl-3 {{$btnStyle}}" href="#" aria-pressed="true" style="{{$position}}">
    <div class="d-none d-lg-block" translate="no">
    <span class="ms-2 me-2" translate="no">Main Menu</span>
    <i class="fas fa-bars"></i>
    </div>
    <div class="d-block d-lg-none px-2">
    <i class="fas fa-bars my-1"></i>
    </div>
</a>


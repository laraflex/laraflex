@php
    $routerSearch = $util->toRoute($navBar->routerSearch);

    $btnSearch = 'btn-outline-secondary';
    $btnBorder = 'border-secondary';
    if (!empty($navBar->routerSearch)) {
        $routerSearch = $navBar->routerSearch;
    }else {
        $routerSearch = 'search';
    }

@endphp

<div class="d-none d-lg-block me-3">
<form class="d-flex" role="search" action="{{$routerSearch}}" method="POST">
 @csrf
    <input id="search" name="search" class="form-control me-2 {{$btnBorder}}" type="search" aria-label="Search" style="{{$bgColorSearch}}; {{$font_color}}" required>
    <button class="btn {{$btnSearch}}" type="submit" style="{{$font_color}}{{$bgBtnSearchColor}}">Buscar</button>
</form>
</div>

@props(['buttons', 'util'])
<<<<<<< HEAD
<div class="mb-2 mb-lg-3 d-none d-sm-bloc">
    @foreach ($buttons as $key => $btn)
        @if ($key < 2)
            @if (!empty($btn->route))
            <a id="imagebutton" class="btn btn-outline-light btn-md px-lg-4 mt-2 mt-lg-3 k" href="{{$util->toRoute($btn->route)}}" role="button" aria-pressed="true"
=======
<div class="mb-2 mb-lg-3">
    @foreach ($buttons as $key => $btn)
        @if ($key < 2)
            @if (!empty($btn->route))
            <a id="imagebutton" class="btn btn-outline-light btn-md px-lg-4 mt-2 mt-lg-3" href="{{$util->toRoute($btn->route)}}" role="button" aria-pressed="true"
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da
            style="color:#fff; font-size:calc(13px + 0.2vw);min-width:140px;">
            {{$btn->label}}
            </a>
            @endif
        @endif
    @endforeach
    </div>

@props(['buttons', 'util'])

<div class="mb-0 mb-lg-1 d-none d-sm-block">
    @foreach ($buttons as $key => $btn)
    @php
    if ($key == 3){
        break;
    }
    @endphp
        @if (!empty($btn->route))
        <a id="imagebutton" class="btn btn-outline-light px-lg-4 mt-2 mt-lg-3 k" href="{{$util->toRoute($btn->route)}}" role="button" aria-pressed="true"
        style="color:#ffffff; font-size:calc(12px + 0.3vw); min-width:140px;">
        {{$btn->label}}
        </a>
        @endif

    @endforeach
    </div>

@php
if (!empty($objectHeader)){
    $backpanel = $objectHeader;
}
@endphp

@php
    if (!empty($backpanel->bgImageStorage)){
        $bgImage = $backpanel->bgImageStorage;
    }
    elseif (!empty($backpanel->bgImagePath)){
        $bgImage = $util->toImage($backpanel->bgImagePath);
    }
    elseif(!empty($backpanel->bgImage)){
        $bgImage = $util->toImage($backpanel->bgImage);
    }

@endphp
@if(!empty($backpanel) && !empty($bgImage))

<section id="backpanel">

    @if (!empty($backpanel->fadeImage) && $backpanel->fadeImage === true)
        <div class="backpanel jumbotron mb-0 p-0 shadow" style="background-image: url({{$bgImage}}); background-size:contain; padding-left:calc(1vw);padding-right:calc(1vw);">
        <div style="background-color: rgb(0,0,0,0.4)">
        <div class="container-xl px-0 text-center shadow" style="background-image: url({{$bgImage}}); background-size:cover; color:#fff; font-size:calc(0.8em + 1.3vw); line-height: 1.4; font-family: arial;height:100%;">
        <div class="py-2 py-sm-3 pt-md-4 px-2" style="background-color: rgb(0,0,0,0.4)">
    @else
        <div class="backpanel jumbotron mb-0 p-0 shadow" style="background-image: url({{$bgImage}}); background-size:contain; padding-left:calc(1vw);padding-right:calc(1vw);">
        <div class="container-xl py-2 py-sm-3 pt-md-4 text-center shadow" style="background-image: url({{$bgImage}}); background-size:cover; color:#fff; font-size:calc(0.8em + 1.3vw); line-height: 1.4; font-family: arial;height:100%;">
    @endif

        @if (!empty($backpanel->expanded) && $backpanel->expanded === true)
        <div class="p-0 p-sm-3 p-xl-4" ></div>
        @endif
        <div class="p-1 py-md-2 py-lg-3">

          {{--Bloco de imagem ------------}}
          @if (!empty($backpanel->logo))
          @php
            if (!empty($backpanel->logo->imageStorage)){
                $image = $backpanel->logo->imageStorage;
            }
            elseif (!empty($backpanel->logo->imagePath)){
                $image = $util->toImage($backpanel->logo->imagePath);
            }elseif(!empty($backpanel->logo->image)){
                $image = $util->toImage($backpanel->logo->image);
            }else{
                $image = NULL;
            }
          @endphp
          @if (!empty($image))
              @if (!empty($backpanel->logo->route))
              <a href="{{$util->toRoute($backpanel->logo->route)}}">
              <div class="py-2 pt-lg-3 pb-lg-2">
              <img src="{{$image}}" style="width:calc(170px + 3.5vw); height:calc(40px + 0.7vw);"/>
              </div>
              </a>
              @else
              <div class="py-2 pt-lg-3 pb-lg-2">
              <img src="{{$image}}" style="width:calc(170px + 3.5vw); height:calc(40px + 0.7vw);"/>
              </div>
              @endif
            @else
            <div class="p-2 p-sm-4">
            @endif
          @else
          <div class="p-4">
          @endif
          {{--Fim de bloco de imagem ------------}}

        </div>
          @if (!empty($backpanel->title))
          <div class="mb-2 mb-md-2 " style="text-shadow: #151515 2px 3px 2px;">{{$backpanel->title}}</div>
          @endif


          {{--Bloco de controle de botões--}}
          @if (!empty($backpanel->buttons))
          <div class="mb-2 mb-lg-3">
          @foreach ($backpanel->buttons as $key => $btn)
          @if ($key < 2)
            @if (!empty($btn->route))
            <a id="imagebutton" class="btn btn-outline-light btn-md px-lg-4 mt-2 mt-lg-3" href="{{$util->toRoute($btn->route)}}" role="button" aria-pressed="true"
            style="color:#fff; font-size:calc(13px + 0.2vw);min-width:140px;">
            {{$btn->label}}
            </a>
            @endif
          @endif
          @endforeach
          </div>
          @else
          <div class="p-1 p-md-2"></div>
          @endif
          {{--Fim de bloco de controle de botões --}}



          @if (!empty($backpanel->expanded) && $backpanel->expanded === true)
          <div class="pb-2 p-md-2"></div>
          @endif

    </div>
    </div>

    @if (!empty($backpanel->fadeImage) && $backpanel->fadeImage === true)
    </div>
    </div>
    @endif

    </section>

@else
    @if (!empty($sidebar->nullable) && $sidebar->nullable === true)
        <div class="text-center mt-2 mb-2"></div>
    @else
    <div class="container-xl px-3 mt-4 pb-2" translation="no">
        <div class="alert alert-primary {{$border}}" role="alert">
        <div class="content-message alert-heading" style="font-size:calc(0.85em + 0.4vw)"><strong>{{__('Message')}}!</strong></div>
        <hr class="d-none d-sm-block">
        <div class="mb-0" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.18vw);">{{ __('There are no items to display.') }}</div>
        </div>
    </div>
    @endif
@endif

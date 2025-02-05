@php
if (!empty($objectHeader)){
    $backpanel = $objectHeader;
}
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

<<<<<<< HEAD
<section id="backpanel" >

=======
<section id="backpanel">
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da
    @if (!empty($backpanel->fadeImage) && $backpanel->fadeImage === true)
    {{--@props(['bgImage'])--}}
    <x-laraflex::backpanel.fadeimage :bgImage="$bgImage" />
    {{--@nclude('laraflex::ComponentParts.backpanel.fadeimage')--}}
    @else
    {{--@props(['bgImage'])--}}
    <x-laraflex::backpanel.bgimage :bgImage="$bgImage" />
    {{--@include('laraflex::ComponentParts.backpanel.bgimage')--}}
    @endif
    <div class="p-0 p-sm-3 p-xl-4" ></div>
    <div class="p-1 py-md-2 py-lg-3">

<<<<<<< HEAD

=======
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da
    {{--logo component backpanel ====================================--}}
    @if (!empty($backpanel->logo))
    @php
        if (!empty($backpanel->logo->imageStorage)){
            $logo = $backpanel->logo->imageStorage;
        }
        elseif (!empty($backpanel->logo->imagePath)){
            $logo = $util->toImage($backpanel->logo->imagePath);
        }elseif(!empty($backpanel->logo->image)){
            $logo = $util->toImage($backpanel->logo->image);
        }else{
            $logo = NULL;
        }
        if (!empty($backpanel->logo->route)){
<<<<<<< HEAD
            $routeLogo = $util->toRoute($backpanel->logo->route);
        }else{
            $routeLogo = NULL;
        }
        if (!empty($backpanel->logo->size) && $backpanel->logo->size == strtolower('large')){
            $size = 'large';
        }else{
            $size = '';
        }
    @endphp
    @if (!empty($logo))
    {{--@props(['logo', 'route','size'])--}}
    <x-laraflex::backpanel.logo :logo="$logo" :routeLogo="$routeLogo" :size="$size" />
=======
            $route = 'a href="'.$util->toRoute($backpanel->logo->route).'"';
        }else{
            $route = NULL;
        }
    @endphp
    @if (!empty($logo))
    {{--@props(['logo', 'route'])--}}
    <x-laraflex::backpanel.logo :logo="$logo" :route="$route" />
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da
    {{--@include('laraflex::ComponentParts.backpanel.logo')--}}

    @else
    <div class="p-2 p-sm-4">
     @endif
    @else
    <div class="p-4">
    @endif
    </div>

    {{--title component backpanel =====================================--}}
    @if (!empty($backpanel->title))
        @php
            $title = $backpanel->title;
        @endphp
    {{--@props(['title'])--}}
    <x-laraflex::backpanel.title :title="$title" />
    {{--@include('laraflex::ComponentParts.backpanel.title')--}}
    @endif

    {{--buttons component backpanel ========================================--}}
    @if (!empty($backpanel->buttons))
    @php
        $buttons = $backpanel->buttons;
    @endphp
    {{--@props(['buttons'])--}}
    <x-laraflex::backpanel.buttons :buttons="$buttons" :util="$util" />
    {{--@include('laraflex::ComponentParts.backpanel.buttons')--}}
    @else
        <div class="p-1 p-md-2 mb-1 mb-sm-3"></div>
    @endif

    {{--config component--}}
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
    {{--messageNull component ContentBox ==========================================--}}
<<<<<<< HEAD
    <x-laraflex::shared.messagenull />
=======
    <x-laraflex::shered.messagenull />
>>>>>>> eb967ff9c00abb42b201820d97becc2f5e6ae0da

    @endif
@endif

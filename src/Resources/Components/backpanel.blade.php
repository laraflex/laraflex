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
if (!empty(config('laraflex.defaultconfig.transparentTheme'))){
    $tranparentTheme = config('laraflex.defaultconfig.transparentTheme');
}else{
    $tranparentTheme = false;
}


@endphp
@if(!empty($backpanel) && !empty($bgImage))

<section id="backpanel">




    @include('laraflex::ComponentParts.backpanel.bgimage')

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
            $routeLogo = $util->toRoute($backpanel->logo->route);
        }else{
            $routeLogo = NULL;
        }
        if (!empty($backpanel->logo->size) && $backpanel->logo->size == 'large'){
            $size = 'large';
        }else{
            $size = '';
        }
        //dd($size);
        @endphp

        {{--@props(['logo', 'route','size'])
        <x-laraflex::backpanel.logo :logo="$logo" :routeLogo="$routeLogo" :size="$size" />
        --}}

        @include('laraflex::ComponentParts.backpanel.logo')


    @else
    <div class="p-4"></div>
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
    {{--@props(['buttons'])--
    <x-laraflex::backpanel.buttons :buttons="$buttons" :util="$util" />
    --}}
    @include('laraflex::ComponentParts.backpanel.buttons')
    @else
        <div class="p-1 p-md-2 mb-1 mb-sm-3"></div>
    @endif
    <div class="py-2 py-sm-2 py-md-3"></div>
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
    <x-laraflex::shared.messagenull />

    @endif
@endif

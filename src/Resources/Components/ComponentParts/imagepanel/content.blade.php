{{--DICA: Extender para uso de navebar transparente =================== --}}

    @if (!empty($defaultConfig['transparentTheme']) && $defaultConfig['transparentTheme'] == true)
    <div class="d-none d-sm-block" style="height: 60px;"></div>
    @endif

    <div class="col-8 col-sm-7 col-md-8 p-lg-5 mx-auto my-4 my-sm-5">
        @if (!empty($imagePanel->title))
        <p class="display-4 fw-normal" style="{{$fontStyleColor}} {{$fontSizeTitle}} {{$fontFamilyTitle}}">{{$imagePanel->title}}</p>
        @endif
        @if (!empty($imagePanel->legend))
        <p class="lead fw-normal d-none d-sm-block" style="{{$fontStyleColor}} {{$fontSizeLegend}}">{{$imagePanel->legend}}</p>
        @endif
        @if (!empty($imagePanel->btnLabel) && !empty($imagePanel->route))
        @php
            $route = $util->toRoute($imagePanel->route);
        @endphp
        <a class="btn shadow-lg mt-sm-3 {{$btnClassStyle}}" href="{{$route}}" style="{{$fontBtn}} {{$btnColor}}">{{$imagePanel->btnLabel}}</a>
        @endif
    </div>

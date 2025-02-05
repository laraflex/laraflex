@props(['textAlign', 'title', 'text', 'btnLabel', 'btnColor', 'route', 'imagebutton', 'fontColor', 'font_family', 'font_family_title'])
<div class="carousel-caption {{$textAlign}} pxx-0 pxx-lg-2  px-xl-5 pb-2 pb-lg-3 pb-xl-5" style="{{$fontColor}}"">
    @if(!empty($title))
    <div style="{{$fontColor}} font-size:calc(0.7em + 1.8vw);{{$font_family_title}}"><span translate="no">{{$title}}</span></div>
    @endif
    @if(!empty($legend))
    @php
        $num_char = strlen($legend);
        if ($num_char > 110){
            $legend = substr($legend, 0, 115) . "...";
        }
    @endphp
    <div class="d-none d-sm-block imagepanel-shared mb-1 mb-md-2 mb-xl-3 mt-0 mt-sm-1 mt-md-2 mt-lg-3" style="{{$fontColor}};line-height:calc(0.96em + 0.9vw); font-size:calc(0.85em + 0.4vw);{{$font_family}}"><span spantranslate="no">{{$legend}}</span></div>
    @endif
    @if (!empty($btnLabel))
    <p><a class="imagepanel-shared btn mt-2 px-3 mt-0 mt-sm-2 mt-md-3 mt-lg-4 {{$btnColor}}" href="{{$route}}" id="{{$imagebutton}}" role="button">{{$btnLabel}}</a></p>
    @endif
</div>

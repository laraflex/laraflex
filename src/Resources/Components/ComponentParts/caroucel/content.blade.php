{{--content component caroucel--}}
@props(['content'])
<div class="mb-4 mb-lg-4 d-none d-md-block" style="font-size:calc(12px + 0.47vw); letter-spacing: 1px; font-family: Arial;">
{{__($content)}}
</div>
<div class="mb-2 d-none d-sm-block d-md-none" style="font-size:calc(12px + 0.47vw); letter-spacing: 1px; font-family: Arial;">
{{substr($content, 0, 80)}} ...
</div>
{{--
<div class="mb-2 d-block d-sm-none" style="font-size:calc(12px + 0.47vw); letter-spacing: 1px; font-family: Arial;">
{{substr($content, 0, 50)}} ...
</div>
--}}

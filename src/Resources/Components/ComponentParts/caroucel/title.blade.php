{{--title component coreoucel--}}
@props(['title', 'route'])
@if(!empty($route))
<a href="{{$route}}" style="color:#FFF; text-shadow: 1px 1px 2px gray;">
<div class="mb-3 mt-0" style="font-size:calc(0.9em + 1.0vw); line-height: 1.4; letter-spacing: 2px; font-family: Arial;height:100%;">
<strong>{{__($title)}}</strong>
</div>
</a>
@else
<div class="mb-3 mt-0" style="font-size:calc(0.9em + 1.0vw); line-height: 1.4; letter-spacing: 2px; font-family: Arial;height:100%;">
<strong>{{__($title)}}</strong>
</div>
@endif

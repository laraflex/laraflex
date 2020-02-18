@if (!empty($objeto))
    @php
        $contentEditor = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $contentEditor = $object;
    @endphp
@endif

@if (!empty($contentEditor))
<section id="contentEditor">
<div class="pb-4 p-3 mb-4 mt-4 {{$border}} hiflex">
<div class="pt-2 pb-3 text-center">
    @if (!empty($contentEditor->title))
     <h3 class="d-none d-sm-block font-weight-normal"> {{$contentEditor->title}}</h3>
     <h4 class="d-block d-sm-none font-weight-normal"> {{$contentEditor->title}}</h4>
    @endif
    @if (!empty($contentEditor->legend))
        <div><small style="color:gray">{{$contentEditor->legend}}</small></div>
    @endif

</div>
@php
    $route = $util->toRoute($contentEditor->action);
@endphp

<form method="{{$contentEditor->method}}" action="{{$route}}" id="{{$contentEditor->id}}">
    <div class="form-group">
    <label for="exampleInputEmail1">Título</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="titulo" >
    <small id="emailHelp" class="form-text text-muted">Digite o título para este documento.</small>
    </div>





</form>
</div>
</section>
@else
<div class="text-center p-4 mt-3 mb-3 {{$border}}">
<h5>{{ __('There is no content to display.') }}</h5>
</div>
@endif

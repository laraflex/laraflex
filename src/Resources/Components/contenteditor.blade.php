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
<div class="container-xl px-3 mt-4 pb-2" translation="no">
    <div class="alert alert-primary {{$border}}" role="alert">
    <div class="content-message alert-heading" style="font-size:calc(0.85em + 0.4vw)"><strong>{{__('Message')}}!</strong></div>
    <hr class="d-none d-sm-block">
    <div class="mb-0" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.18vw);">{{ __('There are no items to display.') }}</div>
    </div>
</div>
@endif

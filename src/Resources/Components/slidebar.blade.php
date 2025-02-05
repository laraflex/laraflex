@if (!empty($objeto))
    @php
        $slidebar = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $slidebar = $object;
    @endphp
@endif
@if (!empty($slidebar) && !empty($slidebar->items))
    @php
    if (!empty($slidebar->fontFamily->title)){
        $font_family_title = 'font-family:'.$slidebar->fontFamily->title .';';
    }else{
        $font_family_title = '';
    }
    if (!empty($slidebar->fontFamily->shared)){
        $font_family = 'font-family:'.$slidebar->fontFamily->shared .';';
    }else{
        $font_family = '';
    }
    @endphp
@if (!empty($objectConfig->onePage) && $objectConfig->onePage === true)
    <section id="slidebar" class="m-0 p-0 mx-0 pb-2 pb-sm-3 pt-1 pt-sm-2">
@else
    <section id="slidebar" class="m-0 p-0 mx-0 pb-2 pb-sm-2 pt-1 pt-sm-3">
@endif
<div class="container-xl px-0">
<div class="mx-0 mb-0 pt-sm-2 px-2 px-lg-3 px-xl-0 pb-3">

   {{--@props(['util','items','border'])--}}
   @php
       if(!empty($slidebar->title)){
          $title = $slidebar->title;
       }else{
           $title = NULL;
       }
       if (!empty($slidebar->legend)){
           $legend = $slidebar->legend;
       }else{
           $legend = NULL;
       }
       if (!empty($slidebar->position)){
           $position = "text-" . $slidebar->position;
       }else{
           $position = "text-center";
       }
   @endphp
    {{--TITLE COMPONENT SLIDEBAR =============================================--}}
    {{--@props(['title','legend','position','font_family_title','font_family' ])--}}
    <x-laraflex::slidebar.title :title="$title" :legend="$legend" :position="$position" :font_family_title="$font_family_title" :font_family="$font_family" />
:
    <div id="js_variablewidth" class="slider js_variablewidth variablewidth p-0 mb-0 mt-0 mt-sm-1">
    {{--SLIDES COMPONENT SLIDEBAR =============================================--}}
    @if (!empty($slidebar->items))
    @php
        $items = $slidebar->items;
    @endphp
    {{--@props(['util','items','border'])--}}
    <x-laraflex::slidebar.slides :util="$util" :items="$items" :border="$border" />

    @endif
    <span class="js_prev prev mr-0 pr-0 "><span class="badge badge-pill badge-light" style="background-color:rgb(255,255,255,0.6)">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 501.5 501.5"><g><path fill="#2E435A" d="M302.67 90.877l55.77 55.508L254.575 250.75 358.44 355.116l-55.77 55.506L143.56 250.75z"/></g></svg></span>
    </span>
    <span class="js_next next mr-0 pr-0"><span class="badge badge-pill badge-light" style="background-color:rgb(255,255,255,0.6)">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 501.5 501.5"><g><path fill="#2E435A" d="M199.33 410.622l-55.77-55.508L247.425 250.75 143.56 146.384l55.77-55.507L358.44 250.75z"/></g></svg></span>
    </span>
    </div>
@if (!empty($slidebar->paginate))
<div id="default-paginator" class="text-center nav justify-content-center pt-sm-2" aria-label="Page" translator>
{!!$slidebar->paginate->links()!!}
</div>
@endif
</div>
</div>
{{--Icon de retorno ao topo da página--}}
@if (!empty($objetoConfig->onePage) && $objetoConfig->onePage === true)
<div class="w-100 pb-sm-3 d-none d-sm-block pl-5 container-xl">
    <a href="#top">
    <img src="{{$util->toImage('local/images/icons', 'setadupla.png')}}" width="26" height="26" class="float-left rounded d-block">
    </a>
    </div>
@endif
{{--End Icon de retorno ao topo da página--}}
</section>
@else
@if (!empty($slidebar->nullable) && $slidebar->nullable === true)
    <div class="text-center mt-2 mb-2"></div>
@else
{{--messageNull component Blogcardes ==========================================--}}
<x-laraflex::shared.messagenull />

@endif
@endif

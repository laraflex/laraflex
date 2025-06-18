@if (!empty($coments->items))
<section id="coments" class="m-0 p-0 mx-0 pb-3 pt-2 pb-md-3">
<div class="container-xl px-0">
<div class="mx-0 mb-0 mt-1 px-0">
@php
    if (!empty($contentbox->fontFamily->shared)){
        $font_family = 'font-family:'.$contentbox->fontFamily->shared;
    }else{
        $font_family = "teste ";
    }
    if (!empty($contentbox->comentResponse)){
        $comentResponse = $contentbox->comentResponse;
    }
@endphp

<div class="m-0 p-0 {{$border}}">
<ul class="list-unstyled pt-3 px-2 px-xl-0 ps-3 ps-xl-3">

    @foreach($coments->items as $key => $item)
    {{--FIRST LEVEL LOPING ===============================================--}}
    @php
        // NIVEL ONE CONFIG ===============================
        if (!empty($item->coment)){
            $coment = $item->coment;
        }else{
            $coment = NULL;
        }
        if (!empty($item->user->sex)){
            $sexo = strtoupper($item->user->sex);
        }
        elseif(!empty($item->user->sexo)){
            $sexo = strtoupper($item->user->sexo);
        }
        else{
            $sexo = 'M';
        }
        $style = 'rounded';
        if (!empty($item->user->photoStorage)){
            $photo = $item->user->photoStorage;
        }
        elseif (!empty($item->user->photoPath)){
            $photo = $util->toImage($item->user->photoPath);
        }elseif(!empty($item->user->photo)){
            $photo = $util->toImage($item->user->photo);
        }elseif($sexo == 'F'){
            $photo = $util->toImage('local/images/users', 'perfil2.png');
            $style = '';
        }else{
            $photo = $util->toImage('local/images/users', 'perfil1.png');
            $style = '';
        }
        if (!empty($item->user->name)){
            $name = $item->user->name;
        }else{
            $name = NULL;
        }
        if (!empty($item->date)){
            $date = $item->date;
        }else{
            $date = NULL;
        }
        if (!empty($item->id)){
            $id = $item->id;
        }else{
            $id = '';
        }
        $margin = '';
        if (!empty($contentbox->comentResponse)){
            $comentResponse = $contentbox->comentResponse;
        }



    @endphp
    {{--@props(['margin', 'photo', 'style', 'name', 'date', 'coment', 'id', 'comentResponse', 'font_family'])--}}
    {{--<x-laraflex::coment.coment :margin="$margin" :photo="$photo" :style="$style" :name="$name" :date="$date" :coment="$coment" :id="$id" :comentResponse="$comentResponse" :font_family="$font_family" />--}}

    @include('laraflex::ComponentParts.coment.coment');

    @if(!empty($item->coments))

    @foreach($item->coments as $k => $item)
    {{--SECOND LEVEL LOPING =============================================--}}
        @php
        // SECOND NIVEL CONFIG ================================
        if (!empty($item->coment)){
            $coment = $item->coment;
        }else{
            $coment = NULL;
        }
        if (!empty($item->user->sex)){
            $sexo = strtoupper($item->user->sex);
        }
        elseif(!empty($item->user->sexo)){
            $sexo = strtoupper($item->user->sexo);
        }
        else{
            $sexo = 'M';
        }
        $style = 'rounded';
        if (!empty($item->user->photoStorage)){
            $photo = $item->user->photoStorage;
        }
        elseif (!empty($item->user->photoPath)){
            $photo = $util->toImage($item->user->photoPath);
        }elseif(!empty($item->user->photo)){
            $photo = $util->toImage($item->user->photo);
        }elseif($sexo == 'F'){
            $photo = $util->toImage('local/images/users', 'perfil2.png');
            $style = '';
        }else{
            $photo = $util->toImage('local/images/users', 'perfil1.png');
            $style = '';
        }
        if (!empty($item->user->name)){
            $name = ucwords($item->user->name);
        }else{
            $name = NULL;
        }
        if (!empty($item->date)){
            $date = $item->date;
        }else{
            $date = NULL;
        }
        if (!empty($item->id)){
            $id = $item->id;
        }else{
            $id = '';
        }
        $margin = 'ms-4 ms-lg-5';
        $comentResponse = false;
    @endphp
        {{--@props(['margin', 'photo', 'style', 'name', 'date', 'coment', 'id', 'comentResponse', 'font_family'])--}}
        {{--<x-laraflex::coment.coment :margin="$margin" :photo="$photo" :style="$style" :name="$name" :date="$date" :coment="$coment" :id="$id" :comentResponse="$comentResponse" :font_family="$font_family" /> --}}

        @include('laraflex::ComponentParts.coment.coment');

    @endforeach
    @endif
   @endforeach
</ul>
</div>

</div>
</div>
<section>
@endif

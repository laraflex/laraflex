@if (!empty($coments->items))
<section id="coments" class="m-0 p-0 mx-0 pb-3 pt-2 pb-md-3">
<div class="container-xl px-0">
<div class="mx-0 mb-0 mt-1 px-0">

<div class="p-4 {{$border}}">
<ul class="list-unstyled pt-3 pl-1 pr-2 pr-sm-3 pr-lg-4">

    @foreach($coments->items as $key => $item)
    @php
        if (!empty($item->user->sex)){
            $sexo = strtoupper($item->user->sex);
        }
        elseif(!empty($item->user->sexo)){
            $sexo = strtoupper($item->user->sexo);
        }
        else{
            $sexo = 'M';
        }
        if (!empty($item->user->photoStorage)){
            $photo = $item->user->photoStorage;
        }
        elseif (!empty($item->user->photoPath)){
            $photo = $util->toImage($item->user->photoPath);
        }elseif(!empty($item->user->photo)){
            $photo = $util->toImage($item->user->photo);
        }elseif($sexo == 'F'){
            $photo = $util->toImage('images/users', 'perfil2.png');
        }else{
            $photo = $util->toImage('images/users', 'perfil1.png');
        }
    @endphp
    <li class=" pb-2 pb-sm-3">
    <div class="row">
    <div class="col-0 col-sm-1 m-0">
    <img src="{{$photo}}" class="m-0 img-fluid mx-auto d-none d-sm-block" alt="..." style="max-width:50px; max-height:50px;">
    </div>
    <div class="media-bodyx col-12 col-sm-11 m-0 p-0 pl-sm-3 pl-lg-0">

    {{---------------------------------------------}}
    <img src="{{$photo}}" class="m-0 img-fluid m-2 d-block d-sm-none float-left" alt="..." style="max-width:40px; max-height:40px;">
    <div class="mt-0 mb-1">
    @if (!empty($item->user->name))
        <b><span class="" style="line-height:calc(0.8em + 0.8vw); font-size:calc(0.75em + 0.2vw);">{{ucfirst($item->user->name)}}</span></b>
    @endif
    @if (!empty($item->date))
        <span class="ml-2 ml-md-3" style="line-height:calc(0.8em + 0.8vw); font-size:calc(0.75em + 0.2vw);"><small>{{$item->date}}</small></span>
    @endif
    </div>
    {{---------------------------------------------}}
    @php
        if (!empty($contentbox->fontFamily->shared)){
            $font_family = 'font-family:'.$contentbox->fontFamily->shared;
        }else{
            $font_family = "teste ";
        }
    @endphp
    <div class="coment-shared text-justify prxxx-xl-3" style="line-height:calc(0.8em + 0.8vw); font-size:calc(0.75em + 0.2vw);{{$font_family}}">
        {!!$item->coment!!}</div>

    @if(!empty($contentbox->comentResponse) && $contentbox->comentResponse === true)
    <button type="button" class="btn btn-link mb-0" data-toggle="modal" data-target="#comentModal" data-id="{{$item->id}}">{{__('Reply')}}</buttom>
    @endif

    </div>
    </div>
    </li>
    @if(!empty($item->coments))

    @foreach($item->coments as $k => $item)
        @php
            if (!empty($item->user->sexo)){
                $sexo = strtoupper($item->user->sexo);
            }
            elseif(!empty($item->user->sex)){
                $sexo = strtoupper($item->user->sex);
            }
            else{
                $sexo = 'M';
            }
            if (!empty($item->user->photoStorage)){
                $photo = $item->user->photoStorage;
            }
            elseif (!empty($item->user->photoPath)){
                $photo = $util->toImage($item->user->photoPath);
            }elseif(!empty($item->user->photo)){
                $photo = $util->toImage($item->user->photo);
            }elseif($sexo == 'F'){
                $photo = $util->toImage('images/users', 'perfil2.png');
            }else{
                $photo = $util->toImage('images/users', 'perfil1.png');
            }

        @endphp
    <li class="pb-2 pb-sm-3 ml-4 ml-lg-5">
    <div class="row">
        <div class="col-0 col-sm-1 m-0">
    <img src="{{$photo}}" class="m-0 img-fluid mx-auto d-none d-sm-block" alt="..." style="max-width:50px; max-height:50px;">
    </div>
    <div class="media-bodyx col-12 col-sm-11 m-0 p-0 pl-sm-3 pl-lg-0">

    {{---------------------------------------------}}
    <img src="{{$photo}}" class="m-0 img-fluid m-2 d-block d-sm-none float-left" alt="..." style="max-width:40px; max-height:40px;">
    <div class="mt-0 mb-1">
    @if (!empty($item->user->name))
        <b><span class="" style="line-height:calc(0.8em + 0.8vw); font-size:calc(0.75em + 0.2vw);">{{ucfirst($item->user->name)}}</span></b>
    @endif
    @if (!empty($item->date))
        <span class="ml-2 ml-md-3" style="line-height:calc(0.8em + 0.8vw); font-size:calc(0.75em + 0.2vw);"><small>{{$item->date}}</small></span>
    @endif
    </div>
    {{---------------------------------------------}}
    <div class="coment-shared text-justify pr-0 prxx-xl-3" style="line-height:calc(0.8em + 0.8vw); font-size:calc(0.75em + 0.2vw);{{$font_family}}">
    {!!$item->coment!!}</div>
    </div>
    </div>
    </li>
    @endforeach
    @endif
    @endforeach
</ul>
</div>

</div>
</div>
<section>
@endif

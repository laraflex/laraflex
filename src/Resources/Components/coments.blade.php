@if (!empty($coments->items))
<div class="p-4 mb-4 hiflexxxx {{$border}}">
<ul class="list-unstyled pt-3 pl-1 pr-2 pr-sm-3 pr-lg-4">

    @foreach($coments->items as $key => $item)
    @php
        if (!empty($item->sexo)){
            $sexo = strtoupper($item->sexo);
        }else{
            $sexo = 'M';
        }

        if (!empty($item->photo) &&  !empty($coments->userPath)){
            $photo = $util->toImage($coments->userPath, $item->photo);
        }elseif($sexo == 'F'){
            $photo = $util->toImage('images/users', 'perfil2.png');
        }else{
            $photo = $util->toImage('images/users', 'perfil1.png');
        }
    @endphp
    <li class=" pb-3">
    <div class="row">
    <div class="col-0 col-sm-1 m-0">
    <img src="{{$photo}}" class="m-0 img-fluid mx-auto d-none d-sm-block" alt="..." style="max-width:50px; max-height:50px;">
    </div>
    <div class="media-bodyx col-12 col-sm-11 m-0 p-0 pl-sm-3 pl-lg-0 prxx-2">

    {{---------------------------------------------}}
    <img src="{{$photo}}" class="m-0 img-fluid m-2 d-block d-sm-none float-left" alt="..." style="max-width:40px; max-height:40px;">
    <div class="mt-0 mb-1">
    @if (!empty($item->userName))
        <b><span class="" style="font-size:90%">{{$item->userName}}</span></b>
    @endif
    @if (!empty($item->date))
        <span class="ml-3" style="font-size:80%">{{$item->date}}</span>
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
    <div class="coment-shared text-justify prxxx-xl-3" style="line-height: 1.3; font-size:calc(0.82em + 0.15vw);{{$font_family}}">{!!$item->coment!!}</div>

    @if(!empty($contentbox->comentResponse) && $contentbox->comentResponse === true)
    <button type="button" class="btn btn-link mb-0" data-toggle="modal" data-target="#comentModal" data-id="{{$item->id}}">{{__('Reply')}}</buttom>
    @endif

    </div>
    </div>
    </li>
    @if(!empty($item->coments))

    @foreach($item->coments as $k => $item)
        @php
            if (!empty($item->sexo)){
                $sexo = strtoupper($item->sexo);
            }else{
                $sexo = 'M';
            }
            if (!empty($item->photo)){
                $photo = $util->toImage('storage/images/users/perfil', $item->photo);
            }elseif($sexo == 'F'){
                $photo = $util->toImage('images/users', 'perfil2.png');
            }else{
                $photo = $util->toImage('images/users', 'perfil1.png');
            }

        @endphp
    <li class="pb-4 ml-4 ml-lg-5 ">
    <div class="row">
        <div class="col-0 col-sm-1 m-0 p-2 borderxx">
    <img src="{{$photo}}" class="m-0 img-fluid mx-auto d-none d-sm-block" alt="..." style="max-width:50px; max-height:50px;">
    </div>
    <div class="media-bodyx col-12 col-sm-11 m-0 p-0 pl-sm-3 pl-lg-0 pr-2xxx">

    {{---------------------------------------------}}
    <img src="{{$photo}}" class="m-0 img-fluid m-2 d-block d-sm-none float-left" alt="..." style="max-width:40px; max-height:40px;">
    <div class="mt-0 mb-1">
    @if (!empty($item->userName))
        <b><span class="" style="font-size:90%">{{$item->userName}}</span></b>
    @endif
    @if (!empty($item->date))
        <span class="ml-3" style="font-size:80%">{{$item->date}}</span>
    @endif
    </div>
    {{---------------------------------------------}}
    <div class="coment-shared text-justify pr-0 prxx-xl-3" style="line-height: 1.3; font-size:calc(0.85em + 0.15vw);{{$font_family}}">{!!$item->coment!!}</div>
    </div>
    </div>
    </li>
    @endforeach
    @endif
    @endforeach
</ul>
</div>
@endif

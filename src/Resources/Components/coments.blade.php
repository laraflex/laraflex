@if (!empty($coments->items))

<div class="p-4 mb-4 hiflex {{$border}}">
<ul class="list-unstyled pt-3">
    @foreach($coments->items as $item)
    @php
        $sexo = strtoupper($item->sexo);
        if (!empty($item->photo)){
            $photo = $util->toImage('storage/images/users/perfil', $item->photo);
        }elseif($sexo == 'F'){
            $photo = $util->toImage('images/users', 'perfil2.png');
        }else{
            $photo = $util->toImage('images/users', 'perfil1.png');
        }
    @endphp
    <li class="media pb-3">
    <img src="{{$photo}}" class="mr-3" alt="..." style="width:50px; height:50px;">
    <div class="media-body">
    <div class="mt-0 mb-1">{{$item->author}}<small class="ml-3">{{$item->date}}</small></div>
    <div class="d-none d-sm-block">{{$item->coment}}</div>
    <div class="d-block d-sm-none"><small>{{$item->coment}}</small></div>
    @if($contentbox->comentInsert === true)
    <button type="button" class="btn btn-link mb-0" data-toggle="modal" data-target="#addResponseModal" data-whatever="{{$item->id}}">{{__('Reply')}}</buttom>
    @endif
    </div>
    </li>
    @if(!empty($item->coments))
    @foreach($item->coments as $item)
        @php
            $sexo == strtoupper($item->sexo);
            if (!empty($item->photo)){
                $photo = $util->toImage('storage/images/users/perfil', $item->photo);
            }elseif($sexo == 'F'){
                $photo = $util->toImage('images/users', 'perfil2.png');
            }else{
                $photo = $util->toImage('images/users', 'perfil1.png');
            }
        @endphp
    <li class="media pb-3 ml-5">
    <img src="{{$photo}}" class="mr-3" alt="..." style="width:50px; height:50px;">
    <div class="media-body">
    <div class="mt-0 mb-1">{{$item->author}}<small class="ml-3">{{$item->date}}</small></div>
    <div class="d-none d-sm-block">{{$item->coment}}</div>
    <div class="d-block d-sm-none"><small>{{$item->coment}}</small></div>
    </div>
    </li>
    @endforeach
    @endif
    @endforeach
</ul>
</div>
@endif

@if (!empty($objeto))
    @php
        $table = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $table = $object;
    @endphp
@endif

@if (!empty($table))
    @php
        /* Definição de fontes a serem usadas */

        if (!empty($table->fontFamily->title)){
            $font_family_title = 'font-family:'.$table->fontFamily->title;
        }else{
            $font_family_title = '';
        }
        if (!empty($table->fontFamily->shared)){
            $font_family = 'font-family:'.$table->fontFamily->shared;
        }else{
            $font_family = '';
        }

        /**
         * Retifica valores de Caption para a tabela
         * */
        $caption = array();
        if (!empty($table->caption))
        {
            foreach ($table->showItems as $key => $item)
            {
                if (!property_exists($table->caption, $item))
                {
                    $caption[$key] = ucfirst($item);
                }else{
                    $caption[$key] = $table->caption->$item;
                }
            }
        }else{
            foreach ($table->showItems as $key => $item){
                $caption[$key] = ucfirst($item);
            }
        }
        $td_height = 'py-1';
    @endphp

<section id="table" class="mt-4">
    <div class="d-none d-sm-block p-2 p-3 mb-4 mt-3 {{$border}}">
    <div class="text-center">
        <div class="mb-3" style="font-size:calc(0.85em + 0.6vw);line-height:calc(14px + 1.3vw);{{$font_family_title}}">{{$table->title}}</div>
    </div>

    <table class="table table-sm table-bordered table-responsive-sm" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.17vw);">
    @if (!empty($paginate))
    @if ($paginate->lastPage() > 1)
    <caption>Página {{$paginate->currentPage()}} de um total de {{$paginate->lastPage()}} páginas</caption>
    @else
    <caption>Página {{$paginate->currentPage()}} de um total de {{$paginate->lastPage()}} página</caption>
    @endif
    @endif
    <thead>
    <tr class="bg-light">
    @foreach ($table->showItems as $key => $item)
    <th class="p-1 px-2" scope="col">{{$caption[$key]}}</th>
    @endforeach
    {{--Adição de coluna na tablea para ações do tipo [editar, deletar]--}}
    @if (!empty($table->action))
    @php
    $td_height = 'py-2';
    @endphp
    <th class="p-1 px-2" scope="col" class="text-center">{{ucfirst($table->action)}}</th>
    @endif
    {{-------------------------------------------------------------------}}
    </tr>
    </thead>
    <tbody style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.82em + 0.10vw);">
    {{--Definição de [ítens da tabela--}}
    @if (!empty($table->items))
    @foreach ($table->items as $index => $item)
    <tr>
     @foreach ($item as $key => $fieldValue)
    @if (in_array($key, $table->showItems))
    @if ($key == $table->link)
    <td class="{{$td_height}} px-2 "><a href="{{$util->toRoute($table->route, $item->id)}}" style="font-family:verdana;color:#0040FF">{{$fieldValue}}</a></td>
    @else
    <td class="{{$td_height}} px-2 ">{{$fieldValue}}</td>
    @endif
    @endif
    @endforeach

    {{-- Com controle de acesso ---------------------------------}}
    {{--O atributo itemsPermission retorna um conjunto de itens que o usuário tem permissão--}}
    @if (!empty($table->action))

        @if (property_exists($table, 'itemsPermission'))
        @php
            if (!empty($table->optionalId)){
                $id = $table->optionalId;
            }else{
                $id = 'id';
            }
        $arrayPosts = array();
        foreach($table->itemsPermission as $itemModel){
                $arrayPosts[] = $itemModel->$id;
        }

        @endphp
            @if (in_array($item->id, $arrayPosts))
            <td><a href="{{$util->toRoute($table->actionRoute, $item->id)}}">
            <img src="{{url('images/icons/edit.jpg')}}" alt="{{$table->action}}" class="mx-auto d-block" style="width:calc(22px + 0.6vw);height:calc(22px + 0.5vw);">
            </a></td>
            @else
            <td></td>
            @endif
        @else
        <td><a href="{{$util->toRoute($table->actionRoute, $item->id)}}">
        <img src="{{url('images/icons/edit.jpg')}}" alt="{{$table->action}}" class="mx-auto d-block" style="width:calc(22px + 0.6vw);height:calc(22px + 0.5vw);">
        </a></td>
        {{--
        <td></td>
        --}}
        @endif
    @endif
    {{--Fim de rotina de controle de acesso -----------------------}}
    </tr>
    @endforeach
    @endif
    </tbody>
    </table>
    {{--$paginate--------------------------------------}}
    @if (!empty($table->paginate))
    <div class="text-center nav justify-content-center">
    {!!$table->paginate->links()!!}
    @endif
    </div>
</div>
</section>
{{--8888888888888888888888888888888888888888888888888888888888--}}
<section>
    <div class="d-block d-sm-none">
    <div class="text-center">
    <h6 class="mb-3">{{$table->title}}</h6>
    </div>

    @foreach ($table->items as $item)
    <div class="p-2 mb-1 {{$border}}">
    @foreach ($item as $key => $value)
    @if (in_array($key, $table->showItems))
    @if ($table->link == $key)
    <div class="ml-1" style="font-size:90%;line-height:1.3"><strong><a href="{{$util->toRoute($table->route, $item->id)}}">{{$value}}</a></strong></div>
    @else
    <div class="ml-1" style="font-size:80%;line-height:1.2">{{$value}}</div>
       @endif
       @endif
    @endforeach
    {{-- Com controle de acesso ---------------------------------}}
    {{--O atributo itemsPermission retorna um conjunto de itens que o usuário tem permissão--}}
    @if (!empty($table->action))

        @if (property_exists($table, 'itemsPermission'))
        @php
            if (!empty($table->optionalId)){
                $id = $table->optionalId;
            }else{
                $id = 'id';
            }
        $arrayPosts = array();
        foreach($table->itemsPermission as $itemModel){
                $arrayPosts[] = $itemModel->$id;
        }

        @endphp
            @if (in_array($item->id, $arrayPosts))
            <div class="text-left pt-2 pl-2"><a href="{{$util->toRoute($table->actionRoute, $item->id)}}">
                <img src="{{url('images/icons/edit.jpg')}}" alt="{{$table->action}}" class="float-left d-block pb-1" style="width:calc(28px + 0.6vw);height:calc(28px + 0.5vw);">
                <span class="ml-2" style="font-size:90%;line-height:1.3"><strong>{{ucfirst($table->action)}}</strong></span>
            </a></div>
            @endif
        @else
        <div class="text-left pt-2 pl-2"><a href="{{$util->toRoute($table->actionRoute, $item->id)}}">
            <img src="{{url('images/icons/edit.jpg')}}" alt="{{$table->action}}" class="float-left d-block pb-1" style="width:calc(28px + 0.6vw);height:calc(28px + 0.5vw);">
            <span class="ml-2" style="font-size:90%;line-height:1.3"><strong>{{ucfirst($table->action)}}</strong></span>
        </a></div>
        {{--
        <td></td>
        --}}
        @endif
    @endif
    {{--Fim de rotina de controle de acesso -----------------------}}
    {{--O atributo itemsPermission retorna um conjunto de itens que o usuário tem permissão--}}
    {{-- Com controle de acesso
    @if (!empty($table->action))
        @if (!empty($table->itemsPermission))
        @php
            $access = false;
            $itemsAccess = $table->itemsPermission;
            foreach($itemsAccess as $key => $itemModel){
                if ($item->id == $itemModel->id){
                    $access = true;
                }
            }
            $route = $table->route . '/' . strtolower($table->action) . '/';
        @endphp
            @if ($access === true)
            <div class="text-left pt-2 pl-2"><a href="{{$util->toRoute($table->actionRoute, $item->id)}}">
                <img src="{{url('images/icons/edit.jpg')}}" alt="{{$table->action}}" class="float-left d-block pb-1" style="width:calc(28px + 0.6vw);height:calc(28px + 0.5vw);">
                <span class="ml-2" style="font-size:90%;line-height:1.3"><strong>{{ucfirst($table->action)}}</strong></span>
            </a></div>
            @endif
        @else
        <div class="text-left pt-2 pl-2"><a href="{{$util->toRoute($table->actionRoute, $item->id)}}">
            <img src="{{url('images/icons/edit.jpg')}}" alt="{{$table->action}}" class="float-left d-block pb-1" style="width:calc(28px + 0.6vw);height:calc(28px + 0.5vw);">
            <span class="ml-2" style="font-size:90%;line-height:1.3"><strong>{{ucfirst($table->action)}}</strong></span>
        </a></div>
        @endif
    @endif
    {{---------------------------------------}}
    {{--Fim de rotina -----------------------}}
</div>
@endforeach
{{--$paginate--------------------------------------}}
@if (!empty($table->paginate))
<div class="text-center nav justify-content-center">
     {!!$table->paginate->links()!!}
</div>
@endif
</div>
</section>

@endif


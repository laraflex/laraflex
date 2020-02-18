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
        /**
         * Retifica valores de Caption para a tabela
         * */
        $caption = array();
        if (!empty($table->caption))
        {
            foreach ($table->showItems as $key => $item)
            {
                if (!array_key_exists($item, $table->caption))
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
    @endphp

<section id="table" class="mt-4">
    <div class="d-none d-sm-block p-2 p-3 mb-4 mt-3 {{$border}} hiflex">
    <div class="text-center">
        <h3 class="mb-3">{{$table->title}}</h3>
    </div>

    <table class="table table-sm table-bordered table-responsive-sm">
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
    <th scope="col">{{$caption[$key]}}</th>
    @endforeach
    {{--Adição de coluna na tablea para ações do tipo [editar, deletar]--}}
    @if (!empty($table->action))
    <th scope="col" class="text-center">{{ucfirst($table->action)}}</th>
    @endif
    {{-------------------------------------------------------------------}}
    </tr>
    </thead>
    <tbody>
    {{--Definição de [ítens da tabela--}}
    @if (!empty($table->items))
    @foreach ($table->items as $index => $item)
    <tr>
     @foreach ($item as $key => $fieldValue)
    @if (in_array($key, $table->showItems))
    @if ($key == $table->link)
    <td><a href="{{$util->toRoute($table->route, $item->id)}}">{{$fieldValue}}</a></td>
    @else
    <td>{{$fieldValue}}</td>
    @endif
    @endif
    @endforeach
    {{--O atributo permission retorna um conjunto de itens que o usuário tem permissão--}}
    {{-- Com controle de acesso --}}
    @if (!empty($table->action))
    @if (!empty($table->permission))
    @php
    $access = false;
    $itemsAccess = $table->permission;
    foreach($itemsAccess as $key => $itemModel){
        if ($item->id == $itemModel->id){
            $access = true;
        }
    }
    @endphp
    @if ($access === true)
    <td><a href="{{$util->toRoute($table->actionRoute, $item->id)}}">
    <img src="{{url('images/icons/edit.jpg')}}" alt="{{$table->action}}" class="mx-auto d-block" style="width:30px;height:30px;">
    </a></td>
    @else
    <td></td>
    @endif
    @else
    <td></td>
    @endif
    @endif
    {{--Fim de rotina -----------------------}}
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
    <div class="d-block d-sm-none hiflex">
    <div class="text-center">
    <h4 class="mb-3">{{$table->title}}</h4>
    </div>
     {{----------------------------------------}}
     @if(!empty($tableMessage))
     <h6 class="pb-2 text-center">{{$tableMessage}}</h6>
     @endif
     @if(!empty($tableAlert))
     @php
     $alertColor = 'alert-primary';
     $color = array('primary', 'secundary', 'success', 'danger', 'warning', 'info', 'light', 'dark');
     if($colorTmp = stristr($tableAlert, ':')){
     $tableAlert =  str_replace($colorTmp, '', $tableAlert);
     $colorTmp = str_replace(':', '', $colorTmp);
     if(in_array($colorTmp, $color)){
     $alertColor = 'alert-' . $colorTmp;
     }
     }
     @endphp
     <div class="alert {{$alertColor}}" role="alert">
     {{$tableAlert}}
     </div>
     @endif
     {{-------------------------------------------}}
    @foreach ($table->items as $item)
    <div class="p-2 mb-1 {{$border}}">
    @foreach ($item as $key => $value)
    @if (in_array($key, $table->showItems))
    @if ($table->link == $key)
    <div class="ml-1"><strong><a href="{{$util->toRoute($table->route, $item->id)}}">{{$value}}</a></strong></div>
    @else
    <div class="ml-1" style="font-size:90%">{{$value}}</div>
       @endif
       @endif
    @endforeach
    {{--O atributo permission retorna um conjunto de itens que o usuário tem permissão--}}
    {{-- Com controle de acesso --}}
    @if (!empty($table->action))
    @if (!empty($table->permission))
    @php
        $access = false;
        $itemsAccess = $table->permission;
        foreach($itemsAccess as $key => $itemModel){
            if ($item->id == $itemModel->id){
                $access = true;
            }
        }
        $route = $table->route . '/' . strtolower($table->action) . '/';
    @endphp
    @if ($access === true)
    <td><a href="{{$util->toRoute($route, $item->id)}}">{{ucfirst($table->action)}}</a></td>
    @else
    <td></td>
    @endif
    @else
    <td></td>
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


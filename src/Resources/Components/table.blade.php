@if (!empty($objeto))
    @php
        $table = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $table = $object;
    @endphp
@endif
@if (!empty($table) && $table->showItems)
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
        $borderMobilie = true;
        if (!empty($table->styleTable)){
            $table->styleTable = strtolower($table->styleTable);
            if ($table->styleTable == 'light'){
                $styleTable = ['head' => '#D8D8D8', 'line' => '#D8D8D8', 'hColor' => '#000', 'lineColor' => '#1C1C1C', 'legend' => '#F2F2F2', 'badge' => '#F2F2F2'];
            }elseif($table->styleTable == 'navyblue'){
                $borderMobilie = false;
                $styleTable = ['head' => '#336699', 'line' => '#CCE5FF', 'hColor' => '#FAFAFA', 'lineColor' => '#336699', 'legend' => '#1C2A51', 'badge' => '#F2F2F2'];
            }elseif($table->styleTable == 'blue'){
                $styleTable = ['head' => '#7895C1', 'line' => '#F2F2F2', 'hColor' => '#FFFFFF', 'lineColor' => '#336699', 'legend' => '#354F76', 'badge' => '#F2F2F2'];
            }elseif($table->styleTable == 'brown'){
                $borderMobilie = false;
                $styleTable = ['head' => '#8D7A5E', 'line' => '#F5F0E8', 'hColor' => '#FFFFFF', 'lineColor' => '#4B442A', 'legend' => '#4C3A26', 'badge' => '#F2F2F2'];
            }elseif($table->styleTable == 'lightbrown'){
                $styleTable = ['head' => '#E1DACD', 'line' => '#FAF9F7', 'hColor' => '#402F1D', 'lineColor' => '#4B442A', 'legend' => '#A59A86', 'badge' => '#F2F2F2'];
            }elseif($table->styleTable == 'marine'){
                $borderMobilie = false;
                $styleTable = ['head' => '#438C9B', 'line' => '#CBE3E7', 'hColor' => '#F2F2F2', 'lineColor' => '#1E3D40', 'legend' => '#3A727E', 'badge' => '#F2F2F2'];
            }elseif($table->styleTable == 'bordeaux'){
                $styleTable = ['head' => '#6E6E6E', 'line' => '#F2F2F2', 'hColor' => '#FFFFFF', 'lineColor' => '#7B0B00', 'legend' => '#800001', 'badge' => '#F2F2F2'];
            }elseif($table->styleTable == 'dark' OR $table->styleTable == 'black'){
                $styleTable = ['head' => '#585858', 'line' => '#F2F2F2', 'hColor' => '#FFFFFF', 'lineColor' => '#000000', 'legend' => '#424242', 'badge' => '#F2F2F2'];
            }
        }else{
            $styleTable = ['head' => '#D8D8D8', 'line' => '#F2F2F2', 'hColor' => '#2E2E2E', 'lineColor' => '#1C1C1C', 'legend' => '#F2F2F2', 'badge' => '#D8D8D8'];
        }
    @endphp

@if (!empty($objectConfig->onePage) && $objectConfig->onePage === true)
    <section id="table" class="m-0 p-0 mx-0 pb-2 pb-sm-3 pt-1 pt-sm-2">
@else
    <section id="table" class="m-0 p-0 mx-0 pb-2 pb-sm-2 pt-1 pt-sm-3">
@endif

    <div class="container-xl px-0">
    <div class="mx-0 pb-0 px-2 px-lg-3 px-xl-0">


    @if (!empty($table->title))


    <div class="pb-3 pt-0 text-center d-none d-sm-block" style="font-size:calc(0.89em + 0.7vw);{{$font_family_title}}">
    {{$table->title}}
    </div>
    <div class="d-none d-sm-block px-2 px-lg-3 pt-3 mb-3 pb-1 {{$border}}">
    @else
    <div class="d-none d-sm-block px-2 px-lg-3 pt-3 mb-3 mt-5 mt-lg-5 pb-1 {{$border}}">
    @endif

    @if (!empty($table->legend))
    <div class="py-3 py-lg-3 mt-1 px-3" style="background-color: {!!$styleTable['legend']!!}; font-size:calc(1.0em + 0.20vw); color:{!!$styleTable['hColor']!!};{{$font_family}}; border-left: 1px solid #E6E6E6; border-top: 1px solid #E6E6E6; ">
    {{$table->legend}}</div>
    @endif




    <table class="table table-sm table-bordered table-responsive-sm mt-0" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.17vw);">
    @if (!empty($paginate))
    @if ($paginate->lastPage() > 1)
    <caption>Página {{$paginate->currentPage()}} de um total de {{$paginate->lastPage()}} páginas</caption>
    @else
    <caption>Página {{$paginate->currentPage()}} de um total de {{$paginate->lastPage()}} página</caption>
    @endif
    @endif
    <thead>
    <tr class="" style="background-color: {!!$styleTable['head']!!};">
    @foreach ($table->showItems as $key => $item)


    @php
    if ($key == 0){
        $px = 'px-3';
    }else{
        $px = 'px-2';
    }
    @endphp
    <th class="py-2 {{$px}}" scope="col" style="font-size:calc(0.75em + 0.23vw); color:{!!$styleTable['hColor']!!};">{{$caption[$key]}}</th>
    @endforeach



    {{--Adição de coluna na tabela para ações do tipo [editar, deletar]--}}
    @if (!empty($table->action))
    @php
    $td_height = 'py-1';
    @endphp
    <th class="py-2 pl-2" scope="col" class="text-center" style="font-size:calc(0.75em + 0.23vw); color:{!!$styleTable['hColor']!!};">{{ucfirst($table->action)}}</th>
    @endif
    {{-------------------------------------------------------------------}}
    </tr>
    </thead>
    <tbody style="line-height:calc(0.9em + 0.8vw); font-sizex:calc(0.82em + 0.10vw);">
    {{--Definição de [ítens da tabela--}}
    @if (!empty($table->items))
    @foreach ($table->items as $index => $item)
    @php
    if(($index + 1) % 2 == 0){
        $bgColor = 'style="background-color: ' . $styleTable['line'] . '";';
    }else{
        $bgColor = 'style="background-color: #FFFFF;"';
    }
    @endphp
    <tr {!!$bgColor!!}>
    @foreach ($item as $key => $fieldValue)
    @if (in_array($key, $table->showItems))
    @if (!empty($table->link) && $key == $table->link)
    <td  class="{{$td_height}} {{$px}}">
    <a href="{{$util->toRoute($table->route, $item->id)}}" class="table-link"
    style="font-size:calc(0.75em + 0.20vw); color:{!!$styleTable['lineColor']!!};">
    <span class="badge badge-pillx px-2x py-2 mx-0 mr-2" style="width:30px; height:30px; background-color: {!!$styleTable['badge']!!}; color:{!!$styleTable['lineColor']!!}; border: 1px solid #A4A4A4;font-size:14px;">
    {{str_split($fieldValue)[0]}}</span>
    {{$fieldValue}}
    </a>
    </td>
    @else
    <td class="{{$td_height}} {{$px}}" style="font-size:calc(0.75em + 0.20vw); color:{!!$styleTable['lineColor']!!};">
    {{$fieldValue}}
    </td>
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
            <td>
            <a href="{{$util->toRoute($table->actionRoute, $item->id)}}">
            <img src="{{$util->toImage('local/images/icons/edit.jpg')}}" alt="{{$table->action}}" class="mx-auto d-block rounded-circle" style="width:calc(18px + 0.5vw);height:calc(18px + 0.5vw);">
            </a></td>
            @else
            <td></td>
            @endif
        @else
        <td><a href="{{$util->toRoute($table->actionRoute, $item->id)}}">
        <img src="{{$util->toImage('local/images/icons/edit.jpg')}}" alt="{{$table->action}}" class="mx-auto d-block rounded-circle" style="width:calc(18px + 0.5vw);height:calc(18px + 0.5vw);">
        </a></td>
        @endif
    @endif
    {{--Fim de rotina de controle de acesso -----------------------}}
    </tr>
    @endforeach
    @endif
    </tbody>
    </table>
    {{--pagination--------------------------------------}}
    @if (!empty($table->paginate))
    <div id="default-paginator" class="text-center nav justify-content-center pt-sm-2" aria-label="Page" translator>
    {!!$table->paginate->links('components.bootstrap')!!}
    </div>
    @endif
    {{--End Pagination----------------------------------}}
</div>
</div>
</div>
{{--Icon de retorno ao topo da página--}}
@if (!empty($objetoConfig->onePage) && $objetoConfig->onePage === true)
<div class="w-100 pb-3 d-none d-sm-block pl-5 container-xl">
    <a href="#top">
    <img src="{{$util->toImage('local/images/icons/setadupla.png')}}" width="26" height="26" class="float-left rounded d-block">
    </a>
    </div>
@endif
{{--End Icon de retorno ao topo da página--}}

</section>
{{--8888888888888888888888888888888888888888888888888888888888--}}
<section>
    <div class="d-block d-sm-none pl-2 pr-2 mb-2 mr-1">
    @if (!empty($table->title))
    <div class="text-center">

    <h6 class="mb-3">{{$table->title}}</h6>
    </div>
    @endif
    @php
    if (!empty($table->styleTable)){
        if ($table->styleTable == 'white' OR $table->styleTable == 'light'){
            $font_color_mobile = '#2E2E2E';
        }else{
            $font_color_mobile = $styleTable['legend'];
        }
    }else{
        $font_color_mobile = '#2E2E2E';
    }
    @endphp
    @foreach ($table->items as $item)
    @if ($borderMobilie === true)
    <div class="mb-1 bg-light border rounded">
    <div class="p-0">
    @else
    <div class="mb-1 bg-light rounded" style="border: 1px solid {{$styleTable['line']}};">
    <div class="p-0" >
    @endif
    @foreach ($item as $key => $value)
    @if (in_array($key, $table->showItems))
    @if (!empty($table->link) && $table->link == $key)

    <div class=" w-100 mx-0 p-2">

    @if (!empty($table->route))
    <div class="pb-1 pl-0" style="font-size:90%;line-height:1.2"><strong>
    <a href="{{$util->toRoute($table->route, $item->id)}}">
    {{$value}}
    </a></strong>
    </div>
    @else
    <div class="pb-1 pl-0" style="font-size:90%;line-height:1.2"><strong>
    {{$value}}
    </strong>
    </div>
    @endif
    @else
    @if (!empty($table->caption->$key))
    <div class="pl-1 pl-0" style="font-size:80%;line-height:1.3; color:{{$font_color_mobile}};">
    {{$table->caption->$key}}: {{$value}}
    </div>
    @else
    <div class="pl-1" style="font-size:80%;line-height:1.3; color:{{$font_color_mobile}};">
    {{ucfirst($key)}}: {{$value}}
    </div>
    @endif
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
        <div class="text-left pt-0"><a href="{{$util->toRoute($table->actionRoute, $item->id)}}">
        <span class="" style="font-size:90%;"><strong>{{ucfirst($table->action)}}</strong></span>
        </a></div>
        @endif
        @else
        <div class="text-left pt-0"><a href="{{$util->toRoute($table->actionRoute, $item->id)}}">
        <span class="" style="font-size:90%;"><strong>{{ucfirst($table->action)}}</strong></span>
        </a></div>
        @endif
    @endif
    </div>
    </div>
    </div>
    @endforeach
{{--pagination--------------------------------------}}
@if (!empty($table->paginate))
<div id="default-paginator" class="text-center nav justify-content-center pt-3" aria-label="Page">
{!!$table->paginate->links('components.bootstrap')!!}
</div>
@endif
{{--End Pagination----------------------------------}}
</div>
</section>
@endif



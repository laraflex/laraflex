@if(!empty($objeto))
    @php
        $storageManager = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $storageManager = $object;
    @endphp
@endif

<section id="storageManager">

<div class="m-0 p-2 mt-4 mb-4 {{$border}}">

@if (!empty($storageManager))
<div id="headerSection" class="pt-3 pb-3 hiflex">
    @if (!empty($storageManager->title))
       <h3 class="text-center font-weight-normal">{{$storageManager->title}}</h3>
    @endif

</div>
    @php
        $imageArray = array('jpg', 'png', 'svg', 'jpeg', 'tif', 'gif', 'BMP', 'exif', 'webp');
    @endphp
    <div class="row p-2">
    @if ($storageManager->path != '')
    <div class=" col-6 col-sm-2 border">
        @php
        $imageDir = url('images/icons/back.png');
        $arrayPath = explode('/', $storageManager->path);

        if (count($arrayPath) <= 1){
            $route = $util->toRoute($storageManager->route);
        }else{
            $tmp = array_pop($arrayPath);
            $pathTmp = implode(':', $arrayPath);
            $route = $util->toRoute($storageManager->route, $pathTmp);
        }
        @endphp
    <a href="{{$route}}">
    <img src="{{$imageDir}}" class="card-img pt-2 pb-1">
    </a>
    <div class="text-center pb-1">{{$storageManager->path}}</div>
    </div>
    @endif
    @php
        $controlDir = true;
        $countDir = 0;
    @endphp

    @if (!empty($storageManager->items))
    {{------------------------------------------------------------------------}}
    @foreach ($storageManager->items as $item)
    {{--Bloco de controle de diretórios que podem ser mostrados ou ocultos--}}
    @php
        $openDir = false;
        if(!empty($storageManager->visibleFolders)){
            if(!empty($item) && in_array($item->fileName, $storageManager->visibleFolders) && $item->type == 'dir'){
                $openDir = true;
                $countDir ++;
            }
        }elseif(!empty($storageManager->hiddenFolder)){
            if (!empty($item) && !in_array($item->fileName, $storageManager->hiddenFolder) && $item->type == 'dir'){
                $openDir = true;
                $countDir ++;
            }
        }
        if($item->type == 'file'){
            $openDir = true;
            $countDir ++;
        }
    @endphp

    @if($openDir === true)
    {{--Fim do bloco de controle---------------------------------------------}}
    <div class="col-6 col-sm-2 border">
    @if ($item->type == 'dir')
        @php
        $arrayIcons = array('images', 'projects', 'users', 'perfil', 'products', 'app');
            if (in_array($item->fileName, $arrayIcons)){
                $imageDir = url('images/icons/'. $item->fileName . '.png');
            }else{
                $imageDir = url('images/icons/folder.png');
            }
            $pathTmp = $storageManager->path;
            if ($pathTmp != '')
                $pathTmp .= '/';
                $pathTmp = str_replace('/', ':',$pathTmp);
                $route = $util->toRoute($storageManager->route .'/'. $pathTmp . $item->fileName);
        @endphp
        <a href="{{$route}}">
        <img src="{{$imageDir}}" class="card-img pt-2 pb-1">
        </a>
        <div class="text-center pb-1">{{$item->fileName}}</div>


    @elseif($item->type == 'file' && !empty($item->extension))

    @if(in_array(strtolower($item->extension), $imageArray))
        @php
            $pathFile = url($item->dirName . '/' . $item->fileName);
            $pathTmp = $item->dirName . '/'. $item->fileName;
            $pathTmp = str_replace('/', ':',$pathTmp);
            if(!empty($storageManager->routeImage)){
            $route = $util->toRoute($storageManager->routeImage, $pathTmp);
            }else{
                $route = "#";
            }

        @endphp
    <a href="{{$route}}">
    <img src="{{$pathFile}}" class="card-img pt-2 pb-1">
    </a>
    <div class="text-center pb-1">{{$item->fileName}}</div>
    @else
        @php
            $pathFile = url($item->dirName . '/' . $item->fileName);
            $pathTmp = $item->dirName . '/'. $item->fileName;
            $pathTmp = str_replace('/', ':',$pathTmp);
            if(!empty($storageManager->routeFile)){
            $route = $util->toRoute($storageManager->routeFile, $pathTmp);
            }else{
            $route = "#";

            }

            $icon = url('images/icons/' . $item->extension . '.png');
        @endphp

        @if (!empty($storageManager->openFileNewTarget) && in_array($item->extension, $storageManager->openFileNewTarget))
        <a href="{{$util->toRoute($item->dirName, $item->fileName)}}" target="_blank">
        @else
        <a href="{{$route}}">
        @endif
    <img src="{{$icon}}" class="card-img pt-2 pb-1">
    </a>
    <div class="text-center pb-1">{{$item->fileName}}</div>

    @endif
    @endif
    {{--Fim do bloco de Diretórios e arquivos--}}
    </div>
    @endif
    @endforeach
    @if($countDir == 0)
    <div class="col-sm-10 text-center pt-4">
    <h5>{{ __('There are no folders or files in this directory.') }}.</h5>
    </div>
    @endif
    @else
    <div class="col-sm-10 text-center pt-4">
    <h5>{{ __('There are no folders or files in this directory.') }}.</h5>
    </div>
    @endif
    </div>
@endif
</div>
@if(!empty($storageManager->inputFile) && $storageManager->inputFile == true)
<div class="p-3" if="inputFile">

<!-- Button trigger modal -->
<button type="button" class="btn btn-light btn-outline-secondary mb-2" data-toggle="modal" data-target="#addFileModal">
Inserir arquivo
</button>

<!-- Modal ------------------>
<div class="modal fade" id="addFileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __('messages.label1') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        <div class="p-3" if="inputFile">
        <form action="{{$util->toRoute('addfile')}}" method="post" enctype="multipart/form-data" id="addfile">
        @csrf
        <div class="">
        <div class="p-2">
        <input class="form-control" type="text" placeholder="Nome do arquivo" name="filename" id="fileName" required>
        </div>
        <div class="p-2">
        <input type="file" class="form-control-file" id="file" class="file" name="file" required>
        </div>
        <input type="hidden" class="path" id="path" name="path" value="{{$storageManager->path}}">
        <div class="p-2">
        <button type="submit" class="btn btn-light btn-outline-secondary mt-3">{{ __('messages.label2') }}</button>
        </a>
        </div>
        </form>
        </div>
        </div>
    </div>
    </div>
</div>
<!-- End Modal ------------------->
@endif
</section>





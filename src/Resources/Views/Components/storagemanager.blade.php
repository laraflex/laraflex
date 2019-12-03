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

<div class="p-2 mt-3 mb-3 {{$border}}">

@if (!empty($storageManager))
<div id="headerSection" class="pt-3 pb-3 hiflex">
    @if (!empty($storageManager->title))
       <h3 class="text-center font-weight-normal">{{$storageManager->title}}</h3>
    @endif
    {{----------------------------------------}}
    @if(!empty($storagemanagerMessage))
        <h6 class="pb-3 text-center">{{$storagemanagerMessage}}</h6>
    @endif
    @if(!empty($storagemanagerAlert))
    @php
    $alertColor = 'alert-primary';
    $color = array('primary', 'secundary', 'success', 'danger', 'warning', 'info', 'light', 'dark');
    if($colorTmp = stristr($storagemanagerAlert, ':')){
    $storagemanagerAlert =  str_replace($colorTmp, '', $storagemanagerAlert);
    $colorTmp = str_replace(':', '', $colorTmp);
    if(in_array($colorTmp, $color)){
        $alertColor = 'alert-' . $colorTmp;
    }
    }
    @endphp
    <div class="alert {{$alertColor}}" role="alert">
    {{$storagemanagerAlert}}
    </div>
    @endif
    {{-------------------------------------------}}
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
            $route = $util->toRoute('liststorage');
        }else{
            $tmp = array_pop($arrayPath);
            $pathTmp = implode(':', $arrayPath);
            $route = $util->toRoute('liststorage', $pathTmp);
        }
        @endphp
    <a href="{{$route}}">
    <img src="{{$imageDir}}" class="card-img pt-2 pb-1">
    </a>
    <div class="text-center pb-1">{{$storageManager->path}}</div>
    </div>
    @endif
    @if (!empty($storageManager->items))
    {{------------------------------------------------------------------------}}
    @foreach ($storageManager->items as $item)
    @if (!empty($item) && !in_array($item->fileName, $storageManager->hiddenFolder))
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
                $route = $util->toRoute('liststorage/'. $pathTmp . $item->fileName);
        @endphp
        <a href="{{$route}}">
        <img src="{{$imageDir}}" class="card-img pt-2 pb-1">
        </a>
        <div class="text-center pb-1">{{$item->fileName}}</div>
        @elseif($item->type == 'file' && in_array(strtolower($item->extension), $imageArray))
        @php
            $pathFile = url('storage/' . $item->dirName . '/' . $item->fileName);
            $pathTmp = $item->dirName . '/'. $item->fileName;
            $pathTmp = str_replace('/', ':',$pathTmp);
            $route = $util->toRoute($storageManager->routeImage, $pathTmp);
        @endphp
    <a href="{{$route}}">
    <img src="{{$pathFile}}" class="card-img pt-2 pb-1">
    </a>
    <div class="text-center pb-1">{{$item->fileName}}</div>
    @else
        @php
            $pathFile = url('storage/' . $item->dirName . '/' . $item->fileName);
            $pathTmp = $item->dirName . '/'. $item->fileName;
            $pathTmp = str_replace('/', ':',$pathTmp);
            $route = $util->toRoute($storageManager->routeFile, $pathTmp);
            $icon = url('images/icons/' . $item->extension . '.png');
        @endphp
    @if (!empty($storageManager->openFileNewTarget) && $storageManager->openFileNewTarget === true)
    <a href="{{$route}}" target="_blank">
    @else
    <a href="{{$route}}">
    @endif
    <img src="{{$icon}}" class="card-img pt-2 pb-1">
    </a>
    <div class="text-center pb-1">{{$item->fileName}}</div>
    @endif
    </div>
    @endif
    @endforeach
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






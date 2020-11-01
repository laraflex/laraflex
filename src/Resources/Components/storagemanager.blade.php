@if(!empty($objeto))
    @php
        $storageManager = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $storageManager = $object;
    @endphp
@endif

@if (!empty($storageManager))
<section id="storageManager">
<div class="container-xl px-0">
<div class="m-0 p-0 mt-4 mb-2 pb-4 mx-2 mx-lg-2 mx-xl-0 {{$border}}">
<div id="headerSection" class="pt-3 pb-3">
    @if (!empty($storageManager->title))
    <div class="text-center font-weight-normal" style="font-size:calc(0.9em + 0.8vw);line-height:calc(14px + 1.3vw)">
    {{$storageManager->title}}
    </div>
    @endif
    </div>
    @php
        $imageArray = array('jpg', 'png', 'svg', 'jpeg', 'tif', 'gif', 'BMP', 'exif', 'webp');

        $font = 'font-size:calc(12px + 0.20vw);line-height:calc(14px + 0.3vw);overflow-wrap: anywhere;';
        $borderx = '';
        if (!empty($storageManager->iconSize) && $storageManager->iconSize == 'small'){
            $column = 'col-4 col-sm-2 col-lg-1 p-0 m-0';
            $font = 'font-size:calc(12px + 0.05vw);line-height:calc(14px + 0.3vw);overflow-wrap: anywhere;';
        }else{
            $column = 'col-4 col-sm-2 p-0 m-0';
        }
        if (!empty($storageManager->route)){
            $routeApp = $storageManager->route;
        }else{
            $routeApp = 'liststorage';
        }
        if (!empty($storageManager->routeImage)){
            $routeImage = $storageManager->routeImage;
        }else{
            $routeImage = 'storage/showimage';
        }
        if(!empty($storageManager->routeFile)){
            $routeFile = $util->toRoute($storageManager->routeFile);
        }else{
            $routeFile = $util->toRoute('storage/showfile');
        }
        if (!empty($storageManager->routeDeleteFile)){
            $routeDelete = $util->toRoute($storageManager->routeDeleteFile);
        }else{
            $routeDelete = $util->toRoute('storage/deletefile');
        }
        if (!empty($storageManager->routeAddFile)){
            $routeAddFile = $util->toRoute($storageManager->routeAddFile);
        }else{
            $routeAddFile = $util->toRoute('storage/addfile');
        }
        if (!empty($storageManager->routeAddFolder)){
            $routeAddFolder = $util->toRoute($storageManager->routeAddFolder);
        }else{
            $routeAddFolder = $util->toRoute('storage/addfolder');
        }
    @endphp
<div class="row p-0 m-0">
    @if (!empty($storageManager->filesystem->path) OR $storageManager->filesystem->path != '')
    <div class="{{$column}}">
    <div class="m-1 p-2" >
    @php
        $imageNav = url('local/images/icons/backp.png');
        $arrayPath = explode('/', $storageManager->filesystem->path);
        if (count($arrayPath) == 0){
            $pathTmp = $storageManager->filesystem->path;
        }else{
            $tmp = array_pop($arrayPath);
            $pathTmp = implode('/', $arrayPath);
        }
        $route = route($routeApp, ['path' => $pathTmp]);

    @endphp
    <a href="{{$route}}">
    <img src="{{$imageNav}}" class="card-img mx-auto d-block" style="heightx:80%;">
    </a>

    <div class="text-center pb-1" style="{{$font}}">{{$storageManager->filesystem->path}}</div>
    </div>
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
    <div class="{{$column}}" >
    <div class="m-1 p-1">
    @if ($item->type == 'dir')
        @php
        $arrayIcons = array('images', 'projects', 'users', 'perfil', 'products', 'app');
            if (in_array($item->fileName, $arrayIcons)){
                $imageDir = url('local/images/icons/'. $item->fileName . '.png');
            }else{
                $imageDir = url('local/images/icons/folder.png');
            }
            $pathTmp = $storageManager->filesystem->path;

            if ($pathTmp == ''){
                $pathDir = $item->fileName;
            }else{
                $pathDir = $pathTmp .'/'. $item->fileName;
            }
            $route = route($routeApp, ['path' => $pathDir]);

        @endphp

        <a href="{{$route}}">
        <img src="{{$imageDir}}" class="card-img mx-auto d-block" style="width:80%;">
        </a>

        <div class="text-center pb-1" style="{{$font}}">{{$item->fileName}}</div>{{--caption--}}
    @elseif($item->type == 'file' && !empty($item->extension))

    @if(in_array(strtolower($item->extension), $imageArray))

        @php
        if ($item->dirName == ""){
            $pathFile = $storageManager->filesystem->storagePathDisk . $item->fileName;
        }else{
            $pathFile = $storageManager->filesystem->storagePathDisk . $item->dirName . '/'. $item->fileName;
        }
            $pathTmp = $item->dirName . '/'. $item->fileName;

            if (!empty($storageManager->showImage) && $storageManager->showImage === true){
                $imagePath = $pathFile;
                $width = '';
            }else{
                $imagePath = $util->toImage('local/images/icons/' . $item->extension . '.png');
                $width = 'style="width: 80%";';
            }
        @endphp
    {{--Formulário de solicitação de imagem ------------------------------}}
    <form method="post" id="storage-image">
    @csrf
    <input type="hidden" id="path" name="path" value="{{$pathTmp}}">
    <input type="hidden" id="path" name="disk" value="{{$storageManager->filesystem->disk}}">
    <input type="hidden" id="name" name="name" value="{{$item->fileName}}">
    <input type="hidden" id="dir" name="dir" value="{{$item->dirName}}">
    <input type="hidden" id="extension" name="extension" value="{{$item->extension}}">
    <input type="hidden" id="size" name="size" value="{{$item->size}}">
    {{--Controle de permissão de função para deletar item-----}}
    @if(!empty($storageManager->managerPermission) && $storageManager->managerPermission === true)
        <div class="dropdown">
        <a class="btn p-0 m-0" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="card-img mx-auto d-block" src="{{$imagePath}}" {!!$width!!}/>
        </a>
    <div class="dropdown-menu {{$border}}" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href={{$pathFile}} data-width="1280" data-toggle="lightbox" data-gallery="gallery">{{__('Show image')}}</a>
        <div class="dropdown-divider"></div>
        <input type="submit" class="dropdown-item" onclick="action='{{$routeImage}}';" value="{{__('Open file')}}">
        <div class="dropdown-divider"></div>
        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#deleteModal" onclick="setaDadosModal('{{$imagePath}}','{{$item->fileName}}','{{$pathTmp}}','{{$storageManager->filesystem->disk}}')">
        {{__('Delete file')}}
        </button>
        </div>
        </div>
    @else
    <a href={{$pathFile}} data-width="1280" data-toggle="lightbox" data-gallery="gallery">
    <img src="{{$imagePath}}" class="card-img mx-auto d-block" {!!$width!!}/>
    </a>
    @endif
            {{--Fim de controle ---------------------------------------}}
    </form>
    {{--Fim de formulário de solicitação de imagem ------------------------------}}
    <div class="text-center pb-1" style="{{$font}}">{{$item->fileName}}</div>{{--caption--}}
    @else
        @php
            $pathTmp = $item->dirName . '/'. $item->fileName;
             $imagePath = $util->toImage('local/images/icons/' . $item->extension . '.png');

        @endphp
    {{--Formulário de solicitação de arquivo ------------------------------}}
    @if (!empty($storageManager->openFileNewTarget) && $storageManager->openFileNewTarget === true)
    <form method="post" id="storage-file" target="_blank" rel="noopener noreferrer">
    @else
    <form method="post" id="storage-file">
    @endif
        @csrf
        <input type="hidden" id="path" name="path" value="{{$pathTmp}}">
        <input type="hidden" id="path" name="disk" value="{{$storageManager->filesystem->disk}}">
        <input type="hidden" id="name" name="name" value="{{$item->fileName}}">
        <input type="hidden" id="dir" name="dir" value="{{$item->dirName}}">
        <input type="hidden" id="extension" name="extension" value="{{$item->extension}}">
        <input type="hidden" id="size" name="size" value="{{$item->size}}">
        {{--Controle de permissão de função para deletar item-----}}
        @if(!empty($storageManager->managerPermission) && $storageManager->managerPermission === true)
        <div class="dropdown">
        <a class="btn p-0 m-0" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img class="card-img mx-auto d-block" src="{{$imagePath}}" style="width:85%;">
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <input type="submit" class="dropdown-item" onclick="action='{{$routeFile}}';" value="{{__('Open file')}}">
            <div class="dropdown-divider"></div>
            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#deleteModal" onclick="setaDadosModal('{{$imagePath}}','{{$item->fileName}}','{{$pathTmp}}','{{$storageManager->filesystem->disk}}')">
            {{__('Delete file')}}
            </button>
        </div>
        </div>
        @else
        <input type="image" src="{{$imagePath}}" class="card-img mx-auto d-block" onclick="action='{{$routeFile}}';" style="width:85%;"/>
        @endif
        {{--Fim de controle ---------------------------------------}}
        </form>
    {{--Fim de Formulário de solicitação de arquivo ------------------------------}}
    <div class="text-center pb-1" style="{{$font}}">{{$item->fileName}}</div>{{--caption--}}
    @endif
    @endif
    {{--Fim do bloco de Diretórios e arquivos--}}
    </div>
    </div>
@endif
@endforeach
    @if($countDir == 0)
    <div class="col-sm-10 text-center pt-4">
    <h5>{{ __('There are no folders or files in this directory.') }}.</h5>
    </div>
    @endif
@endif
</div>
</div>
@if(!empty($storageManager->managerPermission) && $storageManager->managerPermission === true)
@include('laraflex::include.formconfirm')
@endif
<div class="p-3" if="inputFileAndFolder">
@if (!empty($storageManager->addFile) && $storageManager->addFile === true)
<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-light btn-outline-secondary mb-2" data-toggle="modal" data-target="#addFileModal">
{{__('Insert file')}}
</button>
@endif
@if(!empty($storageManager->managerPermission) && $storageManager->managerPermission === true)
<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-light btn-outline-secondary mb-2" data-toggle="modal" data-target="#addFolderModal">
{{__('Insert folder')}}
</button>
@endif
</div>
{{--Adiciona modais de formulários -----------------------}}
@if (!empty($storageManager->addFile) && $storageManager->addFile === true)
@include('laraflex::include.formaddfile')
@endif

@if(!empty($storageManager->managerPermission) && $storageManager->managerPermission === true)
@include('laraflex::include.formaddfolder')
@endif
{{--------------------------------------------------------}}
</div>
</section>
@else
@if (!empty($storageManager->nullable) && $storageManager->nullable === true)
    <div class="text-center mt-2 mb-2"></div>
@else
<div class="container-xl px-2 mt-4 pb-2" translation="no">
    <div class="alert alert-primary {{$border}}" role="alert">
    <div class="content-message alert-heading" style="font-size:calc(0.85em + 0.4vw)"><strong>{{__('Message')}}!</strong></div>
    <hr class="d-block"></hr>
    <div class="mb-0" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.18vw);">{{ __('There are no items to display.') }}</div>
    </div>
</div>
@endif
@endif




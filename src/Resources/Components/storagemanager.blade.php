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
<div class="m-0 p-0 mt-4 mb-2 pb-4 mx-2 mx-lg-2 mx-xl-0 px-xl-2 {{$border}}">
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
            $iconsPadding = '';
        }else{
            $column = 'col-4 col-sm-2 p-0 m-0';
            $iconsPadding = "px-md-3 py-md-2";
        }
        if (!empty($storageManager->route)){
            $routeApp = $storageManager->route;
        }else{
            $routeApp = 'liststorage';
        }
        $routeDeleteImage = $util->toRoute('image/delete');
        if (!empty($storageManager->routeDeleteFile)){
            $routeDelete = $util->toRoute($storageManager->routeDeleteFile);
        }else{
            $routeDelete = $util->toRoute('storage/deletefile');
        }
        $routeDeleteFile = $util->toRoute('file/delete');

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
            // DISPONIBILIZAÇÃO DE UMA PASTA DE USUÁRIO PELO NAME ============
            if (!empty($user)){
                $arrayName = explode(' ', $user->name);
                $userFolder = implode('_', $arrayName);
                $userFolder = strtolower($userFolder);
                $storageManager->visibleFolders[] = 'home';
                $storageManager->visibleFolders[] = $userFolder;
            }
            // ===============================================================
            if(!empty($item) && in_array($item->fileName, $storageManager->visibleFolders) && $item->type == 'dir'){
                $openDir = true;
                $countDir ++;
            }
        }elseif(!empty($storageManager->hiddenFolders)){
            if (!empty($item) && !in_array($item->fileName, $storageManager->hiddenFolders) && $item->type == 'dir'){
                $openDir = true;
                $countDir ++;
            }
        }
        elseif(empty($storageManager->visibleFolders) && empty($storageManager->hiddenFolders)){
            $openDir = true; // testar impacto
            $countDir ++;
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
        <div class="{!!$iconsPadding!!}">
        <a href="{{$route}}">
        <img src="{{$imageDir}}" class="card-img mx-auto d-block" style="width:80%;">
        </a>
        </div>
        <div class="text-center pb-1" style="{{$font}}">{{strtolower($item->fileName)}}</div>{{--caption--}}
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

    {{--Controle de permissão de função para deletar item-----}}
    @if(!empty($storageManager->managerPermission) && $storageManager->managerPermission === true)

         {{--Formulário de solicitação de imagem ------------------------------}}
    <form method="post" id="storage-image" action='{{$routeDeleteImage}}'>
    @csrf
    <input type="hidden" id="path" name="path" value="{{$pathTmp}}">
    <input type="hidden" id="path" name="disk" value="{{$storageManager->filesystem->disk}}">
    <input type="hidden" id="name" name="name" value="{{$item->fileName}}">
    <input type="hidden" id="dir" name="dir" value="{{$item->dirName}}">
    <input type="hidden" id="extension" name="extension" value="{{$item->extension}}">
    <input type="hidden" id="size" name="size" value="{{$item->size}}">

        <div class="dropdown">
        <a class="btn p-0 m-0" href="#" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="outline: none;border:none">
        <img class="card-img mx-auto d-block" src="{{$imagePath}}" {!!$width!!}/>
        </a>
    <div class="dropdown-menu {{$border}}" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href={{$pathFile}} data-size="lg" data-toggle="lightbox" data-gallery="gallery">{{__('Show image')}}</a>

        <div class="dropdown-divider"></div>
        <input type="submit" class="dropdown-item" onclick='return confirmar();' value="{{__('Delete file')}}">

        </div>
        </div>
    @else
    <div class="">
    <a href={{$pathFile}} data-size="lg" data-toggle="lightbox" data-gallery="gallery">
    <img src="{{$imagePath}}" class="card-img mx-auto d-block" {!!$width!!}/>
    </a>
   </div>
    @endif
       {{--Fim de controle ---------------------------------------}}
    </form>
    {{--Fim de formulário de solicitação de imagem ------------------------------}}
    <div class="text-center py-2 text-lowercase" style="{{$font}}">{{$item->fileName}}</div>{{--caption--}}
    @else
        @php
            $pathTmp = $item->dirName . '/'. $item->fileName;
             $imagePath = $util->toImage('local/images/icons/' . $item->extension . '.png');

        @endphp
    {{--Formulário de solicitação de arquivo ------------------------------}}

    @if(!empty($storageManager->managerPermission) && $storageManager->managerPermission === true)

        <form method="post" id="storage-file" action="{{$routeDeleteFile}}"">
        @csrf
        <input type="hidden" id="path" name="path" value="{{$pathTmp}}">
        <input type="hidden" id="path" name="disk" value="{{$storageManager->filesystem->disk}}">
        <input type="hidden" id="name" name="name" value="{{$item->fileName}}">
        <input type="hidden" id="dir" name="dir" value="{{$item->dirName}}">
        <input type="hidden" id="extension" name="extension" value="{{$item->extension}}">
        <input type="hidden" id="size" name="size" value="{{$item->size}}">
        {{--Controle de permissão de função para deletar item---  --}}

        <div class="dropdown m-0 p-0 text-center {!!$iconsPadding!!}">

        <a class="btn p-0 m-0" href="#" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="outline: none;border:none">
        <img class="card-img mx-auto d-block" src="{{$imagePath}}" style="width:85%;">
        </a>
        <div class="text-center py-2 text-lowercase" style="{{$font}}">{{$item->fileName}}</div>{{--caption--}}
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @php
        $openFile = $util->toRoute('/local', $item->path);
        @endphp
        <a class="btn dropdown-item" href="{{$openFile}}" target="_blank" rel="noopener noreferrer">
        {{__('Open file')}}
        </a>
        <div class="dropdown-divider"></div>
        <input type="submit" class="dropdown-item" onclick='return confirmar();' value="{{__('Delete file')}}">
        </div>
        </div>
    @else
        @php
        $openFile = $util->toRoute('/local', $item->path);
        @endphp
        <div class="{!!$iconsPadding!!}">
        <a href="{{$openFile}}" target="_blank" rel="noopener noreferrer">
        <img class="card-img mx-auto d-block" src="{{$imagePath}}" style="width:85%;">
        </a>
        </div>
        <div class="text-center py-1 text-lowercase" style="{{$font}}">{{$item->fileName}}</div>{{--caption--}}
    @endif
        {{--Fim de controle ---------------------------------------}}
        </form>
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

<div class="p-3" if="inputFileAndFolder">

<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-light btn-outline-secondary mb-2" data-bs-toggle="modal" data-bs-target="#addFileModal">
{{__('Insert file')}}
</button>

<!-- Button trigger modal -->
<button type="button" class="btn btn-sm btn-light btn-outline-secondary mb-2" data-bs-toggle="modal" data-bs-target="#addFolderModal">
{{__('Insert folder')}}
</button>

</div>
{{--Adiciona modais de formulários -----------------------}}

@include('laraflex::include.formaddfile')

@include('laraflex::include.formaddfolder')
@endif
{{--------------------------------------------------------}}
</div>
</section>
@else
@if (!empty($storageManager->nullable) && $storageManager->nullable === true)
    <div class="text-center mt-2 mb-2"></div>
@else
{{--messageNull component Blogcardes ==========================================--}}
<x-laraflex::shared.messagenull />

@endif
@endif




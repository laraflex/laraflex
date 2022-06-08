@if (!empty($objeto))
    @php
        $contentbox = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $contentbox = $object;
    @endphp
@endif

@if (!empty($contentbox) && !empty($contentbox->showItems) && !empty($contentbox->data))
<section id="contentbox" class="pb-1 pt-2 pt-md-3">
<div class="container-xl pl-0 pr-0 pr-sm-0">
<div class="mx-0 mb-0 mt-1 px-2 px-md-3 px-xl-0">
@php
$data = $contentbox->data;
@endphp
<div class="p-3 p-sm-4 p-lg-5 {{$border}} m-0 mt-4 mb-4">
    @php
        if (!empty($contentbox->fontFamily->title)){
            $font_family_title = 'font-family:'.$contentbox->fontFamily->title;
        }else{
            $font_family_title = '';
        }
        if (!empty($contentbox->fontFamily->shared)){
            $font_family = 'font-family:'.$contentbox->fontFamily->shared;
        }else{
            $font_family = '';
        }
    @endphp
    @if (in_array('title', $contentbox->showItems) && !empty($data->title))
    <div class="contentbox-title mb-3" style="font-size:calc(0.9em + 0.8vw);line-height:calc(16px + 1.5vw);{{$font_family_title}}">{{$data->title}}</div>
    @endif
    @if (in_array('subTitle', $contentbox->showItems) && !empty($data->subTitle))
    <h6 class="contentbox-subtitle font-weight-normal" style="font-size:calc(0.9em + 0.5vw);{{$font_family_title}}">{{$data->subTitle}}</h6>
    @endif
    @if (in_array('date', $contentbox->showItems))
    <div class="contentbox-date card-text mb-2"><small class="text-muted">{{$data->date}}</small></div>
    @endif
    @if (in_array('image', $contentbox->showItems))
    @php
    if (!empty($data->imageStorage)){
        $image = $data->imageStorage;
    }
    elseif(!empty($data->imagePath)){
        $image = $util->toImage($data->imagePath);
    }
    elseif(!empty($data->image)){
        $image = $util->toImage($data->image);
    }
    if (!empty($data->maxWidthImage) &&  ($data->maxWidthImage == false)){
        $maxWidth = 'max-width:100%';
    }else{
        $maxWidth = 'max-width:70%';
    }
    @endphp
    <img src="{{$image}}" class="mt-2 mb-3 mt-lg-3 mb-lg-4" alt="..." style="{{$maxWidth}}; align:left" id="imagebox">
    @endif
    {{--Bloco Abstract -------------------------------}}
    @if (in_array('abstract', $contentbox->showItems) && !empty($data->abstract))
    {{--Resumo visíveis em mobiles ou não--}}
    @if (!empty($contentbox->allVisible) && $contentbox->allVisible === true)
    <div class="">
    @else
    <div class="d-none d-sm-block">
    @endif
    <div class="pb-3 mt-3" style="line-height: calc(1.1em + 0.6vw); font-size:calc(14px + 0.21vw);{{$font_family}}"><b>{{__('Abstract')}}</b></div>
    <div class="contentbox-shared text-justify pb-2" style="line-height: calc(1.1em + 0.6vw); font-size:calc(14px + 0.21vw);{{$font_family}}">
    {{$data->abstract}}
    </div>
    @if (in_array('keywords', $contentbox->showItems) && !empty($data->keywords))
    <div class="contentbox-shared pt-3 pb-2" style="line-height: calc(1.1em + 0.6vw); font-size:calc(14px + 0.21vw);{{$font_family}}">
    <b>{{__('Keywords')}}</b>: {{$data->keywords}}</div>
    @endif
    <hr>
    </div>
    @endif
    {{--Fim do bloco abstract--------------------------}}
    {{--Bloco de conteúdo -----------------------------------------------}}
    @if (in_array('content', $contentbox->showItems) && !empty($data->content))
        <div class="contentbox-shared text-justify mt-3" style="line-height: calc(1.1em + 0.6vw); font-size:calc(14px + 0.21vw);{{$font_family}}">
            {!!$data->content!!}
        </div>
    @endif
    @if (in_array('author', $contentbox->showItems) && !empty($data->author))
    <div class="text-left mt-3" style="width: calc(200px + 10vw);">
    @php
        if (!empty($data->author->photoStorage)){
            $photo = $data->author->photoStorage;
        }
        elseif(!empty($data->author->photoPath)){
            $photo = $util->toImage($data->author->photoPath);
        }
        elseif(!empty($data->author->photo)){
            $photo = $util->toImage($data->author->photo);
        }
    @endphp
    @if (!empty($photo))
    <img src="{{$photo}}" class="img-thumbnail mb-2 mt-2" style="width:30%">
    @endif
    <p class=" contentbox-shared card-text" style="line-height: calc(1.1em + 0.6vw);font-size:calc(0.8em + 0.18vw);{{$font_family}}">Autor: {{$data->author->name}}</p>
    </div>
    @endif
    {{--Bloco para adicionar um anexo ao conteúdo--}}
    @if (in_array('attached', $contentbox->showItems) && !empty($data->attached))
    <div class="p-2" style="width:150px">
    @php
    $image = $util->toImage('local/images/icons', 'pdf.png');
    $alt = '';
    @endphp
    <a href="{{$data->attached}}" rel="noopener noreferrer" target="_blank">
    <img src="{{$image}}" class="img-fluidx mx-auto d-block" alt="Open the file" />
    </a>
    <div class="text-center">{{__('Open file')}}</div>
    @endif
    {{----------------------------------------------}}
    </div>
    <div class="p-2">
    @if(!empty($contentbox->comentInsert) && $contentbox->comentInsert === true)
    <button type="button" class="btn btn-sm btn-light btn-outline-secondary mb-3 mt-3" data-toggle="modal" data-target="#comentModal" data-id="0">
    {{__('Make a comment')}}
    </button>
    @elseif(!empty($contentbox->message))
    <div class="pb-0 pt-3"><i>{{__($contentbox->message)}}</i></div>
    @endif
    </div>
</div>
@if(!empty($contentbox->coments))
@php
    $coments = $contentbox->coments;
@endphp
@include('laraflex::' . $contentbox->coments->component)
@endif
@if(!empty($contentbox->comentInsert) && $contentbox->comentInsert === true)
@include('laraflex::include.formcoments')
@endif
</div>
</div>
</section>
@else
<div class="container-xl mt-4 pb-2 px-2 px-md-3 px-xl-0"" translation="no">
    <div class="alert alert-primary {{$border}}" role="alert">
    <div class="content-message alert-heading" style="font-size:calc(0.85em + 0.4vw)"><strong>{{__('Message')}}!</strong></div>
    <hr class="d-none d-sm-block">
    <div class="mb-0" style="line-height:calc(0.9em + 0.8vw); font-size:calc(0.86em + 0.18vw);">{{ __('There are no items to display.') }}</div>
    </div>
</div>
@endif


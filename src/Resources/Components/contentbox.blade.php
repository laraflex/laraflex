@if (!empty($objeto))
    @php
        $contentbox = $objeto;
    @endphp
@elseif(!empty($object))
    @php
        $contentbox = $object;
    @endphp
@endif

@if (!empty($contentbox) && !empty($contentbox->showItems))
<section id="contentbox">
    @php
    $data = $contentbox->data;
    @endphp
<div class="p-4 hiflex {{$border}} m-0 mt-4 mb-4">
    @if (in_array('title', $contentbox->showItems) && !empty($data->title))
    <h3 class="d-none d-lg-block font-weight-normal">{{$data->title}}</h2>
    <h4 class="d-block d-lg-none font-weight-normal">{{$data->title}}</h5>
    @endif
    @if (in_array('subTitle', $contentbox->showItems) && !empty($data->subTitle))
    <h6 class="d-none d-md-block font-weight-normal">{{$data->subtitle}}</h6>
    @endif
    @if (in_array('date', $contentbox->showItems))
    {{--Controle de configuração--}}

    {{----------------------------}}
    <div class="card-text"><small class="text-muted">{{$data->date}}</small></div>
    @endif

    @if (in_array('categoryName', $contentbox->showItems) && !empty($data->categoryName))
    {{--Controle de configuração--}}

    {{----------------------------}}
    <p class="mb-1 card-text"><strong>{{$data->categoryName}}</strong></p>
    @endif
    @if (in_array('image', $contentbox->showItems) && !empty($data->image))
    <img src="{{$util->toImage($contentbox->imagePath, $data->image)}}" class="mt-2 mb-3" alt="..." style="width:40%;align:left" id="imageBox">
    @endif
    {{--Bloco de conteúdo -----------------------------------------------}}
    @if (in_array('content', $contentbox->showItems) && !empty($data->content))
        <div>
        @if(!empty($contentbox->contentType) && $contentbox->contentType == 'code')
            <p class="d-none d-sm-block ">{!!$data->content!!}</p>
        @else
        <p class="d-none d-sm-block text-justify">{{$data->content}} </p>
        @endif
        {{-- controle de apresentação para mobile--}}
        <p class="d-block d-sm-none text-justify" style="line-height: 1.1";><small class="text-muted">
            {{$data->content}}
        </small></p>
        </div>
    @endif

    @if (in_array('authorName', $contentbox->showItems) && !empty($data->authorName))
    {{--Controle de configuração--}}

    {{----------------------------}}
    <p class="card-text">{{$data->authorName}}</p>
    @endif
    <div class="p-2">
    @if(!empty($contentbox->comentInsert) && $contentbox->comentInsert === true)
    <button type="button" class="btn btn-sm btn-light btn-outline-secondary mb-3" data-toggle="modal" data-target="#addResponseModal" data-whatever="NULL">
    {{__('Make a comment')}}
    </button>
    @elseif(!empty($contentbox->message))
    <div class="pb-3"><i>{{__($contentbox->message)}}</i></div>
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
</section>
@else
<div class="text-center p-4 mt-3 mb-3 {{$border}}">
<h5>{{ __('There is no content to display.') }}</h5>
</div>
@endif

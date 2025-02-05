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
if (!empty($contentbox->showItems)){
    foreach ($contentbox->showItems as $key => $value){
        $showItems[$key] = strtolower($value);
    }
}

// FONT CONFIG ================================
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
// ITEMS CONFIG ===============================================
if (!empty($data->title)){
    $title = $data->title;
}else{
    $title = NULL;
}
if (!empty($data->subTitle)){
    $subTitle = $data->subTitle;
}else{
    $subTitle = NULL;
}
if (!empty($data->date)){
    $date = $data->date;
}else{
    $date = NULL;
}
// IMAGE CONFIG =================================================
if (!empty($data->imageStorage)){
    $image = $data->imageStorage;
}
elseif(!empty($data->imagePath)){
    $image = $util->toImage($data->imagePath);
}
elseif(!empty($data->image)){
    $image = $util->toImage($data->image);
}else{
    $image = NULL;
}
if (!empty($data->maxWidthImage) &&  ($data->maxWidthImage == false)){
    $maxWidth = 'max-width:100%';
 }else{
    $maxWidth = 'max-width:50%';
}
if (!empty($data->abstract)){
    $abstract = $data->abstract;
    if (!empty($contentbox->allVisible)){
        $allVisible = $contentbox->allVisible;
    }else{
        $allVisible = NULL;
    }
}else{
    $abstract = NULL;
}
if (!empty($data->keywords)){
    $keywords = $data->keywords;
}else{
    $keywords = NULL;
}
//CONTENT CONFIG ================================
if (!empty($data->content)){
    $content = $data->content;
}else{
    $content = NULL;
}
// AUTHOR CONFIG =================================
if (!empty($data->author)){
    $author = $data->author;
    if (!empty($data->author->name)){
        $authorName = $data->author->name;
    }else{
        $authorName = "";
    }

}else{
    $author = NULL;
}
if (!empty($data->author->photoStorage)){
    $photo = $data->author->photoStorage;
}
elseif(!empty($data->author->photoPath)){
    $photo = $util->toImage($data->author->photoPath);
}
elseif(!empty($data->author->photo)){
    $photo = $util->toImage($data->author->photo);
}else{
    $photo = NULL;
}
// ATTECHED FILE PDF =============================================
if (!empty($data->attached)){
    $attached = $util->toPath($data->attached);
}else{
    $attached = NULL;
}
$imagePdf = $util->toImage('local/images/icons', 'pdf.png');
$alt = 'file.pdf';
if (!empty($data->attachedLabel)){
    $attachedLabel = $data->attachedLabel;
}else{
    $attachedLabel = __('Open file');
}
//COMENT COMPONENTS CONFIG =============================================
if (!empty($contentbox->comentInsert)){

}
@endphp
<div class="p-3 p-sm-4 p-lg-5 {{$border}} m-0 mt-4 mb-4">

    {{--title component ContentBox ==========================================--}}
    @if (in_array('title', $showItems) && !empty($title))
    {{--@props(['title', 'font_family_title'])--}}
    <x-laraflex::contentbox.title :title="$title" :font_family_title="$font_family_title" />
    @endif

    {{--subTitle component ContentBox ==========================================--}}
    @if (in_array('subTitle', $showItems) && !empty($subTitle))
    {{--@props(['subTitle', 'font_family_title'])--}}
    <x-laraflex::contentbox.subtitle :subTitle="$subTitle" :font_family_title="$font_family_title" />
    @endif

    {{--date component ContentBox ==========================================--}}
    @if (in_array('date', $showItems) && !empty($date))
    {{--@props(['date'])--}}
        <x-laraflex::contentbox.date :date="$date" />
    @endif

    {{--image component ContentBox ==========================================--}}
    @if (in_array('image', $contentbox->showItems) && !empty($image))
    {{--@props(['image', 'maxWidth'])--}}
    <x-laraflex::contentbox.image :image="$image" :maxWidth="$maxWidth" />
    @endif

    {{--abstract component ContentBox ==========================================--}}
    @if (in_array('abstract', $showItems) && !empty($abstract))
    {{--@props(['abstract', 'allVisible', 'font_family'])--}}
    <x-laraflex::contentbox.abstract :abstract="$abstract" :allVisible="$allVisible" :font_family="$font_family" />
    @endif

    {{--keywords component ContentBox ==========================================--}}
    @if (in_array('keywords', $showItems) && !empty($keywords))
    {{--@props(['keywords', 'font_family'])--}}
    <x-laraflex::contentbox.keywords :keywords="$keywords" :font_family="$font_family" />
    @endif

    {{--content component ContentBox ==========================================--}}
    @if (in_array('content', $showItems) && !empty($content))
    {{--@props(['content', 'font_family'])--}}
     <x-laraflex::contentbox.content :content="$content" :font_family="$font_family" />
    @endif

    {{--author component ContentBox ==========================================--}}
    @if (in_array('author', $showItems) && !empty($author))
    {{--@props(['authorName', 'photo', 'font_family'])--}}
    <x-laraflex::contentbox.author :authorName="$authorName" :photo="$photo" :font_family="$font_family" />
    @endif

    {{--attached component ContentBox ==========================================--}}
    @if (in_array('attached', $showItems) && !empty($attached))
    {{--@props(['attached', 'imagePdf', 'attachedLabel'])--}}
    <x-laraflex::contentbox.attached :attached="$attached" :imagePdf="$imagePdf" :attachedLabel="$attachedLabel" />
    @endif

    {{--comentButton component ContentBox ==========================================--}}
    @if(!empty($contentbox->comentInsert) && $contentbox->comentInsert === true)

    <button type="button" class="btn btn-sm btn-light btn-outline-secondary mb-3 mt-3" data-toggle="modal" data-target="#comentModal" data-id="0">
    {{__('Make a comment')}}
    </button>

    {{--message component ContentBox ==========================================--}}
    @elseif(!empty($contentbox->message))
    <div class="pb-0 pt-3"><i>{{__($contentbox->message)}}</i></div>
    @endif
</div>

{{--coments component ContentBox ==========================================--}}
@if(!empty($contentbox->coments))
@php
    $coments = $contentbox->coments;
@endphp
@include('laraflex::' . $contentbox->coments->component)
@endif
{{--formComent component ContentBox ==========================================--}}
@if(!empty($contentbox->comentResponse) && $contentbox->comentResponse === true)
@include('laraflex::include.formcoments')
@endif
</div>
</div>
</section>
@else
{{--messageNull component ContentBox ==========================================--}}
<x-laraflex::shared.messagenull />
@endif


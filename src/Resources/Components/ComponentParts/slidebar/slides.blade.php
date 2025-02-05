
<div class="frame js_frame p-0 m-0">
    <ul class="slides js_slides p-0 m-0">
    @foreach($items as $item)
    <li class="js_slide align-top {{$border}}">
        @if (!empty($item->url))
        {{--Movies for youtube ------------------}}
        @if(!empty($item->media) && $item->media == 'youtube')
        <a href="{{$item->url}}" data-toggle="lightbox" data-width="1280" data-gallery="media" class=" m-0">
        {{--Movies for Vimeo ---------------------}}
        @elseif(!empty($item->media) && $item->media == 'vimeo')
            @php
                $codeVimeo = substr($item->url, 18);
                $player = 'https://player.vimeo.com/video/' . $codeVimeo;
            @endphp
        <a href="{{$item->url}}" data-remote="{{$player}}" data-toggle="lightbox" data-width="1280" data-gallery="media" class=" m-0">
        @endif
        @else
        <a>
        @endif
    @php
    if (!empty($item->imageStorage)){
        $image = $item->imageStorage;
    }
    elseif (!empty($item->imagePath)){
        $image = $util->toImage($item->imagePath);
    }
    elseif(!empty($item->image)){
        $image = $util->toImage($item->image);
    }
    else{
        $image = $util->toImage('local/images/app/foto01.jpg');
    }
    @endphp
    <div class="slideItem h-100 " style="background-image: url('{{$image}}');background-size:cover;">
    <div class="slide-bgcolor h-100">
    <div class="p-2 w-100 m-0" style="white-spacex: pre-line; background-color: rgb(0,0,0,0.4); font-size: calc(0.6em + 0.4vw); line-height: 1.1;">
    <span style="white-space: pre-line;"">{{$item->title}}</span>
    </div>
    </div>
    </div>
    </a>
    <img class="icon_play rounded-circle" src="{{$util->toImage('local/images/icons/black_white_play.png')}}" />
    </li>
    @endforeach
    </ul>
</div>


@if(!empty($object))
    @php
        $footer = $object;
    @endphp
@endif

@if (!empty($footer->items))

@php
if (!empty($footer->bgColor)){
    $footerColor = strtolower($footer->bgColor);
    if($footerColor == 'light'){
        $bgColor = 'background-color:#F2F2F2;';
        $fontColor = 'color:#1C1C1C;';
    }elseif($footerColor == 'white'){
        $bgColor = 'background-color:#FFFFFF;';
        $fontColor = 'color:#1C1C1C;';


    }elseif($footerColor == 'dark'){
        $bgColor = 'background-color:#1C1C1C;';
        $fontColor = 'color:#E6E6E6;';
    }elseif($footerColor == 'black'){
        $bgColor = 'background-color:black;';
        $fontColor = 'color:#F2F2F2;';
    }elseif($footerColor == 'navyblue'){
        $bgColor = 'background-color:#0B173B;';
        $fontColor = 'color:#BDBDBD;';
    }elseif($footerColor == 'bordeaux'){
        $bgColor = 'background-color:#8A0808;';
        $fontColor = 'color:#FAFAFA;';


    }elseif($footerColor == 'marine'){
        $bgColor = 'background-color:#3A727E;';
        $fontColor = 'color:#FAFAFA;';
    }elseif($footerColor == 'lightbrown'){
        $bgColor = 'background-color:#A59A86;';
        $fontColor = 'color:#402F1D;';
    }elseif($footerColor == 'brown'){
        $bgColor = 'background-color:#4C3A26;';
        $fontColor = 'color:#FAFAFA;';
    }elseif($footerColor == 'blue'){
        $bgColor = 'background-color:#354F76;';
        $fontColor = 'color:#FAFAFA;';


    }else{
        $bgColor = 'background-color:black;';
        $fontColor = 'color:#F2F2F2';
    }
}else{
    $bgColor = 'background-color:black;';
    $fontColor = 'color:#F2F2F2;';
}
$arrayAlign = 'text-left';
$num_items = 0;
@endphp

<!-- Section footer -------------------------------------------->
<footer id="footer" class="d-none d-sm-block">
    @php
        if (!empty($footer->bgImageStorage)){
            $image = $footer->bgImageStorage;
        }
        elseif (!empty($footer->bgImagePath)){
            $image = $util->toImage($footer->bgImagePath);
        }
        elseif(!empty($footer->bgImage)){
            $image = $util->toImage($footer->bgImage);
        }else{
            $image = NULL;
        }
        if ($image != NULL){
            $bgColor = '';
            $fontColor = 'color:#FFFFFF;text-shadow: #000000 2px 1px 2px;';
            $background1 = 'background-image:url(' . $image . '); background-size:contain;';
            $background2 = 'background-image:url(' . $image . '); background-size:cover;';
        }
    @endphp
    @if (!empty($image))
    <div class="px-0 mt-2 mb-0" style="border-top: 1px solid #000000; {{$bgColor}} {{$fontColor}} {{$background1}};">
    <div style="background-color: rgb(0,0,0,0.6)">
    <div class="container-xl px-0 " style="{{$background2}}">
    <div class="pt-5 pb-5 px-2" style="background-color: rgb(0,0,0,0.6)">
    @else
    <div class="px-0 mt-2 mb-0" style="border-top: 1px solid #ccc; {{$bgColor}} {{$fontColor}}">
    <div class="container-xl pt-5 pb-5">
    @endif

    <div class="row w-100 m-0 p-0">
    <div class="col-md-4 d-none d-md-block pt-2 pl-2 pl-md-3 pl-lg-4">
    @php
    if (!empty($footer->logoStorage)){
        $image = $footer->logoStorage;
    }
    elseif(!empty($footer->logoPath)){
        $image = $util->toImage($footer->logoPath);
    }
    elseif($footer->logo){
        $image = $util->toImage($footer->logo);
    }
    @endphp

    @if (!empty($image))
    <a href="{{$util->toRoute('home')}}">
    <img src="{{$image}}" width="180px" height="45px" class="d-md-none d-lg-block mt-3">
    <img src="{{$image}}" width="160px" height="40px" class="d-md-block d-lg-none mt-3">
    </a>
    @endif

    @if (!empty($footer->label) && !empty($footer->route))
    <div class="mt-3 pl-2" >
    <a href="{{$util->toRoute($footer->route)}}" style="font-size:calc(14px + 0.15vw);{{$fontColor}}">{{$footer->label}}</a>
    </div>
    @endif

    </div>

    <div class="col-sm-12 col-md-8 pt-0">
    <div class="row">
    @foreach($footer->items as $key => $item)

    <div class="col-sm">
        <div class="nav mb-2 {{$arrayAlign}}" style="font-size:calc(14px + 0.21vw);font-weight:bold;">{{__($key)}}</div>
        <ul class="navbar-nav mr-autox {{$arrayAlign}}">
        @foreach($item as $listItem)
        @if(empty($listItem->route) OR $listItem->route == '#')
        <li class="nav-item"><a href="#" style="{{$fontColor}} font-size:calc(14px + 0.12vw); text-decoration:none;">{{$listItem->label}}</a></li>
        @elseif(!empty($listItem->route))
        @php
        $route = $util->toRoute($util->slug($key, '-'), $listItem->route);
        @endphp
        <li class=""><a href="{{$route}}" style="{{$fontColor}} font-size:calc(14px + 0.12vw); text-decoration:none;">{{$listItem->label}}</a></li>
        @endif
        @endforeach
        </ul>
    </div>
        @php
        $num_items ++;
        if ($num_items == 3){
            break;
        }
        @endphp
    @endforeach
    @if (!empty($footer->socialNetworks))

    @php
    $items = 0;
    foreach ($footer->socialNetworks as $item){
        $items ++;
    }
    if ($items > 4){
        $attributes = 'width="25px" height="25px"';
        $socialClass = 'mb-1';
    }else{
        $attributes = 'width="25px" height="25px"';
        $socialClass = 'mb-1';
    }

    if (!empty($footer->socialNetworks->iconColor)){
        if ($footer->socialNetworks->iconColor == 'white'){
            $icon = ['facebookwhite.jpg', 'instagramwhite.jpg', 'twitterwhite.jpg', 'pinterestwhite.jpg', 'youtubewhite.jpg'];
        }elseif($footer->socialNetworks->iconColor == 'black'){
            $icon = ['facebookblack.jpg', 'instagramblack.jpg', 'twitterblack.jpg', 'pinterestblack.jpg', 'youtubeblack.jpg'];
        }else{
            $icon = ['facebook.jpg', 'instagram.jpg', 'twitter.jpg', 'pinterest.jpg', 'youtube.jpg'];
            // $icon = ['facebookicon.jpg', 'instagramicon.jpg', 'twittericon.jpg', 'pinteresticon.jpg', 'youtubeicon.jpg'];
        }
    }else{
        $icon = ['facebook.jpg', 'instagram.jpg', 'twitter.jpg', 'pinterest.jpg', 'youtube.jpg'];
        // $icon = ['facebookicon.jpg', 'instagramicon.jpg', 'twittericon.jpg', 'pinteresticon.jpg', 'youtubeicon.jpg'];
    }
    @endphp

    <div id="social-network" class="text-right mr-2" style="width: 25px;">


    @if (!empty($footer->socialNetworks->facebook))
    <a href="{{$util->socialNetworkUrl('facebook', $footer->socialNetworks->facebook)}}" target="_blank" rel="noopener noreferrer" >
    <img src="{{$util->toImage('local/images/icons', $icon[0])}}" {!!$attributes!!} class="rounded-circle {{$socialClass}} shadow">
    </a>
    @endif
    @if (!empty($footer->socialNetworks->instagram))
    <a href="{{$util->socialNetworkUrl('instagram', $footer->socialNetworks->instagram)}}" target="_blank" rel="noopener noreferrer">
    <img src="{{$util->toImage('local/images/icons', $icon[1])}}" {!!$attributes!!} class="rounded-circle {{$socialClass}} shadow">
     </a>
    @endif
    @if (!empty($footer->socialNetworks->twitter))
    <a href="{{$util->socialNetworkUrl('twitter', $footer->socialNetworks->twitter)}}" target="_blank" rel="noopener noreferrer">
    <img src="{{$util->toImage('local/images/icons', $icon[2])}}" {!!$attributes!!} class="rounded-circle {{$socialClass}} shadow">
    </a>
    @endif
    @if (!empty($footer->socialNetworks->pinterest))
    <a href="{{$util->socialNetworkUrl('pinterest', $footer->socialNetworks->pinterest)}}" target="_blank" rel="noopener noreferrer">
    <img src="{{$util->toImage('local/images/icons', $icon[3])}}" {!!$attributes!!} class="rounded-circle {{$socialClass}} shadow">
    </a>
    @endif
    @if (!empty($footer->socialNetworks->youtube))
    <a href="{{$util->socialNetworkUrl('youtube', $footer->socialNetworks->youtube)}}" target="_blank" rel="noopener noreferrer">
    <img src="{{$util->toImage('local/images/icons', $icon[4])}}" {!!$attributes!!} class="rounded-circle {{$socialClass}} shadow">
    </a>
    @endif
    </div>
    @endif
    </div>
    </div>
    </div>
</div>
@if (!empty($footer->bgImage) && !empty($footer->bgImagePath))
</div>
</div>
@endif
</div>
</footer>
<!--End Section ------------------------------------------------>
@else

{{--messageNull component Blogcardes ==========================================--}}
<x-laraflex::shared.messagenull />

@endif

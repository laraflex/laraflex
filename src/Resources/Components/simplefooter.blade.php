@if(!empty($object))
    @php
        $footer = $object;
    @endphp
@endif

@if (!empty($footer))

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
        $fontColor = 'color:#A4A4A4;';
    }elseif($footerColor == 'black'){
        $bgColor = 'background-color:black;';
        $fontColor = 'color:#848484;';
    }elseif($footerColor == 'navyblue'){
        $bgColor = 'background-color:#0B173B;';
        $fontColor = 'color:#BDBDBD;';
    }elseif($footerColor == 'bordeaux'){
        $bgColor = 'background-color:#8A0808;';
        $fontColor = 'color:#FAFAFA;';

    }elseif($footerColor == 'marine'){
        $bgColor = 'background-color:#3A727E;';
        $fontColor = 'color:#F2F2F2;';
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
        $fontColor = 'color:#FAFAFA;';
    }
}else{
    $bgColor = 'background-color:#FFFFFF;';
    $fontColor = 'color:#1C1C1C;';
}
$arrayAlign = 'text-left';
@endphp

<footer id="footer" class="footer mt-auto">

<div class="px-0 pt-3 mb-0 d-none d-sm-block" style="border-top: 1px solid #ccc; {{$bgColor}} {{$fontColor}}">

<div class="container-xl pt-2 pb-4">
<div class="row w-100 m-0 p-0">
    <div class="col-5 col-md-3 pl-0">
    @php
    if (!empty($footer->logoStorage)){
        $image = $footer->logoStorage;
    }
    elseif (!empty($footer->logoPath)){
        $image = $util->toImage($footer->logoPath);
    }elseif(!empty($footer->logo)){
        $image = $util->toImage($footer->logo);
    }
    @endphp
    @if (!empty($image))
    <a href="{{$util->toRoute('home')}}">
    <img src="{{$image}}" width="170px" height="42px" class="d-none d-lg-block">
    <img src="{{$image}}" width="130px" height="32px" class="d-block d-lg-none">
    </a>
    @endif
    </div>
    <div class="col-md-6 text-center d-none d-md-block p-2">
    @if (!empty($footer->label))
    <span style="{{$fontColor}} font-size:calc(14px + 0.10vw);"><small>{{$footer->label}}</small></span>
    @else
    <span style="{{$fontColor}} font-size:calc(14px + 0.10vw);"><small>All rights reserved. © Laraflex.com. 2019</small></span>
    @endif
    </div>

    <div id="social-network" class="col-7 col-md-3 pt-0 pt-2 text-right">
    <div class="social-network">
    @if (!empty($footer->socialNetworks))
    @php
    $attributes = 'width="25px" height="25px"';

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

    @if (!empty($footer->socialNetworks->facebook))
    <a href="{{$util->socialNetworkUrl('facebook', $footer->socialNetworks->facebook)}}" target="_blank" rel="noopener noreferrer">
    <img src="{{$util->toImage('images/icons', $icon[0])}}" {!!$attributes!!} class="rounded-circle shadow">
    </a>
    @endif
    @if (!empty($footer->socialNetworks->instagram))
    <a href="{{$util->socialNetworkUrl('instagram', $footer->socialNetworks->instagram)}}" target="_blank" rel="noopener noreferrer">
    <img src="{{$util->toImage('images/icons', $icon[1])}}" {!!$attributes!!} class="rounded-circle shadow">
    </a>
    @endif

    @if (!empty($footer->socialNetworks->twitter))
    <a href="{{$util->socialNetworkUrl('twitter', $footer->socialNetworks->twitter)}}" target="_blank" rel="noopener noreferrer">
    <img src="{{$util->toImage('images/icons', $icon[2])}}" {!!$attributes!!} class="rounded-circle shadow">
    </a>
    @endif

    @if (!empty($footer->socialNetworks->pinterest))
    <a href="{{$util->socialNetworkUrl('pinterest', $footer->socialNetworks->pinterest)}}" target="_blank" rel="noopener noreferrer">
    <img src="{{$util->toImage('images/icons', $icon[3])}}" {!!$attributes!!} class="rounded-circle shadow">
    </a>
    @endif
    @if (!empty($footer->socialNetworks->youtube))
    <a href="{{$util->socialNetworkUrl('youtube', $footer->socialNetworks->youtube)}}" target="_blank" rel="noopener noreferrer">
    <img src="{{$util->toImage('images/icons', $icon[4])}}" {!!$attributes!!} class="rounded-circle shadow">
    </a>
    @endif

    @endif
    </div>
    </div>

</div>
</div>
</div>

{{--########################################################-------}}

<div class="d-block d-sm-none" style="height:68px;"></div>
<div class="navbar fixed-bottom px-0 pt-1 mb-0 d-block d-sm-none" style="border-top: 1px solid #ccc; {{$bgColor}} {{$fontColor}}">

<div class="container-xl pt-2 pb-1">
<div class="row w-100 m-0 p-0">
    <div class="col-5 col-md-3 pl-0">
    @php
    if (!empty($footer->logoStorage)){
        $image = $footer->logoStorage;
    }elseif(!empty($footer->logoPath)){
        $image = $util->toImage($footer->logoPath);
    }elseif(!empty($footer->logo)){
        $image = $util->toImage($footer->logo);
    }
    @endphp
    @if (!empty($image))
    <a href="{{$util->toRoute('home')}}">
    <img src="{{$image}}" width="130px" height="32px" class="d-block d-sm-none mt-1x">
    </a>
    @endif
    </div>

    <div id="social-network" class="col-7 col-md-3 pt-0 pt-2x text-right">
    <div class="social-network">
    @if (!empty($footer->socialNetworks))
    @php
    $attributes = 'width="25px" height="25px"';

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

    @if (!empty($footer->socialNetworks->facebook))
    <a href="{{$util->socialNetworkUrl('facebook', $footer->socialNetworks->facebook)}}" target="_blank" rel="noopener noreferrer">
    <img src="{{$util->toImage('images/icons', $icon[0])}}" {!!$attributes!!} class="rounded-circle shadow">
    </a>
    @endif
    @if (!empty($footer->socialNetworks->instagram))
    <a href="{{$util->socialNetworkUrl('instagram', $footer->socialNetworks->instagram)}}" target="_blank" rel="noopener noreferrer">
    <img src="{{$util->toImage('images/icons', $icon[1])}}" {!!$attributes!!} class="rounded-circle shadow">
    </a>
    @endif

    @if (!empty($footer->socialNetworks->twitter))
    <a href="{{$util->socialNetworkUrl('twitter', $footer->socialNetworks->twitter)}}" target="_blank" rel="noopener noreferrer">
    <img src="{{$util->toImage('images/icons', $icon[2])}}" {!!$attributes!!} class="rounded-circle shadow">
    </a>
    @endif

    @if (!empty($footer->socialNetworks->pinterest))
    <a href="{{$util->socialNetworkUrl('pinterest', $footer->socialNetworks->pinterest)}}" target="_blank" rel="noopener noreferrer">
    <img src="{{$util->toImage('images/icons', $icon[3])}}" {!!$attributes!!} class="rounded-circle shadow">
    </a>
    @endif
    @if (!empty($footer->socialNetworks->youtube))
    <a href="{{$util->socialNetworkUrl('youtube', $footer->socialNetworks->youtube)}}" target="_blank" rel="noopener noreferrer">
    <img src="{{$util->toImage('images/icons', $icon[4])}}" {!!$attributes!!} class="rounded-circle shadow">
    </a>
    @endif

    @endif
    </div>
    </div>

</div>
</div>
</div>

</footer>

@endif

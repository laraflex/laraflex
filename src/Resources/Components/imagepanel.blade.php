@if (!empty($objectHeader))
@php
    $imagePanel = $objectHeader;

    if (!empty($imagePanel->imageStorage)){
            $image = $imagePanel->imageStorage;
        }
        elseif (!empty($imagePanel->imagePath)){
            $image = $util->toImage($imagePanel->imagePath);
        }
        elseif (!empty($imagePanel->image)){
            $image = $util->toImage($imagePanel->image);
        }
        else{
            $image = $util->toImage('local/images/app/imagepanel1.jpg');
        }
@endphp
<div class="overflow-hidden p-3 p-md-5 mb-0 mb-md-2 text-center bg-secondary" style="background-image:url({{$image}}); background-size:cover;">
    @php
        if (!empty($imagePanel->fontColor)) {

            if ($imagePanel->fontColor == 'white' OR $imagePanel->fontColor == '#FFFFFF'){
                $fontStyleColor = 'color: #FFFFFF; text-shadow: 2px 2px 2px #272424;';
                $btnClassStyle = 'btn-light';
                $btnColor = '';
            }elseif ($imagePanel->fontColor == 'dark' OR $imagePanel->fontColor == '#000000'){
                $fontStyleColor = 'color: #000000; text-shadow: 2px 2px 2px #8a8888;';
                $btnClassStyle = 'btn-dark';
                $btnColor = '';
            }else{
                $fontStyleColor = 'color:' . $imagePanel->fontColor . '; text-shadow: 2px 2px 2px #ecedf1;';
                $btnClassStyle = 'btn-secondary';
                $btnColor = 'background-color:' . $imagePanel->fontColor . ';';
            }
        }else {
            $fontStyleColor = 'color: #FFFFFF; text-shadow: 2px 2px 2px #272424;';
            $btnClassStyle = 'btn-light';
        }

        $fontSizeTitle = 'line-height:calc(0.96em + 0.9vw); font-size:calc(0.5em + 2.2vw);';
        $fontSizeLegend = ''; //font-size:calc(0.8em + 0.7vw);';
        $fontBtn = 'font-size:calc(0.4em + 0.8vw);';
        if (!empty($imagePanel->fontFamilyTitle)){
            $fontFamilyTitle = 'font-family:' . $imagePanel->fontFamilyTitle . ';';
        }else{
            $fontFamilyTitle = '';
        }

    @endphp

    @include('laraflex::ComponentParts.imagepanel.content')

  </div>
@else
 {{--messageNull component Blogcardes ==========================================--}}
<x-laraflex::shared.messagenull />
@endif

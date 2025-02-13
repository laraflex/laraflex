{{--This component should only be added with PHP include--}}
@if (!empty($gridcards->route))
    @php
    if (!empty($gridcards->target) && $gridcards->target == 'blank'){
       $target = 'target="_blank"';
    }else{
       $target = '';
    }
    if (!empty($gridcards->styles->fileStyle) && $gridcards->styles->fileStyle === true){
       $target = 'target="_blank"';
    }
    @endphp
    <a class="" href="{{$util->toRoute($gridcards->route, $item->id)}}" role="button" rel="noopener noreferrer" {!!$target!!}>
@else
    <a href="#">
@endif
    {{--Bloco de imagem ------------------------------------------------}}
    @php
    if (!empty($gridcards->styles->fileStyle) && $gridcards->styles->fileStyle === true){
        $icons_var = ['icon_file01.jpg','icon_file02.jpg','icon_file03.jpg','icon_file04.jpg','icon_file05.jpg','icon_file06.jpg','icon_file07.jpg','icon_file08.jpg','icon_file09.jpg',
        'icon_file10.jpg','icon_file11.jpg','icon_file12.jpg','icon_file01.jpg','icon_file02.jpg','icon_file03.jpg','icon_file04.jpg','icon_file05.jpg','icon_file06.jpg','icon_file07.jpg',
        'icon_file08.jpg','icon_file09.jpg','icon_file10.jpg','icon_file11.jpg','icon_file12.jpg','icon_file01.jpg','icon_file02.jpg','icon_file03.jpg','icon_file04.jpg','icon_file05.jpg',
        'icon_file06.jpg','icon_file07.jpg','icon_file08.jpg','icon_file09.jpg','icon_file10.jpg','icon_file11.jpg','icon_file12.jpg',];
        $num_var = 0;
        if (!empty($gridcards->styles->bgStyle) && $gridcards->styles->bgStyle === 'image'){
            if ($key >= 34) {
                $num_var = $key - 36;
            }elseif ($key >= 68){
                $num_var = $key - 72;
            }else{
                $num_var = $key;
            }
            $image = $util->toImage('local/images/icons_file', $icons_var[$num_var]);
            //$image = 'local/images/icons_file/' . $icons_var[$num_var];
            $bgRound = 'rounded img-thumbnail';
        }else{
            $image = $util->toImage('local/images/icons', 'pdf.png');
            //$image = 'local/images/icons/pdf.png';
        }
    }else{
        if (!empty($item->imageStorage)){
            $image = $item->imageStorage;
        }
        elseif (!empty($item->imagePath)){
            $image = $util->toImage($item->imagePath);
        }
        elseif(!empty($item->image)){
            $image = $util->toImage($item->image);
        }else{
            $image = $util->toImage('local/images/app', 'foto01.jpg');
        }
    }
    @endphp
    <img src="{{$image}}" class="img-fluid {{$bgRound}}" {!!$alt!!}>
    {{--End Bloco de imagem ------------------------------------------------}}
</a>

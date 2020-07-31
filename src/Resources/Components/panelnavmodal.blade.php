@php
if (!empty($objectHeader)){
    $panelnav = $objectHeader;
}

if (!empty($panelnav->bgImageStorage)){
    $bgImage = $panelnav->bgImageStorage;
}
elseif (!empty($panelnav->bgImagePath)){
    $bgImage = $util->toImage($panelnav->bgImagePath);
}
elseif(!empty($panelnav->bgImage)){
    $bgImage = $util->toImage($panelnav->bgImage);
}else{
    $bgImage = '';
}
@endphp

@if (!empty($panelnav))
<section id="panelnavmodal">
<div style="height:4px; border-bottom:1px solid #000;border-top: 1px solid #000;"></div>

<div id="panelnav" class="p-0" style="background-image: url({{$bgImage}});background-size:contain;width:100%;">
<div class="py-3xx" style="background-color:rgba(0,0,0, 0.3);">

<div class="jumbotronx text-white container-xl p-0" style="background-image: url({{$bgImage}});background-size:cover;">
<div class="px-0 p-4 p-md-5 mx-3">

    @if (!empty($panelnav->title))
    <div class="pb-1 pl-5 pl-xl-0" style="font-size:calc(14px + 1.8vw);line-height:calc(15px + 1.8vw); text-shadow: 2px 2px 3px #6E6E6E;">
    {{$panelnav->title}}
    </div>
    @if (!empty($panelnav->subTitle))
    <div class="py-1 py-md-2 pl-4 mt-2 rounded" style="background-color:rgb(0,0,0,0.5); color:#FFF;font-size:calc(12px + 0.8vw);line-height:calc(14px + 1.0vw);text-shadow: 2px 2px 3px #000;">
    {{$panelnav->subTitle}}</div>
    @endif
    @endif
    <div class="pt-3 pt-md-4 pl-5 pl-xl-0">

        <button type="button" class="btn btn-outline-lightx btn-light d-none d-md-block" data-toggle="modal" data-target="#panelnavModal">
        <span class="ml-2 mr-2" translate="no">Sumário</span>
        <i class="fas fa-bars"></i>
        </button>
        <button type="button" class="btn btn-sm btn-outline-lightx btn-light d-block d-md-none" data-toggle="modal" data-target="#panelnavModal">
        <span class="ml-2 mr-2" translate="no">Sumário</span>
        <i class="fas fa-bars"></i>
        </button>

    </div>
</div>
</div>

</div>

</div>

  <!-- Modal -->
  <div class="modal fade" id="panelnavModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="panelnavModalLabel" aria-hidden="true">
    <div class="modal-dialog float-left ml-2 ml-md-5" style="min-widthx:340px;">
      <div class="modal-content" style="min-width:340px;">
        <div class="modal-header p-2">
           <img src="{{$util->toImage('images/app/etiqueta.jpg')}}" style="width: 60%;">
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
        </div>
        <div class="modal-body p-2 border">

        @if(!empty($panelnav->items) && !empty($panelnav->route))

        <div class="accordion" id="navmodal">

            @foreach($panelnav->items as $i => $item)
            @if (!empty($item->label) && !empty($item->id))

            @if (property_exists($item, 'subItems'))
            {{-------------------------------}}
            <div class="cardx">

                <div class="card-headerx" id="{{'heading' . $i}}">
                   <div class="" style="margin-bottom:1px;">
                     <a class="btn list-group-item btn p-2 text-left" type="button" data-toggle="collapse" data-target="#{{'collapse' . $i}}" aria-expanded="true" aria-controls="#{{'collapse' . $i}}">
                         <i class="fas fa-archive fa-border mx-1" aria-hidden="true"></i>
                         <span class="mr-3">{{$item->label}}</span>
                         <i class="fas fa-plus mr-2" style="float: right; margin: 5px 20px 0px 0px;"></i>
                     </a>
                   </div>
                 </div>

               <div id="{{'collapse' . $i}}" class="collapse " aria-labelledby="headingOne" data-parent="#navmodal">
                 <div class="ml-3">
                     @foreach($item->subItems as $key => $subItem)
                     @if (!empty($subItem->label) && !empty($subItem->id))
                     @if ($key == 0)
                     <a class="nav-link btn active p-2 text-left" type="button" href="{{$util->toRoute($panelnav->route, $subItem->id)}}" style="border-topx: 1px #ccc dashed;border-bottomx: 1px #ccc dashed">
                     @else
                     <a class="nav-link btn active p-2 text-left" type="button" href="{{$util->toRoute($panelnav->route, $subItem->id)}}" style="border-top: 1px #ccc dashed;">
                     @endif
                         <div class="" >
                         <i class="fas fa-genderless mr-2" aria-hidden="true"></i>
                         {{$subItem->label}}
                         </div>
                     </a>
                     @endif
                     @endforeach

                 </div>
               </div>

             </div>
            {{---------------------------------------------}}
            @else

            <div class="cardx list-group">
                <div class="card-headerx" id="{{'heading' . $i}}">
                  <div class="" style="margin-bottom:1px;">
                    <a class="list-group-item btn p-2 text-left" href="{{$util->toRoute($panelnav->route, $item->id)}}" style="border-bottomxx: 1px #ccc dashed">
                    <div class="" >
                    @php
                    $tag = str_split($item->label);
                    @endphp
                    <span class="badge badge-light border mx-1" style="font-family:TimesNews;font-size:1em">{{$tag[0]}}</span>
                    {{$item->label}}
                    </div>
                    </a>
                  </div>
                </div>
            </div>

            @endif
            @endif
            @endforeach

        </div>

        @endif
        </div>
        <div class="modal-footer p-3">

        </div>
      </div>
    </div>
  </div>
  <div style="height:4px; border-bottom:1px solid #000;border-top: 1px solid #000;"></div>

</section>
@endif

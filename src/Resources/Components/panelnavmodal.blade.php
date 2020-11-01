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

if (!empty($panelnav->logoStorage)){
    $logo = $panelnav->logoStorage;
}
elseif (!empty($panelnav->logoPath)){
    $logo = $util->toImage($panelnav->logoPath);
}
elseif(!empty($panelnav->logo)){
    $logo = $util->toImage($panelnav->logo);
}
@endphp

@if (!empty($panelnav))
<section id="panelnavmodal" class="m-0 p-0">
<div style="height:4px; border-bottom:1px solid #000;border-top: 1px solid #000;" class="m-0 p-0"></div>

<div id="panelnav" class="p-0 m-0" style="background-image: url({{$bgImage}});background-size:contain;width:100%;">
<div class="" style="background-color:rgba(0,0,0, 0.3);">

<div class="jumbotronx text-white container-xl p-0" style="background-image: url({{$bgImage}});background-size:cover;">

<div class="row p-0 m-0">
@if (!empty($logo))
<div class="col-12 pr-4 pr-md-5 py-3">
<img class="float-right {{--mx-auto d-block--}}" src="{{$logo}}" style="width:calc(120px + 5vw)" />
</div>
@else
<div class="col-12 pr-4 pr-md-5  py-4 py-sm-5  mb-2 mb-xl-3">
</div>
@endif

<div class="col-12 px-0 px-4 px-md-5 pb-3 pb-lg-4">

    @if (!empty($panelnav->title))
    <div class="pb-1 m-0 mt-2" style="font-size:calc(14px + 1.8vw);line-height:calc(15px + 1.8vw); text-shadow: 2px 2px 3px #6E6E6E;">
    {{$panelnav->title}}
    </div>
    @if (!empty($panelnav->subTitle))
    <div class="py-1 py-md-2 pl-4 mt-2 mt-md-3 rounded m-0" style="width:70%; background-color:rgb(0,0,0,0.5); color:#FFF;font-size:calc(12px + 0.8vw);line-height:calc(14px + 1.0vw);text-shadow: 2px 2px 3px #000;">
    {{$panelnav->subTitle}}</div>
    @endif
    @endif


    <div class="mt-3 mt-md-4">
        @php
        if (!empty($panelnav->btnLabel)){
            $btnLabel = $panelnav->btnLabel;
        }else{
            $btnLabel = 'Summary';
        }
        @endphp
        <button type="button" class="btn btn-outline-lightx btn-light d-none d-md-block" data-toggle="modal" data-target="#panelnavModal">
        <span class="ml-2 mr-2" translate="no">{{__($btnLabel)}}</span>
        <i class="fas fa-bars"></i>
        </button>
        <button type="button" class="btn btn-sm btn-outline-lightx btn-light d-block d-md-none" data-toggle="modal" data-target="#panelnavModal">
        <span class="ml-2 mr-2" translate="no">{{__($btnLabel)}}</span>
        <i class="fas fa-bars"></i>
        </button>
    </div>
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
           <img src="{{$util->toImage('local/images/app/etiqueta.jpg')}}" style="width: 60%;">
           <h4 class="" style="position:absolute; left:20px; top:15px;font-family:verdana; color: #FFFFFF;text-shadow: 2px 2px 3px #6E6E6E;">
            {{__($btnLabel)}}</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
        </div>
        <div class="modal-body p-2 border">
        @if(!empty($panelnav->items) && !empty($panelnav->route))
        <div class="accordion" id="navmodal">
            @foreach($panelnav->items as $i => $item)
            @if (!empty($item->label))
            @if (property_exists($item, 'subItems'))
            {{-------------------------------}}
            <div class="cardx">
                <div class="card-headerx" id="{{'heading' . $i}}">
                   <div class="" style="margin-bottom:1px;">
                     <a class="btn list-group-item btn p-2 text-left" type="button" data-toggle="collapse" data-target="#{{'collapse' . $i}}" aria-expanded="true" aria-controls="#{{'collapse' . $i}}">
                         <i class="fas fa-archive fa-border mx-1" aria-hidden="true"></i>
                         <span class="mr-3" style="font-size:calc(13px + 0.10vw);">{{$item->label}}</span>
                         <i class="fas fa-plus mr-2" style="float: right; margin: 5px 20px 0px 0px;"></i>
                     </a>
                   </div>
                 </div>
               <div id="{{'collapse' . $i}}" class="collapse " aria-labelledby="headingOne" data-parent="#navmodal">
                 <div class="ml-3">
                     @foreach($item->subItems as $key => $subItem)

                     @if (!empty($subItem->label))
                     @php
                     if (!empty($subItem->id)){
                         $route = $util->toRoute($panelnav->route, $subItem->id);
                     }elseif(!empty($subItem->route)){
                        $route = $util->toRoute($panelnav->route, $subItem->route);
                     }else{
                         $route = '';
                     }
                     @endphp
                     @if ($key == 0)
                     <a class="nav-link btn active p-2 text-left" type="button" href="{{$route}}" style="border-topx: 1px #ccc dashed;border-bottomx: 1px #ccc dashed">
                     @else
                     <a class="nav-link btn active p-2 text-left" type="button" href="{{$route}}" style="border-top: 1px #ccc dashed;">
                     @endif
                         <div class="" >
                         <i class="fas fa-genderless mr-2" aria-hidden="true"></i>
                         <span style="font-size:calc(13px + 0.10vw);">
                         {{$subItem->label}}
                         </span>
                         </div>
                     </a>
                     @endif
                     @endforeach
                 </div>
               </div>

             </div>
            {{---------------------------------------------}}
            @else
            @php
            if (!empty($item->id)){
                $routeLabel = $util->toRoute($panelnav->route, $item->id);
            }elseif(!empty($item->route)){
                $routeLabel = $util->toRoute($panelnav->route, $item->route);
            }else{
                $routeLabel = NULL;
            }
            @endphp
            <div class="cardx list-group">
                <div class="card-headerx" id="{{'heading' . $i}}">
                  <div class="" style="margin-bottom:1px;">
                    <a class="list-group-item btn p-2 text-left" href="{{$routeLabel}}" style="border-bottomxx: 1px #ccc dashed">
                    <div class="" >
                    @php
                    $tag = str_split($item->label);
                    @endphp
                    <span class="badge badge-light border mx-1" style="font-family:TimesNews;font-size:1em">{{$tag[0]}}</span>
                    <span style="font-size:calc(13px + 0.10vw);">
                    {{$item->label}}
                    </span>
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
  <div style="height:4px; border-bottom:1px solid #000;border-top: 1px solid #000;" class="m-0 p-0"></div>
</section>
@endif

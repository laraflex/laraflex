@php
if(!empty($objectConfig)){
   $objetoConfig = $objectConfig;
}
//Gestão de comonentes objectHeader =========================================
if (!empty($objectHeader)){
    $itemHeader = $objectHeader;
    $objetoConfig->headerComponents[] = $itemHeader;
}

if (!empty($arrayObjectsHeader)){
    foreach ($arrayObjectsHeader as $objectHeader){
        $itemHeader = $objectHeader;
        $objetoConfig->headerComponents[] = $itemHeader;
    }
}

if(!empty($objetoConfig->headerComponents)){
    foreach($objetoConfig->headerComponents as $headerItem){
        if (property_exists($headerItem, "dependencies") && !empty($headerItem->dependencies)){
            foreach($headerItem->dependencies as $value){
                $objetoConfig->dependencies[] = $value;
            }
        }
    }
}
//Fim do bloco de componentes ObjectHeader ======================================

if(!empty($arrayObjetos)){
    $arrayItems = $arrayObjetos;
}elseif(!empty($arrayObjects)){
    $arrayItems = $arrayObjects;
}

/**
 * Adicionando componentes na página
 */
if(!empty($arrayItems)){

    foreach($arrayItems as $item){
        $objetoConfig->components[] = $item;
    }
}else{
    if(!empty($objeto)){
        $item = $objeto;
    }elseif(!empty($object)){
        $item = $object;
    }
    if (!empty($item)){
        $objetoConfig->components[] = $item;
    }
}

/**
 * Adicionando dependencias a componentes de cabeçalho ao ArrayListener
 */
 if (!empty($objetoConfig->headerComponents)){
    if (!empty($arrayListeners = $objectListener->dependencies($objetoConfig->headerComponents))){

        foreach ($arrayListeners as $itemListener){
            foreach($itemListener as $item){
                $objetoConfig->dependencies[] = $item;
            }
        }
    }
 }

/**
 * ============================================================================
 * Adicionando dependencias de componentes ao ArrayListener
 * ============================================================================
 */
if (!empty($objetoConfig->components)){

    if (!empty($arrayListeners = $objectListener->dependencies($objetoConfig->components))){
        foreach ($arrayListeners as $itemListener){
            foreach($itemListener as $item){
                $objetoConfig->dependencies[] = $item;
            }
        }
    }




    /**
     * Adicionando dependencias de components
    */
    foreach ($objetoConfig->components as $item){
        if (!empty($item)) {
            if (property_exists($item, "dependencies") && !empty($item->dependencies)){
                foreach($item->dependencies as $value){
                    if (is_array($value)){
                        foreach ($value as $item){
                            $objetoConfig->dependencies[] = $item;
                        }

                    }else{
                        $objetoConfig->dependencies[] = $value;
                    }

                }
            }
        }
    }
}


/*
* =======================================================================
* Componentes para a área de BLOGCOMPONENTS
* =======================================================================
*/


if (!empty($objectBlog)){

    $objetoConfig->blogComponents[] = $objectBlog;
}

if (!empty($arrayObjectsBlog)){
    foreach ($arrayObjectsBlog as $item){

        $objetoConfig->blogComponents[] = $item;
    }
}
/*
* Adicionando dependencias de BLOGCOMPONENTS
*/

if(!empty($objetoConfig->blogComponents)){

    if (!empty($arrayListeners = $objectListener->dependencies($objetoConfig->blogComponents))){
        foreach ($arrayListeners as $itemListener){
            foreach($itemListener as $item){
                $objetoConfig->dependencies[] = $item;
            }
        }
    }


    foreach($objetoConfig->blogComponents as $blogItem){
        if (property_exists($blogItem, "dependencies") && !empty($blogItem->dependencies)){
            foreach($blogItem->dependencies as $value){
                $objetoConfig->dependencies[] = $value;
            }
        }
    }
}

@endphp

{{---Inclusaão de metas de página-------------------------------------}}
@if (!empty($objetoConfig->meta))
@foreach ($objetoConfig->meta as $item)
<meta name="{{$item->name}}" content="{{$item->content}}">
@endforeach

@endif
{{--Inclusão tag meta de componentes--}}
@if (!empty($objetoConfig->dependencies))
@foreach ($objetoConfig->dependencies as $itemDependency)
@if (!empty($itemDependency->type) && $itemDependency->type == 'meta')
<meta name="{{$itemDependency->name}}" content="{{$itemDependency->content}}">
@endif
@endforeach
@endif

<?php
namespace laraflex\ViewHelpers;

use Illuminate\Support\Facades\Auth;

Trait AccessControl {

    /**
     * Métodos que irão substituir os anteriores.
     */

    public function verify($policy, $parameter)
    {
        if (Auth::check() && Auth::user()->can($policy, $parameter)){
            return true;
        }else{
            return false;
        }
    }

    public function checkAllPermissions($arrayTmp)
    {
        $arrayItems = array();
        if (array_key_exists('items', $arrayTmp)){
            foreach ($arrayTmp['items'] as $key => $item){

                if (array_key_exists('permission', $item)){
                    if ($item['permission'] === true){
                        if ($subItem = $this->checkSubItems($item)){
                            $item['subItems'] = $subItem;
                        }
                        $arrayItems['items'][] = $item;

                    }
                }else{
                    if ($subItem = $this->checkSubItems($item)){
                        $item['subItems'] = $subItem;
                    }
                    $arrayItems['items'][] = $item;
                }
            }
        }
        $arrayTmp['items'] = $arrayItems['items'];
        return $arrayTmp;
    }

    protected function checkSubItems($item){
        $arraySubItems = array();
        if (array_key_exists('subItems', $item)){
            foreach ($item['subItems'] as $k => $subItem){
                if (array_key_exists('permission', $subItem)){
                    if($subItem['permission'] === true){
                        $arraySubItems[] = $subItem;
                    }
                }else{
                    $arraySubItems[] = $subItem;
                }
            }
            return $arraySubItems;
        }else{
            return false;
        }
    }

    public function getAccessArray($policy, $data){
        $dataTmp = array();
        foreach ($data as $key => $item){
            if (Auth()->check() && Auth()->user()->can($policy, $item)){
               $dataTmp[] = $item;
            }
        }
        return $dataTmp;
    }

    public function getAccessObjects($policy, $data){
            $jsonTmp = json_encode($this->getAccessArray($policy, $data));
            $object = json_decode($jsonTmp);
            return $object;
    }

    /**
     * Métodos que serão depreciados.
     */

    public function getPermission($policy, $parameter)
    {
        if (Auth::check() && Auth::user()->can($policy, $parameter)){
            return true;
        }else{
            return false;
        }
    }

    public function checkPermissions($arrayTmp)
    {
        if (array_key_exists('items', $arrayTmp)){
            foreach ($arrayTmp['items'] as $key => $item){
                if (array_key_exists('permission', $item)){
                    if ($item['permission'] === false){
                        unset($arrayTmp['items'][$key]);
                    }
                }
                if (array_key_exists('subItems', $item)){
                    foreach ($item['subItems'] as $k => $subItem){
                        if (array_key_exists('permission', $subItem)){
                            if($subItem['permission'] === false){
                                unset($arrayTmp['items'][$key]['subItems'][$k]);
                            }
                        }
                    }
                }
            }
        }
        return $arrayTmp;
    }

}


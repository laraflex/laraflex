<?php
namespace laraflex\ViewHelpers;

use Illuminate\Support\Facades\Auth;

Trait AccessControl {


    /**
     * Metodos que irão substituir os anteriores
     */

    public function verify($policy, $parameter)
    {
        return Auth::check() && Auth::user()->can($policy, $parameter);
    }

    public function checkAllPermissions($arrayTmp)
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

    /**
     * Métodos que serão depreciados
     */

    public function getPermission($policy, $parameter = Null)
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
    /*
    public function getAccessArray($policy, $data){
        $dataTmp = array();
        foreach ($data as $key => $items){
            if (Auth()->check() && Auth()->user()->can($policy, $items)){
               $dataTmp[] = $items;
            }
        }
        return $dataTmp;
    }

    public function getAccessObjects($policy, $data){
            $jsonTmp = json_encode($this->getAccessArray($policy, $data));
            return json_decode($jsonTmp);
    }
    */
}

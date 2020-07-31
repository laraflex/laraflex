<?php
namespace laraflex\Contracts;


abstract class ModelMediator
{
    public function toArray ($data)
    {
        $var = array();
        return $var;
    }

    /**
     * Return Json
     */
    public function Json ($data)
    {
        if (!empty($data)){
            return json_encode($this->toArray($data));
        }else{
            return NULL;
        }
    }
    /**
     * Return object Json
     */
    public function objectJson($data)
    {
        if (!empty($data)){
            return json_decode($this->Json($data));
        }else{
            return NULL;
        }
    }

    public function object($data)
    {
        if (!empty($data)){
            return json_decode($this->Json($data));
        }else{
            return NULL;
        }
    }

    // 88888888888888888888888888888888888888888888888888888888
    /**
     * Return a collection
     */
    public function collection($collection)
    {
        if (empty($collection)){
            return NULL;
        }
        $collectionTmp = array();
        foreach($collection as $item)
        {
            $itemTmp = $this->toArray($item);
            if($itemTmp != NULL){
                $collectionTmp[] = $this->toArray($item);
            }else{
                return NULL;
            }

        }
        return $collectionTmp;
    }
    /**
     * Return Json collection
     */
    public function jsonCollection($collection)
    {
        if (empty($collection)){
            return NULL;
        }
        $collectionTmp = array();
        foreach($collection as $item)
        {
            $itemTmp = $this->toArray($item);
            if($itemTmp != NULL){
                $collectionTmp[] = $this->toArray($item);
            }else{
                return NULL;
            }
        }
        return json_encode($collectionTmp);
    }
    /**
     * Return collection object Json
     */
    public function objectCollection($collection)
    {
        if (empty($collection)){
            return NULL;
        }
        $collectionTmp = array();
        foreach($collection as $item)
        {
            $itemTmp = $this->toArray($item);
            if($itemTmp != NULL){
                $collectionTmp[] = $this->toArray($item);
            }else{
                return NULL;
            }
        }
        $jsonFormat = json_encode($collectionTmp);

        return json_decode($jsonFormat);
    }
}

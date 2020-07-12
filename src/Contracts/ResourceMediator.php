<?php
namespace laraflex\Contracts;

abstract class ResourceMediator
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
        return json_encode($this->toArray($data));
    }
    /**
     * Return object Json
     */
    public function objectJson($data)
    {
        return json_decode($this->Json($data));
    }

    // 88888888888888888888888888888888888888888888888888888888
    /**
     * Return a collection
     */
    public function collection($collection)
    {
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

<?php
namespace laraflex\Contracts;

abstract class ResourceMediator
{
    public function toArray ($data, $type = NULL)
    {
        $var = array();
        return $var;
    }

    /**
     * Return Json
     */
    public function Json ($data, $type = NULL)
    {
        return json_encode($this->toArray($data, $type));
    }
    /**
     * Return object Json
     */
    public function objectJson($data, $type = NULL)
    {
        return json_decode($this->Json($data, $type));
    }

    // 88888888888888888888888888888888888888888888888888888888
    /**
     * Return a collection
     */
    public function collection($collection, $type = NULL)
    {
        $collectionTmp = array();
        foreach($collection as $item)
        {
            $itemTmp = $this->toArray($item, $type);
            if($itemTmp != NULL){
                $collectionTmp[] = $this->toArray($item, $type);
            }else{
                return NULL;
            }

        }
        return $collectionTmp;
    }
    /**
     * Return Json collection
     */
    public function jsonCollection($collection, $type = NULL)
    {
        $collectionTmp = array();
        foreach($collection as $item)
        {
            $itemTmp = $this->toArray($item, $type);
            if($itemTmp != NULL){
                $collectionTmp[] = $this->toArray($item, $type);
            }else{
                return NULL;
            }
        }
        return json_encode($collectionTmp);
    }
    /**
     * Return collection object Json
     */
    public function objectCollection($collection, $type = NULL)
    {
        $collectionTmp = array();
        foreach($collection as $item)
        {
            $itemTmp = $this->toArray($item, $type);
            if($itemTmp != NULL){
                $collectionTmp[] = $this->toArray($item, $type);
            }else{
                return NULL;
            }
        }
        $jsonFormat = json_encode($collectionTmp);

        return json_decode($jsonFormat);
    }
}

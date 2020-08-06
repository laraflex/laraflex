<?php
namespace laraflex\ViewHelpers;

trait ModelPaginate{

    /**
     * Return object Json and object Paginate
     */
    public function withPaginate($data = NULL, array $config = NULL)
    {
        $arrayTmp = $this->toArray($data, $config);
        $arrayTmp['paginate'] = NULL;
        $jsonTmp = json_encode($arrayTmp);
        $object = json_decode($jsonTmp);
        $object->paginate = $data;
        //dd($object);
        return $object;
    }

}

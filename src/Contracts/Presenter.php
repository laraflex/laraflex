<?php
namespace laraflex\Contracts;

abstract class Presenter
{

    public function toArray ($data = NULL)
    {
        if (empty($data))
            $var = NULL;
        else
            $var = array();
        return $var;
    }

    /**
     * Return Json
     */

    public function Json ($data = NULL)
    {
        return json_encode($this->toArray($data));
    }
    /**
     * Return object Json
     */
    public function objectJson($data = NULL)
    {
        $data = json_encode($this->toArray($data));
        return json_decode($data);
    }

}

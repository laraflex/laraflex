<?php
namespace laraflex\Contracts;

abstract class Presenter
{

    public function toArray ($data = NULL, array $config = NULL)
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
    public function objectJson($data = NULL, array $config = NULL)
    {
        $data = json_encode($this->toArray($data, $config));
        return json_decode($data);
    }

    public function object($data = NULL, array $config = NULL)
    {
        $data = json_encode($this->toArray($data, $config));
        return json_decode($data);
    }

}

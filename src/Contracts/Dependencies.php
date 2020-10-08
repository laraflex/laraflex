<?php
namespace laraflex\Contracts;

abstract class Dependencies
{
    public function toArray ($data = NULL, array $config = NULL)
    {
       //
    }

    /**
     * Return Json
     */
    public function Json ($data = NULL, array $config = NULL)
    {
        return json_encode($this->toArray($data, $config));
    }

    /**
     * Return object
     */

    public function toObject($data = NULL, array $config = NULL)
    {
        $jsonTmp = json_encode($this->toArray($data, $config));
        return json_decode($jsonTmp);
    }

}

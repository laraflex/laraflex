<?php
namespace laraflex\Contracts;

abstract class Dependencies
{
    public function toArray ()
    {
       //
    }

    /**
     * Return Json
     */
    public function Json ()
    {
        return json_encode($this->toArray());
    }

    /**
     * Return object
     */

    public function toObject($data = NULL)
    {
        $jsonTmp = json_encode($this->toArray());
        return json_decode($jsonTmp);
    }

}

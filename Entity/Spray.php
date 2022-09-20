<?php

class Spray
{
    public $isUsed;

    /**
     * @param $isUsed
     */
    public function __construct($isUsed)
    {
        $this->isUsed = $isUsed;
    }

    /**
     * @return mixed
     */
    public function getIsUsed()
    {
        return $this->isUsed;
    }

    /**
     * @param mixed $isUsed
     */
    public function setIsUsed($isUsed)
    {
        $this->isUsed = $isUsed;
    }



}
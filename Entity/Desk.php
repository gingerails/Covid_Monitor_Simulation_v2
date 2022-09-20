<?php

class Desk
{
    public $Spray;

    /**
     * @param $Spray
     */
    public function __construct($Spray)
    {
        $this->Spray = $Spray;
    }

    /**
     * @return Spray
     */
    public function getSpray(): Spray
    {
        return $this->Spray;
    }

    /**
     * @param mixed $Spray
     */
    public function setSpray($Spray)
    {
        $this->Spray = $Spray;
    }


}
<?php

class Student
{
    public $isMasked;

    /**
     * @param $isMasked
     */
    public function __construct($isMasked)
    {
        $this->isMasked = $isMasked;
    }

    /**
     * @return mixed
     */
    public function getIsMasked()
    {
        return $this->isMasked;
    }

    /**
     * @param mixed $isMasked
     */
    public function setIsMasked($isMasked)
    {
        $this->isMasked = $isMasked;
    }
}
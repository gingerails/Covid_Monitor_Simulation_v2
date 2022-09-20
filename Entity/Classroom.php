<?php

class Classroom
{
    private $desk;

    private $students_array;

    /**
     * @param $desk
     * @param string[] $students_array
     */
    public function __construct(Desk $desk, array $students_array)
    {
        $this->desk = $desk;
        $this->students_array = $students_array;
    }

    /**
     * @return mixed
     */
    public function getDesk()
    {
        return $this->desk;
    }

    /**
     * @param mixed $desk
     */
    public function setDesk($desk)
    {
        $this->desk = $desk;
    }

    /**
     * @return string[]
     */
    public function getStudentsArray(): array
    {
        return $this->students_array;
    }

    /**
     * @param string[] $students_array
     */
    public function setStudentsArray(array $students_array)
    {
        $this->students_array = $students_array;
    }

}
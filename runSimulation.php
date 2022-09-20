<?php
include 'C:\Users\ginge\PhpstormProjects\monitorProject\createClasses.php';

startClass();

function startClass(){
    setClassrooms();
}


function setClassrooms(): void
{
    $classroom_A = createClass();
    $classroom_B = createClass();
    $classroom_C = createClass();

    echo(print_r($classroom_A->getStudentsArray()));
    echo(print_r($classroom_B->getStudentsArray()));
    echo(print_r($classroom_C->getStudentsArray()));

}





function handSanitizerSensor(){

}

function maskSensor(){

}
function lysolBottleSensor(){

}
function socialDistancingSensor(){

}

function classRunner(){

}
//echo($classroom->getStudentsArray());
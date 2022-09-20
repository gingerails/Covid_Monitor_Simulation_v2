<?php
include 'C:\Users\ginge\PhpstormProjects\monitorProject\createClasses.php';
//function Classroom setClassrooms{
//
//}
setClassrooms();
function setClassrooms(): void
{
    $classroom_A = createClass();
    echo(print_r($classroom_A->getStudentsArray()));
    $classroom_B = createClass();
    echo(print_r($classroom_B->getStudentsArray()));
    $classroom_C = createClass();
    echo(print_r($classroom_C->getStudentsArray()));

    return ;
}

function startClass(){

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
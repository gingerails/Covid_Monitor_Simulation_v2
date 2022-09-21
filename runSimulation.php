<?php

include 'C:\Users\ginge\PhpstormProjects\monitorProject\Entity\Spray.php';
include 'C:\Users\ginge\PhpstormProjects\monitorProject\Entity\Desk.php';
include 'C:\Users\ginge\PhpstormProjects\monitorProject\Entity\Student.php';
include 'C:\Users\ginge\PhpstormProjects\monitorProject\Entity\Classroom.php';


$classANum = $_GET["classANum"];
$classBNum = $_GET["classBNum"];
$classCNum = $_GET["classCNum"];

$classesArray = setClassrooms($classANum, $classBNum, $classCNum);

assignToBoxes($classesArray);


/** Creates a classroom of n randomly masked students
 * @throws Exception
 */
function createClass(int $numStudents): Classroom
{
    $spray = new Spray(false);
    $desk = new Desk($spray);

    $studentsArray=array();
    for($x = 0; $x <= $numStudents; $x++){
        $randBool = (bool) random_int(0,1);   // student is randomly masked or unmasked
        $student = new Student($randBool);
        array_push($studentsArray, $student);   // add to array
       // $studentsArray->append($student);
    }

    return new Classroom($desk ,$studentsArray);
}



/**
 * Create THREE classrooms. Return array of three classes.
 * @throws Exception
 */
function setClassrooms($classANum, $classBNum, $classCNum): array
{
    $classroom_A = createClass($classANum);
    $classroom_B = createClass($classBNum);
    $classroom_C = createClass($classCNum);
    //echo(print_r($classroom_A->getStudentsArray()));

    return array($classroom_A, $classroom_B, $classroom_C);
}



function assignToBoxes($classesArray ){

    foreach($classesArray as $item) {
      //  echo(print_r($item));
       // echo(print_r($item->getStudentsArray()));
        $studentArray = $item->getStudentsArray();
        foreach($studentArray as $arrayVal) {
            $student = $arrayVal->getIsMasked();        // will check masks like this

        }

//        $item->getArrayOfStudents
    }
    //$classesArray[1];
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
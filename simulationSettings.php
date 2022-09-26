<?php
include 'C:\Users\ginge\PhpstormProjects\monitorProject\Entity\Spray.php';
include 'C:\Users\ginge\PhpstormProjects\monitorProject\Entity\Desk.php';
include 'C:\Users\ginge\PhpstormProjects\monitorProject\Entity\Student.php';
include 'C:\Users\ginge\PhpstormProjects\monitorProject\Entity\Classroom.php';

// before running the simulation the user must set certain settings

$classANum = $_POST["classANum"];
$classBNum = $_POST["classBNum"];
$classCNum = $_POST["classCNum"];





// functions all run here
$classesArray = setClassrooms($classANum, $classBNum, $classCNum);

assignToBoxes($classesArray);
// foreach($studentArray as $arrayVal) {
//$student = $arrayVal->getIsMasked();        // will check masks like this

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
    $arrayStr =print_r($classroom_A->getStudentsArray());
    // echo(print_r($classroom_A->getStudentsArray()));


    return array($classroom_A, $classroom_B, $classroom_C);
}



function assignToBoxes($classesArray ){

    foreach($classesArray as $item) {
        // echo(print_r($item));
        //echo(print_r($item->getStudentsArray()));
        $studentArray = $item->getStudentsArray();      // get all the students which will populate the dropdown menu
        foreach($studentArray as $arrayVal) {
            //$student = $arrayVal->getIsMasked();        // will check masks like this
            // echo("Student")
        }

//        $item->getArrayOfStudents
    }
    //$classesArray[1];
}



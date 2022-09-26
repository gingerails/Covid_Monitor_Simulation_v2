<?php
include 'C:\Users\ginge\PhpstormProjects\monitorProject\Entity\Spray.php';
include 'C:\Users\ginge\PhpstormProjects\monitorProject\Entity\Desk.php';
include 'C:\Users\ginge\PhpstormProjects\monitorProject\Entity\Student.php';
include 'C:\Users\ginge\PhpstormProjects\monitorProject\Entity\Classroom.php';
include 'E:\Downloads\Docker How To Simple Web Server\Docker How To Simple Web Server\5. basic create web Docker container w all data from dockerfile\web files\index.html';
//include_once 'runSimulation.php';
// before running the simulation the user must set certain settings

$classANum = $_POST["classANum"];
$classBNum = $_POST["classBNum"];
$classCNum = $_POST["classCNum"];



// functions all run here
$classesArray = setClassrooms($classANum, $classBNum, $classCNum);

assignToBoxes($classesArray);

echo("here");
runClass($classesArray);


function runClass($classesArray){
    $myfile = fopen("testfile.txt", "w");
    $count = 0;
    foreach($classesArray as $class) {
        $count = $count + 1;
        $classDetail = "Classroom $count\n";
        fwrite($myfile, $classDetail);
        $studentArray = $class->getStudentsArray();      // get all the students which will populate the dropdown menu
        askTeacher($studentArray, $myfile);

    }
    fclose($myfile);

}

function askTeacher($studentArray, $myfile){
    // probability of students asking the teacher a question is 20%
    $studentsWithQuestions = 0;
    foreach($studentArray as $student) {
        echo(print_r($studentArray));
        $x = rand(1, 10);
        if($x > 2){
            return 2;
        }
        else {
            $studentsWithQuestions = $studentsWithQuestions + 1;
            return 1;
        }
    }
    $questionsDetail = "Students with questions =  $studentsWithQuestions\n";
    fwrite($myfile, $questionsDetail);

}


// foreach($studentArray as $arrayVal) {
//$student = $arrayVal->getIsMasked();        // will check masks like this

/** Creates a classroom of n randomly masked students
 * @throws Exception
 */
function createClass(int $numStudents): Classroom
{
    $thisSpray = new Spray(false);
    $thisDesk = new Desk($thisSpray);

    $studentsArray=array();
    for($x = 0; $x <= $numStudents; $x++){
        $randBool = (bool) random_int(0,1);   // student is randomly masked or unmasked
        $student = new Student($randBool);
        array_push($studentsArray, $student);   // add to array
        // $studentsArray->append($student);
    }

    return new Classroom($thisDesk ,$studentsArray);
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
   // $arrayStr =print_r($classroom_A->getStudentsArray());
    // echo(print_r($classroom_A->getStudentsArray()));

    return array($classroom_A, $classroom_B, $classroom_C);
}




function assignToBoxes($classesArray ){

    foreach($classesArray as $item) {
        // echo(print_r($item));
        //echo(print_r($item->getStudentsArray()));
        $studentArray = $item->getStudentsArray();      // get all the students which will populate the dropdown menu
        foreach($studentArray as $arrayVal) {
            if($arrayVal->getIsMasked()){

            }
//            $student = $arrayVal->getIsMasked();        // will check masks like this
            // echo("Student");
        }

//        $item->getArrayOfStudents
    }
    //$classesArray[1];
}



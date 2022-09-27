<?php
include 'C:\Users\ginge\PhpstormProjects\monitorProject\Entity\Spray.php';
include 'C:\Users\ginge\PhpstormProjects\monitorProject\Entity\Desk.php';
include 'C:\Users\ginge\PhpstormProjects\monitorProject\Entity\Student.php';
include 'C:\Users\ginge\PhpstormProjects\monitorProject\Entity\Classroom.php';
include 'E:\Downloads\Docker How To Simple Web Server\Docker How To Simple Web Server\5. basic create web Docker container w all data from dockerfile\web files\index.html';
include 'E:\Downloads\Docker How To Simple Web Server\Docker How To Simple Web Server\5. basic create web Docker container w all data from dockerfile\web files\testfile.txt';
//include_once 'runSimulation.php';
// before running the simulation the user must set certain settings

$classANum = $_POST["classANum"];
$classBNum = $_POST["classBNum"];
$classCNum = $_POST["classCNum"];
$maskSensor = $_POST["maskSensor"];
$lysolSensor = $_POST["lysolSensor"];
$handSanSensor = $_POST["HandSanSensor"];

//showStudents();

// functions all run here
$classesArray = setClassrooms($classANum, $classBNum, $classCNum);

//assignToBoxes($classesArray);

runClass($classesArray, $maskSensor,  $lysolSensor, $handSanSensor);
echo('simulator.html');

//function showStudents()
//{
//    return htmlentities('<img src="Simple_Stick_Figure.svg.png" alt="StudentStickman" width="20" height="60">');
//}

//function show(){
//    $my_var = file_get_contents('simulator.html');
//   // echo($my_var);
//}


function runClass($classesArray, $maskSensor,  $lysolSensor, $handSanSensor){
    $myfile = fopen("testfile.txt", "w");
    $count = 0;
    foreach($classesArray as $class) {
        $count = $count + 1;
        $classDetail = "*Classroom $count Metrics*: \n";
        fwrite($myfile, $classDetail);
        $studentArray = $class->getStudentsArray();      // get all the students which will populate the dropdown menu


        askTeacher($studentArray, $myfile);             // check which students go to question box
//        maskSensor($studentArray, $myfile);
//        lysolClassBegin($studentArray, $myfile);
//        lysolClassEnd($studentArray, $myfile);
//        handSanitizerSensor($studentArray, $myfile);

        if(isset($maskSensor)){
            maskSensor($studentArray, $myfile);
        }
        if(isset($lysolSensor)){
            lysolClassBegin($studentArray, $myfile);
            lysolClassEnd($studentArray, $myfile);
        }
        if(isset($handSanSensor)){
            handSanitizerSensor($studentArray, $myfile);
        }


        $spacer = "\n \n";
        fwrite($myfile, $spacer);
    }
    fclose($myfile);
    //show();
}

/**
 * Randomizes how many students ask the teacher a question and records it in testfile.txt
 * 20% likely.
 * @param $studentArray
 * @param $myfile
 * @return void
 */
function askTeacher($studentArray, $myfile){
    // probability of students asking the teacher a question is 20%
    $studentsWithQuestions = 0;
    for($x = 1; $x <= count($studentArray); $x++) {

        $random = rand(1, 10);
        if($random > 2){

        }
        else {      // student has a question
            $studentsWithQuestions = $studentsWithQuestions + 1;
        }
    }

    $questionsDetail = "Students with questions in Class  =  $studentsWithQuestions#\n";
    fwrite($myfile, $questionsDetail);
}


/**
 * Checks students with masks and records alarms/violation in txt file. Masks are already
 * predetermined in createClass();
 * @param $studentArray
 * @param $myfile
 * @return void
 */
function maskSensor($studentArray, $myfile)
{
    // probability of students asking the teacher a question is 20%
    $studentsUnmasked = 0;
    foreach ($studentArray as $student) {
       // $student = $student->getIsMasked();
        if(!$student->getIsMasked()){
            $studentsUnmasked = $studentsUnmasked + 1;
        }
    }
    $questionsDetail = "Students unmasked  =  $studentsUnmasked#\n";
    fwrite($myfile, $questionsDetail);
}


/**
 * Checks for students using lysol at the beginning of class. 70% likely
 * @param $studentArray
 * @param $myfile
 * @return void
 */
function lysolClassBegin($studentArray, $myfile){
    $unreturnedBottle = 0;
    for($i=1; $i <= count($studentArray); $i++) {
        $random = rand(1, 10);
        if($random > 3){        // 70% likely to use lysol at beginning of class

        }
        else {      // didnt use lysol
            $unreturnedBottle = $unreturnedBottle + 1;
        }
    }
    $questionsDetail = "Lysol not used at beginning of class  =  $unreturnedBottle#\n";

    fwrite($myfile, $questionsDetail);
}


/**
 * Checks for students using lysol at the beginning of class. 40% likely
 * @param $studentArray
 * @param $myfile
 * @return void
 */
function lysolClassEnd($studentArray, $myfile){
    $unreturnedBottle = 0;
    for($i=1; $i <= count($studentArray); $i++) {
        $random = rand(1, 10);
        if($random > 6){        // 60% likely to use lysol at beginning of class
        }
        else {      // didnt use lysol
            $unreturnedBottle = $unreturnedBottle + 1;
        }
    }
    $questionsDetail = "Lysol not used at end of class  =  $unreturnedBottle#\n";
    fwrite($myfile, $questionsDetail);
}

/**
 * 50% chance of student entering or leaving room without using hand sanitizer
 * @param $studentArray
 * @param $myfile
 * @return void
 */
function handSanitizerSensor($studentArray, $myfile)
{
    $unsanitized = 0;
    $sanitized = 0;
    for($x = 1; $x <= count($studentArray); $x++) {

        $random = rand(1, 10);
        if($random > 5){
            $sanitized = $sanitized + 1;
        }
        else {      // Sanitizer did not dispense
            $unsanitized = $unsanitized + 1;
        }
    }
    $sanitizedDetail = "Student leaves room after hand sanitizer dispenses =  $sanitized#\n";
    $unsanitizedDetail = "Student leaves room without sanitizer dispensing =  $unsanitized#\n";
    print($sanitizedDetail);
    fwrite($myfile, $sanitizedDetail);
    fwrite($myfile, $unsanitizedDetail);
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

    for($x = 1; $x <= $numStudents; $x++){
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


    return array($classroom_A, $classroom_B, $classroom_C);
}



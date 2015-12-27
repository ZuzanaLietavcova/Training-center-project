<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// include required models
require_once "./model/ProjectModel.php";
require_once "./model/ClassModel.php";
require_once "./model/TrainerModel.php";
require_once "./model/StudentModel.php";
require_once "./model/TeamModel.php";


//$var = ClassModel::CreateClass("Test");   // create new class test

//$var = TrainerModel::CreateTrainer("TrainerTest", 1); // test create new trainer

//$var = TrainerModel::getLastTrainerID();  // Test latest row insert of trainer
//echo $var;


//$date = '02/07/2016 12:00:00';    // to set deadline - maybe change this but it works -_-
//$date = preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$2-$1 $4', $date);
//$var = ProjectModel::CreateProject("Mor Projektet", "SubjectTest4", $date, 1, 1);

//$var = StudentModel::createStudent("newStuden11t", 1);  // test create student

//$var = TeamModel::createTeam("this is a summary", 1, 2); // test create Team


//$var = TeamModel::addStudentToTeam(4,5);  // why do we have a Team_id within the Student table?!

//$var = TeamModel::removeStudentFromTeam(3,5);

//$listOfProjects = ProjectModel::getAllProjects(1);

?>
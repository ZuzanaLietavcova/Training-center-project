<?php

include_once "../model/ProjectModel.php";
include_once "../model/WebFunctions.php";

$id = $_GET['project_id'];

$project = ProjectModel::getProjectById($id);
$listOfTeams = ProjectModel::getProjectTeams($id);
$listOfFreeStudents = ProjectModel::getFreeStudents($project['class_id']);

$content = "";
foreach($listOfTeams as $team)
{
	$content .= "<a href=\"team-id-".$team['team_id']."\"> Team ".$team['team_id']." <br> </a>";
}

$content_students = "";
foreach($listOfFreeStudents as $student)
{
	$content_students .= "<a href=\"student-id-".$student['student_id']."\">".$student['name']." <br> </a>";
}

// Check right of the user for editing the project
session_start();
if (array_key_exists('trainer_id', $_SESSION) and ($project['trainer_id'] == $_SESSION['trainer_id']))
{
	$edit_button = 	"<a href=\"project-edit-$id\"> 
		<button type=\"button\" class=\"btn btn-default\">	Edit project </button> </a>";
}
else
{
	$edit_button = "<button type=\"button\" class=\"btn btn-default\" disabled>	Edit project </button>";
}

// add view
include_once "../view/project-detail.php";
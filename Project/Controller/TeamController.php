<?php

include_once "../model/TeamModel.php";
include_once "../model/WebFunctions.php";

require_once "../model/AuthenticateSession.php";

$id = $_GET['team_id'];

$team = TeamModel::getTeamById($id);
$listOfStudents = TeamModel::getTeamStudents($id);
$project_id = $team["project_id"];

$content = "";
foreach($listOfStudents as $student)
{
	$content .= "<a href=\"student-id/".$student['student_id']."\">".$student['name']." <br> </a>";
}

// Check right of the user for editing the team
session_start();
if (array_key_exists('student_id', $_SESSION) and ($team['creator_id'] == $_SESSION['student_id']))
{
	$edit_button = 	"<a href=\"team-edit-$id-pid-$project_id\">
		<button type=\"button\" class=\"btn btn-default\">	Edit team </button> </a>";
}
else
{
	$edit_button = "<button type=\"button\" class=\"btn btn-default\" disabled>	Edit team </button>";
}


// add view
include_once "../view/team-detail.php";
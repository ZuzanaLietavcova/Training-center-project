<?php

include_once "../model/TeamModel.php";
include_once "../model/WebFunctions.php";

$team = TeamModel::getTeamById(1);
$listOfStudents = TeamModel::getTeamStudents(1);

$content = "";
foreach($listOfStudents as $student)
{
	$content .= "<a href=\"student-id/".$student['student_id']."\">".$student['name']." <br> </a>";
}

// add view
include_once "../view/team-detail.php";
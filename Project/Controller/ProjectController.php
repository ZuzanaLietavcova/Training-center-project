<?php

include_once "../model/ProjectModel.php";
include_once "../model/WebFunctions.php";

$project = ProjectModel::getProjectById(2);
$listOfTeams = ProjectModel::getProjectTeams(2);

$content = "";
foreach($listOfTeams as $team)
{
	$content .= "<a href=\"team-id/".$team['team_id']."\"> Team ".$team['team_id']." <br> </a>";
}

// add view
include_once "../view/project-detail.php";
<?php

include_once "../model/TeamModel.php";
include_once "../model/WebFunctions.php";
include_once "../model/ProjectModel.php";

require_once "../model/AuthenticateSession.php";

$teamId = $_GET['team_id'];
$team = TeamModel::getTeamById($teamId);
$projectID = $team['project_id'];
$classID = ProjectModel::getProjectClassById($projectID);
$listOfAvailableStudents = ProjectModel::getFreeStudents($classID);
$listOfTeamMembers = TeamModel::getTeamStudents($teamId);
$table1 = "";   // table 1  - available students
$table2 ="";    // table 2 - students already in team
$summary = $team['summary'];
$creatorId = $team['creator_id'];

if(count($listOfAvailableStudents) > 0){
    for ($int = 0; $int < count($listOfAvailableStudents); $int++) {
        $table1 .= "<li id='". $listOfAvailableStudents[$int]['student_id']. "'class=\"list-group-item ui-state-default hand-cursor\">".$listOfAvailableStudents[$int]['name']."</li>";   // table 1  - available students
    }
}

if(count($listOfTeamMembers) > 0){
    for ($int = 0; $int < count($listOfTeamMembers); $int++) {    // table 2 - current students in team
        if($listOfTeamMembers[$int]['student_id'] == $creatorId){
            $table2 .= "<li id='" . $listOfTeamMembers[$int]['student_id'] . "' class=\"list-group-item ui-state-default ui-state-disabled\">" . $listOfTeamMembers[$int]['name'] . "<span class=\"badge\">Owner</span>"."</li>";
        }
        else{
            $table2 .= "<li id='" . $listOfTeamMembers[$int]['student_id'] . "' class=\"list-group-item ui-state-default hand-cursor\">" . $listOfTeamMembers[$int]['name'] . "</li>";
        }
    }
}

// add view
include_once "../view/team-edit.php";
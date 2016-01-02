<?php

include_once "../model/TeamModel.php";
include_once "../model/WebFunctions.php";

$teamId = $_GET['team_id'];
$team = TeamModel::getTeamById($teamId);
$listOfTeamMembers = TeamModel::getTeamStudents($teamId);

echo count($listOfTeamMembers);

//$listOfFreeStudents

$table1 = "<li id='4' class=\"list-group-item ui-state-default\">".Navn1."</li>";   // table 1  - available students
$table2 ="";
for ($int = 0; $int < count($listOfTeamMembers); $int++) {    // table 2 - current students in team
    $table2 .= "<li id='" . $listOfTeamMembers[$int]['student_id'] . "' class=\"list-group-item ui-state-default\">" . $listOfTeamMembers[$int]['name'] . "</li>";
}







// add view
include_once "../view/team-edit.php";
<?php

include_once "../model/TeamModel.php";
include_once "../model/WebFunctions.php";

$id = $_GET['team_id'];
$project = TeamModel::getTeamById($id);

// add view
include_once "../view/team-edit.php";
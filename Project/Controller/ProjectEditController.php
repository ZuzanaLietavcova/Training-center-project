<?php

include_once "../model/ProjectModel.php";
include_once "../model/WebFunctions.php";

$id = $_GET['project_id'];
$project = ProjectModel::getProjectById($id);

// add view
include_once "../view/project-edit.php";
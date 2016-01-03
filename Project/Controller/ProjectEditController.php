<?php

include_once "../model/ProjectModel.php";
include_once "../model/WebFunctions.php";

if (isset($_POST["project_id"]))
{
	$ok = ProjectModel::updateProject($_POST["title"], $_POST["subject"], $_POST["deadline"], $_POST["project_id"]);
	$id = $_POST['project_id'];
}
else
{
	$id = $_GET['project_id'];	
}

$project = ProjectModel::getProjectById($id);

// add view
include_once "../view/project-edit.php";
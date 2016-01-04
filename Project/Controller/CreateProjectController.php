<?php

include_once "../model/ProjectModel.php";
include_once "../model/WebFunctions.php";

session_start();
$classes = "";

if (isset($_POST["title"]))
{
	$ok = ProjectModel::CreateProject($_POST['title'], $_POST['subject'], $_POST['deadline'],
		$_SESSION['trainer_id'], $_POST['class_id']);
	header("Location: ../home-trainer");
}
else
{
	// Get classes corresponding to the trainer
	$listOfClasses = ProjectModel::getAllClasses($_SESSION['trainer_id']);
	foreach ($listOfClasses as $class)
    {
        $classes .= "<option value=\"".$class['class_id']."\">".$class['name']."</option>";
    }
}

// add view
include_once "../view/create-project.php";
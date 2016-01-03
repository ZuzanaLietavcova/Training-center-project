<?php

include_once "../model/ProjectModel.php";
include_once "../model/WebFunctions.php";

session_start();

if (isset($_POST["title"]))
{
	$ok = ProjectModel::CreateProject($_POST['title'], $_POST['subject'], $_POST['deadline'],
		$_SESSION['trainer_id'], $class_id);
	header("Location: ../home-trainer");
}

// add view
include_once "../view/create-project.php";
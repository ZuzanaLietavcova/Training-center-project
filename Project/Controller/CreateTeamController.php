<?php
/**
 * Created by PhpStorm.
 * User: nillernoels
 * Date: 03/01/16
 * Time: 22:17
 */

require_once "../model/StudentModel.php";
require_once "../model/TeamModel.php";
require_once "../model/ProjectModel.php";

session_start();
$studentId = $_SESSION['student_id'];

if(isset($_POST['project_id']))     // process creation of team
{
    $summary = "";
    if(isset($_POST['summary']))
    {
        $summary .= $_POST['summary'];
    }
    if(TeamModel::createTeam($summary,$studentId, $_POST['project_id'])){
        header("location: home-student");
    }
    $msg = "<div></div>";
}
else{
    $classId = StudentModel::getStudentClassById($studentId);
    $listOfAvailableProjects = ProjectModel::getAllProjectsInClassById($classId);
    $projects = "";

    foreach ($listOfAvailableProjects as $project)
    {
        $projects .= "<option value=\"".$project['Project_id']."\">".$project['Title']."</option>";
    }
    include_once "../view/create-team.php";
}

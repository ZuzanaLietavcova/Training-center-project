<?php

/**
 * Created by PhpStorm.
 * User: nillernoels
 * Date: 22/12/15
 * Time: 21:25
 */
include_once "../model/ProjectModel.php";
include_once "../model/WebFunctions.php";

// @todo remember to set sessions and reject wrong users
// @todo get trainer_id from session

session_start();
$studentID = $_SESSION['student_id'];

if ($studentID != "")
{
    echo "student";
    include_once "../view/home-student.php";
}
else if ($_SESSION['trainer_id'] != "")
{
    $trainerID = $_SESSION['trainer_id'];   // get id
    $trainerName = $_SESSION['name'];       // get name
    $projectPerPage = 4;
    $content = "";
    $totalNumberOfProjects = count(ProjectModel::getAllProjects(1));        // get total amount
    $totalNumberOfPages = ceil($totalNumberOfProjects / $projectPerPage);  // calc number of pages
    $currentPage = (isset($_GET['current_page'])) ? (int)$_GET['current_page'] : 1;     // if currentPage var isset else default 1
    $startPage = ($currentPage - 1) * $projectPerPage;      // calc start page ex. 1 = 0 - 4 projects

    // set content:
    $listOfProjects = ProjectModel::getCurrentProjects($trainerID, $startPage, $projectPerPage);  // get projects
    $content = "";

    for ($int = 0; $int < count($listOfProjects); $int++)                   // max 4 projects on page
    {
        $name = $listOfProjects[$int]['Title'];
        $project_id = $listOfProjects[$int]['project_id'];
        $content .= "<div class=\"col-md-3 portfolio-item\">
                           <a href=\"some-link/$project_id\">
                                <img class=\"img-responsive\" src=\"http://placehold.it/750x450\" alt=\"\">
                           </a>
                           <p style='text-align: center'> $name </p>
                     </div>";
    }

    $pagination = WebFunctions::pagination($currentPage, $totalNumberOfPages);   // add pagination

    // add view
    include_once "../view/home-trainer.php";
}
<?php

/**
 * Created by PhpStorm.
 * User: nillernoels
 * Date: 22/12/15
 * Time: 21:25
 */
include_once "../model/ProjectModel.php";
include_once "../model/TeamModel.php";
include_once "../model/WebFunctions.php";

// @todo remember to set sessions and reject wrong users

session_start();

$projectPerPage = 4;
$content = "";
$isTrainer = $_SESSION['isTrainer'];

if ($isTrainer != 'true')
{
    $studentID = $_SESSION['student_id'];
    $studentName = $_SESSION['name'];       // get name
    $totalNumberOfProjects = count(TeamModel::getStudentTeams($studentID));        // get total amount
    $totalNumberOfPages = ceil($totalNumberOfProjects / $projectPerPage);  // calc number of pages
    $currentPage = (isset($_GET['current_page'])) ? (int)$_GET['current_page'] : 1;     // if currentPage var isset else default 1
    $startPage = ($currentPage - 1) * $projectPerPage;      // calc start page ex. 1 = 0 - 4 projects

    // set content:
    $listOfTeams = TeamModel::getStudentTeams($studentID, $startPage, $projectPerPage);  // get projects
    $content = "";
    if(count($listOfTeams) == 0)
    {
        $content .= "   <div class=\"row text-center\">
                            <div class=\"col-lg-12\">
                                <p>No teams attended</p>
                            </div>
                        </div>";
    }
    else
    {
        for ($int = 0; $int < count($listOfTeams); $int++)                   // max 4 projects on page
        {
            $teamID = $listOfTeams[$int]['team_id'];
            $content .= "<div class=\"col-md-3 portfolio-item\">
                           <a href=\"team-id-$teamID\">
                                <img class=\"img-responsive\" src=\"images/project.png\" alt=\"\">
                           </a>
                           <p style='text-align: center'>Team $teamID</p>
                     </div>";
        }
    }
    $pagination = WebFunctions::pagination($currentPage, $totalNumberOfPages);   // add pagination

    // add view
    include_once "../view/home-student.php";
}
else if ($isTrainer == "true")
{
    $trainerID = $_SESSION['trainer_id'];   // get id
    $trainerName = $_SESSION['name'];       // get name
    $totalNumberOfProjects = count(ProjectModel::getAllProjects($trainerID));        // get total amount
    $totalNumberOfPages = ceil($totalNumberOfProjects / $projectPerPage);  // calc number of pages
    $currentPage = (isset($_GET['current_page'])) ? (int)$_GET['current_page'] : 1;     // if currentPage var isset else default 1
    $startPage = ($currentPage - 1) * $projectPerPage;      // calc start page ex. 1 = 0 - 4 projects

    // set content:
    $listOfTeams = ProjectModel::getCurrentProjects($trainerID, $startPage, $projectPerPage);  // get projects
    $content = "";

    for ($int = 0; $int < count($listOfTeams); $int++)                   // max 4 projects on page
    {
        $name = $listOfTeams[$int]['Title'];
        $project_id = $listOfTeams[$int]['project_id'];
        $content .= "<div class=\"col-md-3 portfolio-item\">
                           <a href=\"project-id-$project_id\">
                                <img class=\"img-responsive\" src=\"images/project.png\" alt=\"\">
                           </a>
                           <p style='text-align: center'> $name </p>
                     </div>";
    }

    $pagination = WebFunctions::pagination($currentPage, $totalNumberOfPages);   // add pagination

    // add view
    include_once "../view/home-trainer.php";
}
<?php

include_once "../model/TrainerModel.php";
include_once "../model/ProjectModel.php";
include_once "../model/TeamModel.php";
include_once "../model/WebFunctions.php";

require_once "../model/AuthenticateSession.php";

// TODO repair pagination

$projectPerPage = 4;
$content = "";

$trainer_id = $_GET['trainer_id'];
$trainer_name = TrainerModel::getTrainer($trainer_id);

$totalNumberOfProjects = count(ProjectModel::getTrainerProjects($trainer_id));
$totalNumberOfPages = ceil($totalNumberOfProjects / $projectPerPage);
$currentPage = (isset($_GET['current_page'])) ? (int)$_GET['current_page'] : 1;
$startPage = ($currentPage - 1) * $projectPerPage;

// set content
$listOfProjects = ProjectModel::getTrainerProjectsLimit($trainer_id, $startPage, $projectPerPage);
$content = "";
if(count($listOfProjects) == 0)
{
    $content .= "   <div class=\"row text-center\">
                        <div class=\"col-lg-12\">
                            <p>No projects created</p>
                        </div>
                    </div>";
}
else
{
    foreach ($listOfProjects as $proj)
    {
        $content .= "<div class=\"col-md-3 portfolio-item\">
                       <a href=\"project-id-".$proj['project_id']."\">
                            <img class=\"img-responsive\" src=\"images/project.png\" alt=\"\">
                       </a>
                       <p style='text-align: center'>\"".$proj['title']."</p>
                 </div>";
    }
}
$pagination = WebFunctions::pagination($currentPage, $totalNumberOfPages);

include_once "../view/profile-trainer.php";
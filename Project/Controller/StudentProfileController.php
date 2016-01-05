<?php

include_once "../model/StudentModel.php";
include_once "../model/ProjectModel.php";
include_once "../model/TeamModel.php";
include_once "../model/WebFunctions.php";

require_once "../model/AuthenticateSession.php";

// TODO repair pagination

$teamsPerPage = 4;
$content = "";

$student_id = $_GET['student_id'];
$student_name = StudentModel::getStudentById($student_id);

$totalNumberOfTeams = count(TeamModel::getStudentTeams($student_id));
$totalNumberOfPages = ceil($totalNumberOfTeams / $teamsPerPage);
$currentPage = (isset($_GET['current_page'])) ? (int)$_GET['current_page'] : 1;
$startPage = ($currentPage - 1) * $teamsPerPage;

// set content
$listOfTeams = TeamModel::getStudentTeams($student_id, $startPage, $teamsPerPage);
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
    for ($int = 0; $int < count($listOfTeams); $int++)
    {
        $teamID = $listOfTeams[$int]['team_id'];
        $content .= "<div class=\"col-md-3 portfolio-item\">
                       <a href=\"team-id-$teamID\">
                            <img class=\"img-responsive\" src=\"images/team.jpg\" alt=\"\">
                       </a>
                       <p style='text-align: center'>Team $teamID</p>
                 </div>";
    }
}
$pagination = WebFunctions::pagination($currentPage, $totalNumberOfPages);

include_once "../view/profile-student.php";
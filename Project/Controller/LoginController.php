<?php
/**
 * Created by PhpStorm.
 * User: nillernoels
 * Date: 27/12/15
 * Time: 13:57
 */

require_once "../model/StudentModel.php";
require_once "../model/TrainerModel.php";

if (isset($_POST["user-id"]))
{
    $userID = $_POST["user-id"];
    //$p_wd = $_POST["p_wd"];

    if ($userID == "")  // check for empty value
    {
        $error =  "<div class='alert alert-danger'>Username was not entered correctly - please try again</div>";
        include_once "../index.php";
    }
    else
    {
        $isTrainer = $_POST['is-trainer'];  // check if it's a trainer

        if($isTrainer == 'true')
        {
            $trainerID = TrainerModel::getTrainer($userID);
            if($trainerID != null) {
                session_start();
                $_SESSION['trainer_id'] = $userID;  // add user-id to session
                $_SESSION['name'] = $trainerID; // add name to session
                header("Location: home-trainer");
            }
        }
        else
        {
            $isStudent = StudentModel::getStudent($userID);
            if ($isStudent != null)
            {
                session_start();
                $_SESSION['student_id'] = $userID;  // add user-id to session
                $_SESSION['name'] = $isStudent; // add name to session
                header("Location: home-student");
            }
        }
    }
}
else{
    $error =  "<div class='alert alert-danger'>Username was not entered correctly - please try again</div>";
    include_once "../index.php";
}
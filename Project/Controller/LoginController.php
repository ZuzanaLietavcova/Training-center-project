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

    else{
        $isStudent = StudentModel::getStudent($userID);
        if ($isStudent != null)
        {
            session_start();
            $_SESSION['student_id'] = $userID;  // add user-id to session
            $_SESSION['name'] = $isStudent; // add name to session
            header("Location: Controller/home-student");
        }
        else{
            $isTrainer = TrainerModel::getTrainer($userID);
            if($isTrainer != null)
            {
                session_start();
                $_SESSION['trainer_id'] = $userID;  // add user-id to session
                $_SESSION['name'] = $isTrainer; // add name to session
                header("Location: Controller/home-trainer");
            }
        }
    }
}
else{
    include_once "../index.php";
}
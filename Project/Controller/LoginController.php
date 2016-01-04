<?php
/**
 * Created by PhpStorm.
 * User: nillernoels
 * Date: 27/12/15
 * Time: 13:57
 */

require_once "../model/StudentModel.php";
require_once "../model/TrainerModel.php";

if (isset($_POST["user-id"]) && isset($_POST['p_wd']))
{
    $userID = $_POST["user-id"];
    $p_wd = $_POST["p_wd"];

    if ($userID == "" || $p_wd == "")  // check for empty value
    {
        $error =  "<div class='alert alert-danger'>Username was not entered correctly - please try again</div>";
        include_once "../index.php";
    }
    else
    {
        if((isset($_POST['is-trainer'])) && $_POST['is-trainer'] == 'true')
        {
            $trainer = TrainerModel::getTrainerFromDB($userID, $p_wd);
            if($trainer != null) {
                session_start();
                $_SESSION['isTrainer'] = 'true';
                $_SESSION['trainer_id'] = $userID;  // add user-id to session
                $_SESSION['name'] = $trainer['name']; // add name to session
                header("Location: home-trainer");
            }
            else{
                $error =  "<div class='alert alert-danger'>Username or password was not entered correctly - please try again</div>";
                include_once "../index.php";
            }
        }
        else
        {
            $student = StudentModel::getStudent($userID, $p_wd);
            if ($student != null)
            {
                session_start();
                $_SESSION['isTrainer'] = 'false';
                $_SESSION['student_id'] = $userID;  // add user-id to session
                $_SESSION['name'] = $student['name']; // add name to session
                header("Location: home-student");
            }
            else{
                $error =  "<div class='alert alert-danger'>Username or password was not entered correctly - please try again</div>";
                include_once "../index.php";
            }
        }
    }
}
else{
    $error = "";
    include_once "../index.php";
}
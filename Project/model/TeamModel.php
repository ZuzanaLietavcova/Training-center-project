<?php

/**
 * Created by PhpStorm.
 * User: nillernoels
 * Date: 22/12/15
 * Time: 20:49
 */
class TeamModel
{

    /**
     * @param $summary summary (actually optional)
     * @param $student_id   id of student
     * @param $project_id   id of project
     */
    public static function createTeam($summary, $student_id, $project_id)
    {
        $db = Db::getConnection();
        $sql = "INSERT INTO Team (Creation_date, Summary, Project_id, Student_creator_id)
                VALUES (CURRENT_TIMESTAMP(), :summary, :project_id, :student_id)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":summary", $summary);
        $stmt->bindValue(":project_id", $project_id);
        $stmt->bindValue(":student_id", $student_id);
        $ok = $stmt->execute();

        if($ok)
        {
            echo "successfully created new team";	// success
        }
        else
        {
            $error = $stmt->errorInfo();	// else print error codes
            echo $error[0];
            echo $error[1];
            echo $error[2];
        }
    }

    /**
     * @param $student_id student id to add
     * @param $team_id  team id to add
     */
    public static function addStudentToTeam($student_id, $team_id)
    {
        $db = Db::getConnection();
        $sql = "INSERT INTO Member (Team_id, Student_id) VALUES (:team_id, :student_id)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":team_id", $team_id);
        $stmt->bindValue(":student_id", $student_id);
        $ok = $stmt->execute();

        if($ok)
        {
            echo "successfully added student to team";	// success
        }
        else
        {
            $error = $stmt->errorInfo();	// else print error codes
            echo $error[0];
            echo $error[1];
            echo $error[2];
        }

    }

}
<?php

require_once "Db.php";  // add db
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
                VALUES (CURRENT_TIMESTAMP(), :summary, :project_id, :student_id);COMMIT";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":summary", $summary);
        $stmt->bindValue(":project_id", $project_id);
        $stmt->bindValue(":student_id", $student_id);
        $ok = $stmt->execute();

        if($ok)
        {
            $lastTeamId = self::getLastTeamId();
            if(self::addStudentToTeam($student_id, $lastTeamId)){
                return $ok;
            }
            else
            {
                $error = $stmt->errorInfo();	// else print error codes
                echo $error[0];
                echo $error[1];
                echo $error[2];
            }
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
            return $ok;
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
     * @return id of last inserted trainer
     * @return null otherwise
     */
    public static function getLastTeamId()
    {
        $db = Db::getConnection();
        $sql = "SELECT MAX(Team_id) AS LastID FROM Team"; // get latest id (the highest value)
        $stmt = $db->prepare($sql);
        $ok = $stmt->execute();
        if($ok)
        {	// success
            $rs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rs["LastID"];
        }
        else
        {
            $error = $stmt->errorInfo();	// else print error codes
            echo $error[0];
            echo $error[1];
            echo $error[2];
            return null;
        }
    }

    public static function removeStudentFromTeam($student_id, $team_id)
    {
        $db = DB::getConnection();
        $sql = "DELETE from Member where student_id = :student_id and Team_id = :team_id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue("student_id", $student_id);
        $stmt->bindValue(":team_id", $team_id);
        $ok = $stmt->execute();

        if($ok)
        {
            echo "successfully removed student from team";	// success
        }
        else
        {
            $error = $stmt->errorInfo();	// else print error codes
            echo $error[0];
            echo $error[1];
            echo $error[2];
        }

    }

    public static function getTeamById($team_id)
    {
        $db = Db::getConnection();
        $sql = "SELECT t.team_id, creation_time, summary, p.title AS project, p.project_id AS project_id,
                    s.name AS creator, s.student_id AS creator_id
                    FROM Team t INNER JOIN Project p ON t.Project_id=p.Project_id
                    INNER JOIN Student s ON s.Student_id=t.Student_creator_id
                    WHERE t.team_id = :team_id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":team_id", $team_id);
        $ok = $stmt->execute();
        if($ok)
        {
            return  $stmt->fetch(PDO::FETCH_ASSOC);
        }
        else
        {
            $error = $stmt->errorInfo();    // else print error codes
            echo $error[0];
            echo $error[1];
            echo $error[2];
            return 0;
        }
    }

     public static function getTeamStudents($team_id)
     {
         $db = Db::getConnection();
        $sql = "SELECT s.student_id, name
                    FROM Student s
                    INNER JOIN Member m ON m.student_id=s.student_id
                    WHERE m.team_id = :team_id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":team_id", $team_id);
        $ok = $stmt->execute();
        if($ok)
        {
            return  $stmt->fetchall(PDO::FETCH_ASSOC);
        }
        else
        {
            $error = $stmt->errorInfo();    // else print error codes
            echo $error[0];
            echo $error[1];
            echo $error[2];
            return 0;
        }   
     }

    public static function getStudentTeamsLimit($student_id, $startPage,$projectsPerPage)
    {
        $db = Db::getConnection();
        $sql = "SELECT t.team_id
                    FROM Team t
                    INNER JOIN Member m ON t.team_id = m.team_id
                    WHERE m.Student_id = :student_id
                    ORDER BY Creation_date
                    DESC LIMIT $startPage, $projectsPerPage";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":student_id", $student_id);
        $ok = $stmt->execute();
        if($ok)
        {
            return  $stmt->fetchall(PDO::FETCH_ASSOC);
        }
        else
        {
            $error = $stmt->errorInfo();    // else print error codes
            echo $error[0];
            echo $error[1];
            echo $error[2];
            return 0;
        }
    }

    public static function getStudentTeams($student_id)
    {
        $db = Db::getConnection();
        $sql = "SELECT t.team_id
                    FROM Team t
                    INNER JOIN Member m ON t.team_id = m.team_id
                    WHERE m.Student_id = :student_id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":student_id", $student_id);
        $ok = $stmt->execute();
        if($ok)
        {
            return  $stmt->fetchall(PDO::FETCH_ASSOC);
        }
        else
        {
            $error = $stmt->errorInfo();    // else print error codes
            echo $error[0];
            echo $error[1];
            echo $error[2];
            return 0;
        }
    }

    public static function updateTeamSummary($summary, $team_id){
        $db = Db::getConnection();
        $sql = "UPDATE Team SET Summary= :summary
                WHERE Team.Team_id = :team_id";

        $stmt = $db->prepare($sql);
        $stmt->bindValue(":summary", $summary);
        $stmt->bindValue(":team_id", $team_id);
        $ok = $stmt->execute();
        if($ok)
        {
            return  $stmt->fetchall(PDO::FETCH_ASSOC);
        }
        else
        {
            $error = $stmt->errorInfo();    // else print error codes
            echo $error[0];
            echo $error[1];
            echo $error[2];
            return 0;
        }
    }

}
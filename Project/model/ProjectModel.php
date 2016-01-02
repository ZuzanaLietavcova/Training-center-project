<?php

require_once "Db.php";

class ProjectModel
{
	public static function CreateProject($title, $subject, $deadline, $trainer_id, $class_id)
	{
		$db = Db::getConnection();
		$sql = "INSERT INTO Project (title, subject, deadline, creation_time, trainer_id, class_id)
                VALUES (:title, :subject, :deadline, CURRENT_TIMESTAMP(), :trainer_id, :class_id)";
        $stmt = $db->prepare($sql);
		$stmt->bindValue(":title", $title);
        $stmt->bindValue(":subject", $subject);
        $stmt->bindValue(":deadline", $deadline);
        $stmt->bindValue(":trainer_id", $trainer_id);
        $stmt->bindValue(":class_id", $class_id);
		$ok = $stmt->execute();

		if($ok){
			echo "successfully created new project";	// success
		}
		else{
			$error = $stmt->errorInfo();	// else print error codes
			echo $error[0];
			echo $error[1];
			echo $error[2];
		}
	}

    public static function deleteProject($project_id)
    {
        $db = Db::getConnection();
        $sql = "DELETE from project WHERE project_id = :project_id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":project_id", $project_id);
        $ok = $stmt->execute();
        if($ok){
            echo "successfully deleted project";	// success

        }
        else{
            $error = $stmt->errorInfo();	// else print error codes
            echo $error[0];
            echo $error[1];
            echo $error[2];
        }
    }


    public static function getAllProjects($trainer_id)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM project where trainer_id = :trainer_id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":trainer_id", $trainer_id);
        $ok = $stmt->execute();
        if($ok){
            //echo "successfully retrieved all projects";
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // return array of objects
        }
        else{
            $error = $stmt->errorInfo();	// else print error codes
            echo $error[0];
            echo $error[1];
            echo $error[2];
            return 0;
        }
    }


    public static function getCurrentProjects($trainer_id, $startPage, $projectsPerPage)
    {
        $db = Db::getConnection();
        $sql = "SELECT project_id, Title, Subject, Creation_time, Deadline, Trainer_id, Class_id
							 FROM Project
							 WHERE Project.Trainer_id = :trainer_id
							 ORDER BY Deadline
							 DESC LIMIT $startPage, $projectsPerPage";  // limit by start
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":trainer_id", $trainer_id);
        $ok = $stmt->execute();
        if($ok){
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // return array of objects
        }
        else{
            $error = $stmt->errorInfo();	// else print error codes
            echo $error[0];
            echo $error[1];
            echo $error[2];
            return 0;
        }
    }

    public static function getProjectById($project_id)
    {
        $db = Db::getConnection();
        $sql = "SELECT p.project_id, p.title, p.subject, p.creation_time, p.deadline, p.class_id,
                    t.name AS trainer, t.trainer_id AS trainer_id, c.name AS class
                    FROM Project p
                    INNER JOIN Trainer t ON t.Trainer_id=p.project_id
                    INNER JOIN Class c ON c.Class_id=p.class_id
                    WHERE project_id = :project_id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":project_id", $project_id);
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

    public static function getProjectTeams($project_id)
    {
        $db = Db::getConnection();
        $sql = "SELECT team_id, summary
                    FROM Team
                    WHERE project_id = :project_id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":project_id", $project_id);
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

    public static function updateProject($title, $subject, $deadline, $project_id)
    {
        $db = Db::getConnection();
        $sql = "UPDATE Project SET Title=:title, Subject=:subject, Deadline=:deadline
                WHERE Project_id=:project_id";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":title", $title);
        $stmt->bindValue(":subject", $subject);
        $stmt->bindValue(":deadline", $deadline);
        $stmt->bindValue(":project_id", $project_id);
        $ok = $stmt->execute();
        if($ok)
        {
            return  $ok;
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

    public static function getFreeStudents($class_id)
    {
        // Gets students not in any team
        $db = Db::getConnection();
        $sql = "SELECT s.student_id, stud.name
            FROM study s 
            LEFT JOIN member m  ON s.student_id=m.student_id
            LEFT JOIN student stud ON stud.student_id=s.student_id
            WHERE m.student_id IS NULL";

        $stmt = $db->prepare($sql);
        $stmt->bindValue(":class_id", $class_id);

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
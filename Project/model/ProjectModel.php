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



}
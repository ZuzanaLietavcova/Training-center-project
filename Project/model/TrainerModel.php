<?php

require_once "Db.php";  // add db

/**
 * User: nillernoels
 * Date: 19/12/15
 * Time: 16:09
 */
class TrainerModel
{

    /**
     * @param $name name of the trainer
     * @param $class_id id of the current class
     */
    public static function CreateTrainer($name, $class_id)
    {
        $db = Db::getConnection();
        $sql = "INSERT INTO Trainer (name) VALUES (:name)"; // insert new trainer
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":name", $name);
        $ok = $stmt->execute();
        if($ok)
        {
            $lastTrainer_id = self::getLastTrainerID(); // get trainer id
            $sql2 = "INSERT INTO Training (Class_id, Trainer_id) VALUES (:class_id, :trainer_id)";  // update training table
            $stmt = $db->prepare($sql2);
            $stmt->bindValue(":class_id", $class_id);
            $stmt->bindValue(":trainer_id", $lastTrainer_id);
            $stmt->execute();
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
        else
        {
            $error = $stmt->errorInfo();	// else print error codes
            echo $error[0];
            echo $error[1];
            echo $error[2];
            if (mysql_errno() == 1062) {
                return false;
            }
        }
    }


    /**
     * @return id of last inserted trainer
     * @return null otherwise
     */
    public static function getLastTrainerID()
    {
        $db = Db::getConnection();
        $sql = "SELECT MAX(trainer_id) AS LastID FROM trainer"; // get latest id (the highest value)
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

    public static function getTrainer($trainer_id){
        $db = Db::getConnection();
        $sql = "SELECT * from trainer WHERE (trainer_id = :trainer_id)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":trainer_id", $trainer_id);
        $ok = $stmt->execute();
        if($ok)
        {	// success
            $rs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rs["name"];   // return name as string
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
}
<?php

require_once "Db.php";  // add db

/**
 * Created by PhpStorm.
 * User: nillernoels
 * Date: 22/12/15
 * Time: 19:20
 */
class StudentModel
{
    public static function createStudent($name, $class_id)
    {
        $db = Db::getConnection();
        $sql = "INSERT INTO Student (name) VALUES (:name)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":name", $name);
        $ok = $stmt->execute();

        if($ok)
        {
            $lastStudent_id = self::getLastStudent(); // get student id
            $sql2 = "INSERT INTO Study (Class_id, Student_id) VALUES (:class_id, :student_id)";  // update training table
            $stmt = $db->prepare($sql2);
            $stmt->bindValue(":class_id", $class_id);
            $stmt->bindValue(":student_id", $lastStudent_id);
            $stmt->execute();
            if($ok)
            {
                echo "successfully created new student and updated study table";	// success
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
     * @return id of last inserted student
     * @return null otherwise
     */
    public static function getLastStudent()
    {
        $db = Db::getConnection();
        $sql = "SELECT MAX(student_id) AS LastID FROM student"; // get latest id (the highest value)
        $stmt = $db->prepare($sql);
        $ok = $stmt->execute();
        if($ok)
        {	// success
            $rs = $stmt->fetch(PDO::FETCH_ASSOC);
            return $rs["LastID"];   // return id as int
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

    public static function getStudent($studentID){
        $db = Db::getConnection();
        $sql = "SELECT * from student WHERE (student_id = :student_id)"; // get latest id (the highest value)
        $stmt = $db->prepare($sql);
        $stmt->bindValue(":student_id", $studentID);
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
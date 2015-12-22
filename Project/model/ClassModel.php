<?php

require_once "Db.php";

class ClassModel
{
	public static function CreateClass($name)
	{
		$db = Db::getConnection();
		$sql = "INSERT INTO Class (name) VALUES (:name)";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(":name", $name);
		$ok = $stmt->execute();

		if($ok){
			echo "successfully created new class";	// success
		}
		else{
			$error = $stmt->errorInfo();	// else print error codes
			echo $error[0];
			echo $error[1];
			echo $error[2];
		}
	}
}
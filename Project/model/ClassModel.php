<?php

require_once "Db.php";

class ClassModel
{
	public static function CreateClass($name)
	{
		$db = Db::getConnection();
		$sql = "INSERT INTO Class (name) VALUES (name = :name)";
		$stmt = $db->prepare($sql);
		$stmt->bindValue(":name", $name);
		$ok = $stmt->execute();
		if ($ok)
		{
			return 1;
		}
	}	

}
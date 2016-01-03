<?php

class Db
{
	public static function getConnection()
	{
		$db = "training_center_project";
		$dsn = "mysql:dbname=$db;host=localhost";
    	$user = "admin";
    	$password = "root";
    	// Get a DB connection with PDO library
    	$bdd = new PDO($dsn, $user);
    	// Set communication in utf-8
    	$bdd->exec("SET character_set_client = 'utf8'");
    	return $bdd;
	}
}
<?php
//SET CONNECTION TO DATABASE
require_once 'db.php';

	//IF ID IS SET TO NUMERIC, GET THE ID OF THE RECORD CLICKED, ELSE REDIRECT TO VIEW.PHP
	if (isset($_GET['id']) && is_numeric($_GET['id']))
	{
		$id = $_GET['id'];
		
		//DELETE RECORD WHERE ID = ?, THE QUESTION MARK VALUE WOULD BE REPLACED BY THE BINDING PRAMATERS INSIDE THE $stmt->bind_param (INTEGER, $id), then execute $stmt , and then close the $stmt  (($stmt = statement)), BY HAVING THE $id variable WITHIN THE ARGUMENTS OF THE BIND_PARAM YOU PREVENT SQL INJECTION ATTACKS!
		if($stmt = $mysqli->prepare("DELETE FROM contacts WHERE contact_id = ? LIMIT 1"))
		{
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->close();
		}
		else
		{
			echo "ERROR: could not prepare SQL statement";
		}
		//CLOSE DATABASE CONNECTION
		$mysqli->close();
		
		header("Location: view.php");
	}
	else
	{
		header("Location: view.php");
	}




?>
<?php

require_once('../libraries/db.php');

class user_model {
	
	public function __construct() {
	    
	}
	
	//PREPARE SQL STATEMENT
	public function getUserByNamePass($name, $pass) {
		
		$db = db::get_instance();   
		
		$stmt = $db->current_db->prepare("
			SELECT user_id AS id, user_name AS name, user_fullname AS fullname
			FROM users 
			WHERE (user_name = :name)
			AND (user_password = MD5(CONCAT(user_salt, :pass)))
		");//MD5 concatenated with user_salt provides a secure way to login (see database)
		//EXECUTE PASSING ANY NEEDED PARAMETERS
		if ($stmt->execute(array(':name' => $name, ':pass' => $pass))) { 
			$rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
			if (count($rows) === 1) {
				return $rows[0];
			}
		}
		return FALSE;
	}
	
	public function addUser($user_name, $full_name, $password )
	{
		try
		{
			$db = db::get_instance(); 
			$salt = number_format(microtime(true), 8, '',''); 
			$password = md5( $salt.$password ); 
			$stmt = $db->current_db->prepare("
				INSERT INTO users(user_name, user_fullname, user_password, user_salt) VALUES(:user_name,:full_name, :password, :salt )");

			$success =  $stmt->execute( array(':user_name'=> $user_name, ':password' => $password, ':salt' => $salt, ':full_name' => $full_name) );
		}catch (PDOException $e){
			//echo '<pre>';
			//print_r ($e);
			//echo '</pre>';
		}
		return $success; 
	}
	
	
}

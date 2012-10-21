<?php
require_once('../libraries/db.php');

class contacts_model{ 
	
//**************************************************************************************************** 
public function get_contacts( $user_id )
{
	$db = db::get_instance(); 
	
		$stmt = $db->current_db->prepare("SELECT * FROM contacts WHERE (user_id = :user_id) ");

		if ($stmt->execute(array(':user_id' => $user_id ) ) ) { 
			$rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
			if (count($rows) > 0) {
				return $rows;
			}
		}

		return FALSE;	
}

//****************************************************************************************************

public function get_contact( $contact_id )
{
	$db = db::get_instance(); 
	
		$stmt = $db->current_db->prepare("SELECT * FROM contacts WHERE (contact_id = :contact_id) ");

		if ($stmt->execute(array(':contact_id' => $contact_id ) ) ) { 
			$rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
			if (count($rows) > 0) {
				return $rows[0];
			}
		}

		return FALSE;	
}

//****************************************************************************************************

public function update_contact( $data )
{
	 $db = db::get_instance(); 
	 $stmt = $db->current_db->prepare('UPDATE contacts SET contact_name = ?, contact_lname = ?, contact_address = ?, contact_phone = ?, contact_email = ? WHERE contact_id = ?'); 
	 $values = array($data['contact_name'], $data['contact_lname'], $data['contact_address'], $data['contact_phone'], $data['contact_email'], $data['id']);
	 return $stmt->execute($values);
	
}

//****************************************************************************************************
	
public function add_contact( $data )
{
	$db = db::get_instance();
	$stmt =$db->current_db->prepare('INSERT INTO contacts SET contact_name = ?, contact_lname = ?, contact_address = ?, contact_phone = ?, contact_email = ?, user_id = ?');
	$values = array($data['contact_name'], $data['contact_lname'], $data['contact_address'], $data['contact_phone'], $data['contact_email'], $data['user_id']);
	
	 return $stmt->execute($values);
	
}

//****************************************************************************************************

public function delete_contact( $contact_id )
{
	 $db = db::get_instance(); 
	 $stmt = $db->current_db->prepare('DELETE FROM contacts WHERE (contact_id = :contact_id)'); 
	 return $stmt->execute(array(':contact_id' => $contact_id)); 
}	
	
//****************************************************************************************************	
	
}

?>
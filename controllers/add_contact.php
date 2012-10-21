<?php
//SET CONNECTION TO DATABASE
require_once '../libraries/db.php';
require_once '../models/contacts_model.php';



session_start(); 
$user_id = $_SESSION['userinfo']['id'];

	//IF ID IS SET TO NUMERIC, GET THE ID OF THE RECORD CLICKED, ELSE REDIRECT TO VIEW.PHP
	if ( !empty( $_POST ))
	{
		
		  $input_fields = array('contact_name' => 'Contact name','contact_lname' => 'Last Name','contact_address' => 'Address', 'contact_phone' => 'Phone', 'contact_email' => 'Email' );
		   $input_keys = array_keys( $input_fields );  
		   $fields_are_valid = true; 
		   foreach( $_POST as $input_name => $field_value )
		   {
			  if( in_array( $input_name, $input_keys ) )
		 	  {
			     $field_value = trim( htmlentities($field_value, ENT_QUOTES) );
			     if($field_value === '') 
			     {
			         echo $input_fields[ $input_name ].' is a required field'; 
			         $fields_are_valid = false; 
			     }
			  }	
		   }
		
		  if( !$fields_are_valid ) exit;
          $_POST['user_id'] = $user_id; 

	
   //insert 
   $contact_model = new contacts_model(); 
   $success = $contact_model->add_contact($_POST);
  
    if( $success )
		{
   
		   $url = 'show_contacts.php?&id='.$user_id;
		   header('Location: '.$url);  
		}
    	else
 		{
		   echo 'Not able to add user '.$_POST['user_name']; 
		}
		
	}




?>
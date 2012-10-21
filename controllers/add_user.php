<?php
require_once "../models/user_model.php";
require_once "../libraries/AuthView.php";
// If this is not a postback then show the add_user view file 
if( empty( $_POST )  )
{
	$view = new AuthView();
	$view->show('header'); 
	$view->show('add_user');
	$view->show('footer');
}
else    // Otherwise perform validation and save the user and redirect back to login   
{
    // validation checks and make sure they have entered in all required information 

		   
		  
		   $input_fields = array('user_name' => 'User name','full_name' => 'Full Name','password' => 'Password');
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
   

	
   //insert 
   $user_model = new user_model(); 
   $success = $user_model->addUser($_POST['user_name'], $_POST['full_name'], $_POST['password'] );
  
    if( $success )
		{
		   $host = $_SERVER['HTTP_HOST']; 
		   $url = 'http://'.$host.'/crud/controllers/auth.php?added_user';
		   header('Location: '.$url);  
		}
    	else
 		{
		   echo 'Not able to add user '.$_POST['user_name']; 
		}
		 
        
}

?>
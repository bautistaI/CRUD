<?php
include('../libraries/AuthView.php'); 
include('../models/contacts_model.php');

if( !empty( $_POST )  )
{
	// make sure that the contact belongs to the user before updating 
	session_start();
   $host = $_SERVER['HTTP_HOST']; 
   $user_id = $_SESSION['userinfo']['id']; 
   $url = 'http://'.$host.'../crud/controllers/show_contacts.php?&id='.$user_id;
    $contacts_model = new contacts_model(); 
   if( $contacts_model->update_contact( $_POST ) )
   {
	  header('Location: '.$url);
   }  
}
else if( isset( $_GET['id'] ) )
{
	$contacts_model = new contacts_model(); 
	$contact = $contacts_model->get_contact( $_GET['id'] );
	$data['contact'] = $contact;  
	$view = new AuthView(); 
	$view->show('header');
	$view->show('view_contact', $data);
	$view->show('footer');
	
}




?>
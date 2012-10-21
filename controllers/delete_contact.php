<?php
include('../libraries/AuthView.php'); 
include('../models/contacts_model.php'); 

$contacts_model = new contacts_model(); 

if( isset( $_GET['id'] ))
{
   session_start();
   $contacts = new contacts_model(); 
   $user_id = $_SESSION['userinfo']['id']; 
   $url = 'show_contacts.php?&id='.$user_id; 
   if( $contacts->delete_contact( $_GET['id'] ) )
       header('Location: '.$url); 
   else
       echo "Sorry delete failed.";

} 




?>
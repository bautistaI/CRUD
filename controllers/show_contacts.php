<?php
include('../libraries/AuthView.php'); 
include('../models/contacts_model.php'); 


$contacts_model = new contacts_model(); 

if( isset( $_GET['id'] ))
{
   // some kind of validation and security checks 
    $data['contacts'] = $contacts_model->get_contacts( $_GET['id'] );
    $view = new AuthView(); 
    $view->show('header');
	$view->show('contacts', $data);
	$view->show('footer');
} 




?>
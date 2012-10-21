<?php

require_once "../models/user_model.php";
require_once "../libraries/AuthView.php";


$model = new user_model();
$view = new AuthView();

$username = empty($_POST['username']) ? '' : strtolower(trim($_POST['username']));//make username lower case trim empty spaces
$password = empty($_POST['password']) ? '' : trim($_POST['password']);

//VARIABLE USED TO KEEP VALUE 'form'
$contentPage = 'form';
$user = NULL;

session_start();

//makes sure the user only sees the success page if he reloads the page while already login
if (!empty($_session['userinfo'])) {
	$contentPage = 'success';
	$user = $_SESSION['userinfo'];
}


//VERIFY THAT USERNAME AND PASSWORD EXISTS, IF THEY DO CREATE YOUR MODEL
if (!empty($username) && !empty($password)) {
	$user = $model->getUserByNamePass($username, $password);
	
	if (is_array($user)) 
	{
		$contentPage = 'success';
		$_SESSION['userinfo'] = $user;
	} 
	else
	{
		$contentPage = 'failed';
	}
}




$view->show('header');
$view->show($contentPage, $user);
$view->show('footer');






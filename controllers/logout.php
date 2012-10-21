<?php

session_start();
unset($_SESSION['userinfo']);

//In PHP make sure session is destroyed
session_destroy();
//Or create a total new id session after logout
session_regenerate_id(true);   


//make sure you always exit after redirecting the user 
header('Location: auth.php');
exit;

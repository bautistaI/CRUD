<?php
class db{
	
private $_connection_info = 'mysql:host=127.0.0.1;port=8889;dbname=address_book';
private $_user = 'root';
private $_password = 'root';
public  $current_db; 
static  $instance; 

 private function __construct(){
	 $this->current_db = new \PDO($this->_connection_info, $this->_user, $this->_password);
	 $this->current_db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
 }
 
 public static function get_instance()
 {
    if( !isset( self::$instance ) )
    {
	    $className = __CLASS__; 
	    self::$instance = new $className; 
    }
    return self::$instance; 
 }


}

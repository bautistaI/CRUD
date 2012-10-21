<?php

class AuthView {
	
	public function show($view_file, $data = array()) {
		//chech existence of template and show it
		if( $data != null ) 
		    extract( $data );

		$view_path = "../views/{$view_file}.php";

		if (file_exists($view_path)) {
			include $view_path;
		}
		else 
		{			
			echo 'current working directory'.getcwd(); 
		}
	}
	
}



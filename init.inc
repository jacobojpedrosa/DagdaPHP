<?php
	session_start();
	if(!is_file('./config.inc')) die("<h2>Error</h2><p>Dagda error: no se encuentra el archivo :config.inc </p>");
	require_once ('./config.inc');

	if(!is_file('./fw_config.php')) die("<h2>Error</h2><p>Dagda error: no se encuentra el archivo: './fw_config.php' </p>");
	include_once ('./fw_config.php');
	
	foreach ($files as $c){
		if(!is_file($c)) die("<h2>Error</h2><p>Dagda error: no se encuentra el archivo: $c </p>");
		include_once ($c);
	}

	$db =& database::getInstance();
	if(defined( 'DB_HOST' )){
		$db->connect();
	}

/********************************************************************************************************************/
  
  
  function init(){
		loadUser();
		loadSeccion();
	}
		
		
	function loadUser(){
		if(isset($_SESSION['user'])){
			$u = new user();
			$u=&$u->getInstance();
			$u->id=$_SESSION['user']['id'];
			$u->load();
			
		}
    
	}
  
	function loadSeccion(){
		
	}



	class template extends Smarty {

		function template(){
		   $this->Smarty();

			$this->template_dir = SERVER_DIR.'core/templates/';
			$this->compile_dir = SERVER_DIR.'data/templates_c/';
			$this->compile =SMARTY_COMPILE;
			$this->debugging = SMARTY_DEBUGGING;
		}
	}
	
  
  
	
/*
	$smarty =& new smarty();
	$smarty->template_dir = SERVER_DIR.'core/templates/';
	$smarty->compile_dir = SERVER_DIR.'data/templates_c/';
	$smarty->compile =SMARTY_COMPILE;
	$smarty->debugging = SMARTY_DEBUGGING;
*/
?>

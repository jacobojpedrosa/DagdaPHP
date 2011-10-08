<?php
	class dagda{
		var $user;
		var $seccion;
		
		function init(){
			loadUser();
			loadSeccion();
		}
		
		
		function loadUser(){
			if(isset($_SESSION['user'])){
				$this->user=$_SESSION['user']
			}
		}
	}
?>
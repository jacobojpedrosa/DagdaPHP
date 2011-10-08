<?php
	class group{
		var $id;
		var $name;
		
		
//FUNCIONES GET		
		function getId(){}
		
		function getName(){}
		
		
//FUNCIONES SET
		function setId($id=null){
			if(isset($id)){
				$this->id=$id;
			}
			else{
				trigerr_error("ERROR:El tipo de dato utilizado no es correcto");
			}
		}
		
		function setName(){}
		
		
//OTRAS FUNCIONES

		function load(){
			$db =& database::getInstance();
			$sql = "SELECT `name` FROM `group` WHERE `id`=".$this->id;
			$ID=$db->execute($sql);
			$r = mysql_fetch_assoc($ID);
			print_r($r);
		}
		
		function getUsers(){}
	
		
		function install(){
			$db =& database::getInstance();
			$sql = "CREATE TABLE `group`(
						id INT(15) NOT NULL PRIMARY KEY AUTO_INCREMENT,
						name CHAR(250) NOT NULL COLLATE utf8_unicode_ci,
						dateCreated DATE	
						);";
			$ID=$db->execute($sql);
		}
		
	}
	
	
/*
	CREATE TABLE `group`(
		id INT(15) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		name CHAR(250) NOT NULL COLLATE utf8_unicode_ci,
		dateCreated DATE	
	);

	CREATE TABLE `userGroup`(
		idUser INT(15) NOT NULL,
		idGroup INT(15) NOT NULL
	);

*/
?>

<?php
	class seccion{
		var $id;
		var $title;
		var $descripcion;
		
		//SINGLETON
		function &getInstance(){
			static $instance;
			if (!isset($instance)){
			$c = __CLASS__;
			 $instance = new $c();
			}
			return $instance;     
		}
		
		
		//FUNCIONES GET
		
		//FUNCIONES SET
		
		//FUNCIONES DE GESTION
		
		
		function load(){
			if(isset($this->id)){
				$sql="SELECT * FROM `seccion` WHERE `id`='".$this->id."'";
				$db =& database::getInstance();
				$ID=$db->execute($sql);
				if($R=mysql_fetch_array($ID)){
					$this->title=$R['title'];
					$this->descripcion=$R['descripcion'];
				}
			}
		}
		
		function save(){}
		
		function update(){}
		
		function delete(){}
		
		function install(){
			$sql="CREATE TABLE `seccion`(
				id INT(15) NOT NULL PRIMARY KEY AUTO_INCREMENT,
				title CHAR(250) NOT NULL COLLATE utf8_unicode_ci,
				descripcion TEXT COLLATE utf8_unicode_ci
			);";
			//$sql="SELECT * FROM `seccion` WHERE `id`='".$this->id."'";
			$db =& database::getInstance();
			$ID=$db->execute($sql);
		}
		
		function loadItems(){
			$sql="SELECT `id` FROM `item` WHERE `idSec`='".$this->id."'";
			$db =& database::getInstance();
				$ID=$db->execute($sql);
				while($R=mysql_fetch_assoc($ID)){
					$array[]=$R;
				}
				
				return $array;
		}
		
		
	}

/*
	CREATE TABLE `group`(
		id INT(15) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		title CHAR(250) NOT NULL COLLATE utf8_unicode_ci,
		descripcion TEXT COLLATE utf8_unicode_ci
	);
	
	CREATE TABLE `userGroup`(
		idUser INT(15) NOT NULL,
		idGroup INT(15) NOT NULL
	);
*/


?>
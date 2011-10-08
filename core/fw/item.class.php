<?php
	class item{
		var $id;//Identificador unico en la DB
		var $idItem;//Identificador dentro de la DB del componente
		var $componente;//Identificador del componente
		var $idSec;
		var $idUser;
		var $IP;
		
				
		//FUNCIONES GET
		
		//FUNCIONES SET
		
		//FUNCIONES DE GESTION
		
		
		function load(){
			if(isset($this->idItem)){
				$sql="SELECT * FROM `item` WHERE `id`=".$this->id;
				$db =& database::getInstance();
				$ID=$db->execute($sql);
				if($r=mysql_fetch_assoc($ID)){
					//$this->idItem=
				}
				
			}
		}
		
		function save(){
			$sql="INSERT INTO `item` (`idItem`, `componente`, `idSec`, `idUser`, `IP`) VALUES ('".$this->idItem."', '".$this->componente."', '".$this->idSec."', '".$this->idUser."', '".$this->IP."')";
			$db =& database::getInstance();
			$db->execute($sql);
		}
		
		function update(){}
		
		function delete(){}
		
		function install(){
			$sql="CREATE TABLE `item`(
				id INT(15) NOT NULL PRIMARY KEY AUTO_INCREMENT,
				idItem INT(15) NOT NULL,
				componente char(250) NOT NULL,
				idSec INT(15) NOT NULL,
				idUser  INT(15) NOT NULL,
				IP  CHAR(15) NOT NULL
			);";
			$db =& database::getInstance();
			$ID=$db->execute($sql);
			
		}
		
		
		
	}

/*
	CREATE TABLE `item`(
		idItem INT(15) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		idCom INT(15) NOT NULL,
		idSeccion INT(15) NOT NULL,
		idUser  INT(15) NOT NULL,
		IP  CHAR(15) NOT NULL
	);
*/	
	

?>
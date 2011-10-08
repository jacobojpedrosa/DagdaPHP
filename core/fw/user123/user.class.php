<?php


	class user{	
		var $id;
		var $nick;
		var $password;
		var $mail;
		var $name;
		var $surname;
//		var $IP;
		var $dateRegistred;



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
		function getId(){
			return $this->id;
		}

		function getNick(){
			return $this->nick;
		}
		
		function getPassword(){
			return $this->password;
		}
		
		function getMail(){
			return $this->mail;
		}
		
		function getName(){
			return $this->name;
		}
		
		function getSurname(){
			return $this->surname;
		}
		
/*		function getIP(){
			return $this->IP;
		}
*/		
		function getDateRegistred(){
			return $this->dateRegistred;
		}


//FUNCIONES SET		
		
		function setId($id=null){
			$this->id=$id;
		}
		
		function setNick($nick=null){
			$this->nick = $nick;
		}
		
		function setPassword($password=null){
			$this->password=$password;
		}

		function setMail($mail=null){
			$this->mail=$mail;
		}
		
		function setName($name=null){
			$this->name=$name;
		}
		
		function setSurname($surname=null){
			$this->surname=$surname;
		}
		
/*		function setIP($IP=null){
			$this->IP=$IP;
		}
*/		
		function setDateRegistred($dateRegistred=null){
			$this->dateRegistred=$dateRegistred;
		}
		
		
//FUNCIONES DE GESTION

		function load(){
			if(isset($this->id)){
				$db =& database::getInstance();
				$c = user::getInstance();
				$sql = "SELECT * FROM `user` WHERE `id`=".$this->id;
				$ID=$db->execute($sql);
				$r = mysql_fetch_object($ID);
				$r->password=md5($r->password);
				
				$this->id=$r->id;
				$this->nick=$r->nick;
				$this->password=$r->password;
				$this->mail=$r->mail;
				$this->name=$r->name;
				$this->surname=$r->surname;
		//		var $IP;
				$this->dateRegistred=$r->dateRegistred;
				
				
				//print_r($c);
			}
			else{
				trigger_error("ERROR: ESTE USUARIO NO EXISTE");
			}
		}
		
		function save(){
			$u =& user::getInstance();
			$u->password = md5($u->password);
//			$sql ="INTERT INTO `user` (`nick`, `password`, `mail`, `name`, `surname`) VALUES ('".$this->nick."', MD5('".$this->password."'), '".$this->mail."', '".$this->name."', '".$this->surname."', )"
			$db =& database::getInstance();
			$db->insertObject('user',$u);
		}
		
		function update(){
			$u =& user::getInstance();
			$db =& database::getInstance();
			$db->updateObject('user',$u, $u->id);
		}
		
		function delete(){
			$sql = "DELETE FROM `user` WHERE `id`=".$this->id;
			$db =& database::getInstance();
			$db->execute($sql);
		}		
		
		function install(){
			$db =& database::getInstance();
			$sql = "CREATE TABLE `user`(
					id INT(15) NOT NULL PRIMARY KEY AUTO_INCREMENT,
					nick CHAR(250) NOT NULL COLLATE utf8_unicode_ci,
					password CHAR(250) NOT NULL COLLATE utf8_unicode_ci,
					mail CHAR(250) NOT NULL COLLATE utf8_unicode_ci,
					name CHAR(250) NOT NULL COLLATE utf8_unicode_ci,
					surname CHAR(250) NOT NULL COLLATE utf8_unicode_ci,
					dateRegistred DATE	
				);";
			$ID=$db->execute($sql);
		}
		
		
		function loadGroups(){
			$sql="SELECT `idGroup` FROM `userGroup` WHERE `idUser`=".$this->id;
			$db =& database::getInstance();
			$ID=$db->execute($sql);			
			$r = mysql_fetch_array($ID);
			$this->groups=$r;
		}
		
		
		function addGroup($idGroup = null){
			if(isset($idGroup)){
				$sql="INSERT INTO `userGroup` SET `idUser`=".$this->id.", `idGroup`=".$idGroup;
				$db =& database::getInstance();
				$ID=$db->execute($sql);
				
			}
			else{
				trigerr_error("ERROR:El tipo de dato utilizado no es correcto");
			}
		}
		
		
		
		
		
	}
		

/*
CREATE TABLE `user`(
	id INT(15) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nick CHAR(250) NOT NULL COLLATE utf8_unicode_ci,
	password CHAR(250) NOT NULL COLLATE utf8_unicode_ci,
	mail CHAR(250) NOT NULL COLLATE utf8_unicode_ci,
	name CHAR(250) NOT NULL COLLATE utf8_unicode_ci,
	surname CHAR(250) NOT NULL COLLATE utf8_unicode_ci,
	dateRegistred DATE	
);
*/

/*
	INSERT INTO `user` (`nick`, `password`, `mail`, `name`, `surname`, `dateRegistred`) VALUES('xack', 'pedmarja', 'jack@dfg.com', 'xack', 'pedrosa', '2008-08-18');
*/


?>



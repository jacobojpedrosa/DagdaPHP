<?php
	class database{
		var $host;
		var $login;
		var $password;
		var $name;
		var $state;
		
		var $connection;
		

		function database(){}
		
		function &getInstance(){
	   	static $instance;
	     	if (!isset($instance)){
	      	$c = __CLASS__;
	         $instance = new $c();
	     	}
			return $instance;     
		}	
		
		function connect(){
			$this->host = DB_HOST;
			$this->login = DB_USER;
			$this->password = DB_PASSWORD;
			$this->name = DB_NAME;
			$this->init();
		}
		
		function init(){
			$this->connection = @mysql_connect(
				$this->host,
				$this->login,
				$this->password
			);
			if(!$this->connection){ 
				$this->state = false;
			} 
			else{	
			// sélection BDD
				$selection = @mysql_select_db( $this->name, $this->connection);
				if(!$selection){ 
					$this->state = false;
				}
				else{
					$this->state = true;
				}
			}
			return true;
		}
		
		
		function isReady(){
			return $this->state;
		}
		
		
		function execute($sql){
			if($this->isReady()){
				if ($ID=mysql_query($sql)){
					return $ID;
				}
				else{
					trigger_error("No se ha podido ejecutar la sentencia: ".$sql."		".mysql_errno($this->connection) . ": " . mysql_error($this->connection). "\n");
					echo $sql;
				}
			}
		}
		
		function close(){
			return mysql_close();
		}

		function insertObject($table, &$object){
			$keys = array_keys(get_object_vars($object));//print_r($keys);
			
			foreach ($keys as $key){
//				echo $key;
				$sql1[]="`".$key."`";
				$sql2[]="'".$object->$key."'";
			}
			$sql1 = implode(",",$sql1);
			$sql2 = implode(",",$sql2);
			$sql = "INSERT INTO `".$table."` (".$sql1.") VALUES (".$sql2.")";
//			$sql = $sql.$sql1.") VALUES (".$sql2.")";
			$ID = $this->execute($sql);
			return $ID;
		}
		
		function updateObject($table, &$object, $id=null){
			$keys = array_keys(get_object_vars($object));//print_r($keys);
				$sql = "UPDATE `".$table."` SET ";
			foreach ($keys as $key){
				$sql1[]=" `".$key."` ='".$object->$key."'";
			}
			$sql1 = array_slice($sql1,1);
			$sql1 = implode(",",$sql1);
			$sql = $sql.$sql1." WHERE id=".$id;
			$ID = $this->execute($sql);
			return $ID;
		}
		
		function listTables(){
			$sql = "SHOW TABLES in dagda;";
			$ID = $this->execute($sql);
			while($r = mysql_fetch_assoc($ID)){$res[]=$r['Tables_in_'.$this->name];}
			return $res;
		}
		
#
		function insertid() {
      	return mysql_insert_id($this->connection);
    	}
	}

/* FIN DE LA CLASE DATABASE 
	function insert($sql){
		$db =& Db::getInstance();
		if($db->isReady()){
			if($ID=mysql_query($sql)){
				$return = mysql_insert_id();
			}
			else{
				trigger_error("No se ha podido ejecutar la inserción: ".$sql);
				$return =  FALSE;
			}
		}
		else{
			trigger_error("No se ha podido ejecutar la inserción: ".$sql);
			$return = false;
		}
		return $return;
	}
	
	function select($sql){
		$db =& Db::getInstance();
		if($db->isReady()){
			if ($ID=mysql_query($sql)); return $ID;
		}
	}
*/
?>		
		

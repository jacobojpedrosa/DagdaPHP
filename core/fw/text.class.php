<?php

//	$Imagen = new Imagen;
	class text{
		var $id;
		var $titulo;
		var $intro;
		var $text;
		var $created;
		var $user;
	
//		include '/var/www/Xack-CMS/includes/database.class.php';
		
		function __construct(){
			
		}
		
		function load($id=null){
			if(isset($id))$this->id = $id;
			if(isset($this->id)){
				$this->id = $id;
				$db = database::getInstance();
			
				$SQL_Txt = "SELECT * FROM `text` WHERE `id`='$this->id'";
				$ID_Txt = $db->execute($SQL_Txt);
			
				if($ROW_Txt= mysql_fetch_assoc($ID_Txt)){
					//$this->IdTexto = $IdTexto;
					$this->id = $ROW_Txt['id'];
					$this->titulo = $ROW_Txt['titulo'];
					$this->intro = $ROW_Txt['intro'];
					$this->text = $ROW_Txt['text'];
					$this->created = $ROW_Txt['created'];
					$this->user = $ROW_Txt['user'];
				}
			}
			else{
				trigger_error("Es necesario seleccionar un texto");
			}
		}
		
		function save(){
			if(isset($this->IdSeccion) && isset($this->Titulo) && isset($this->Texto)){
				$SQL_Texto = "INSERT INTO `Texto` (`IdTexto`, `IdSeccion`, `Titulo`, `Texto`, `IdImagen`) VALUES ";
				$SQL_Texto.= "('', '".$this->IdSeccion."', '".$this->Titulo."', '".$this->Texto."', '".$this->IdImagen."')";
			
				//echo $SQL_Texto;
				$ID_Texto = Ejecutar_SQL($SQL_Texto);
			}
			else{
				$ID_Texto=NULL;
			}
			if($ID_Texto){
				return "Operación realizada con éxito ";
			}
			else{
				trigger_error("No se ha podido completar la operación, por favor intentelo más tarde");
			}
		}

		function update(){
			if(isset($this->IdTexto) && isset($this->IdSeccion) && isset($this->Titulo) && isset($this->Texto)){
				$SQL_Texto = "UPDATE `Texto` SET `IdSeccion`= '".$Texto['IdSeccion']."', `Titulo`='".$Texto['Titulo']."', `Texto`='".$Texto['Texto']."', `IdImagen`='".$Texto['IdImagen']."' WHERE `IdTexto`='".$Texto['IdTexto']."';";
			}
			else{
				$ID_Texto=NULL;
			}
			if($ID_Texto){
				return "Operación realizada con éxito ";
			}
			else{
				trigger_error("No se ha podido completar la operación, por favor intentelo más tarde");
			}
		}

		function remove(){
			if(isset($this->IdTexto)){
				if(isset($this->Image->IdImage) && file_Exists(DIR_IMAGE_ORIG.$this->Image->Imgfile)){
					$this->Image->delete_Imagen();
				}
				$SQL_DropTexto = "DELETE FROM `Texto` WHERE `IdTexto`=".$this->IdTexto;
				return Ejecutar_SQL($SQL_DropTexto);
			}

		}
		
		
		function install($prefix = null){
			$sql = "CREATE TABLE `text`(
				id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
				titulo CHAR(255) NOT NULL COLLATE utf8_unicode_ci,
				intro TEXT NOT NULL COLLATE utf8_unicode_ci,
				text TEXT NOT NULL COLLATE utf8_unicode_ci,
				created  timestamp NOT NULL default current_timestamp,
				user int(11) NOT NULL DEFAULT -1	
			)";
			$db = database::getInstance();
			$create = $db->execute($sql);
			return $create;
		}
		
	}

/*
	CREATE TABLE `text`(
		id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
		titulo CHAR(255) NOT NULL COLLATE utf8_unicode_ci,
		intro TEXT NOT NULL COLLATE utf8_unicode_ci,
		text TEXT NOT NULL COLLATE utf8_unicode_ci,
		created  timestamp NOT NULL default current_timestamp,
		user int(11) NOT NULL DEFAULT -1	
	);
	
	
	INSERT INTO text (titulo, intro, text) VALUES('holaque tal', 'introduzcamos el tema', 'bla-bla-bla-bla-bla-bla-bla-bla-bla-bla-bla-bla-bla-bla');
*/		


?>

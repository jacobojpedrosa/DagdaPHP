<?php
	class image{


	
		var $id;
		var $nombre; //Nombre para acceder a la imagen desde HTML
		var $filename; //Nombre para utilizar en operaciones de server (actalizar, editar...)
		var $imgTitle;//Titulo de la imagen, (nombre original)
		var $dateCreated; //Fecha y hora en la que se ha subido el archivo al server
		var $user; //Usuario que lo ha subido
		var $orig;
		var $med;
		var $min;
		
		var $dirImgOrig; //Ruta de la imagen original
		var $dirImgMed; //Ruta de la imagen grande
		var $dirImgMin; //Ruta de la imagen minimizada
		
		
		function __construct(){
			$this->dirImgOrig = IMAGES.'original/';
			$this->dirImgMed = IMAGES.'medium/';
			$this->dirImgMin = IMAGES.'reduced/';
		}
		
		function load($id=NULL){
			if(isset($id)){
				$sql = "SELECT * FROM image WHERE id =".$id.";";
				$db =& database::getInstance();
				
				$ret = mysql_fetch_object($db->execute($sql));
			
				$this->id = $ret->id;
				$this->filename = $ret->filename;
				$this->imgTitle = $ret->title;
				$this->dateCreated = $ret->dateCreated;
				//$this->user = $user->getData($ret->user);
				
				$this->orig = $this->dirImgOrig.$this->filename;
				$this->med = $this->dirImgMed.$this->filename;
				$this->min = $this->dirImgMin.$this->filename;
			}
		}
		
//Guardar Imagen
		function importar(){
			if (is_uploaded_file($_FILES['Imagen']['tmp_name'])){
				
				if(move_uploaded_file($_FILES['Imagen']['tmp_name'], DIR_IMAGE_ORIG.$_FILES['Imagen']['name'])){
				
					$SQL_NewImagen = "INSERT INTO `Imagen` (`IdImagen`, `Nombre`, `TituloImagen`)";
					$SQL_NewImagen.= "VALUES ('', '".$_FILES['Imagen']['name']."', '".$_FILES['Imagen']['name']."');";
					
					$ID_NewImagen = Ejecutar_SQL($SQL_NewImagen);
					
					//echo $ID_NewImagen;
					$this->id = $ID_NewImagen;
					$this->filename = $_FILES['Imagen']['name'];
					$this->imgTitle = $_FILES['Imagen']['name'];
				}
			}
		}
		
//Cambiar imagen		
		function update_Imagen(){
			if(isset($this->IdImagen) && $this->IdImagen >=1){
				if(file_exists(DIR_IMAGE_ORIG.$this->Imgfile)){
					if(unlink(DIR_IMAGE_ORIG.$this->Imgfile)){
						move_uploaded_file($_FILES['Imagen']['tmp_name'], DIR_IMAGE_ORIG.$this->filename);
					}
				}
				elseif(!file_exists(DIR_IMAGE_ORIG.$this->Imgfile)){
					return(move_uploaded_file($_FILES['Imagen']['tmp_name'], DIR_IMAGE_ORIG.$this->filename));
				}
			}
			else{
				$this->set_Imagen();
			}
			
			return($this->id);
		}

		function delete_Image()
		{
			if(isset($this->IdImagen)){
				if(unlink(DIR_IMAGE_ORIG.$this->filename)){
					$SQL_deleteImage = "DELETE FROM `Imagen` WHERE `IdImagen`=".$this->id;
					return Ejecutar_SQL($SQL_deleteImage);
				}
			}
		}

//Reducir Imagen
/*
	Función para reducir una imagen determinada. 
	Recibe: URL de la imagen original.
	Devuelve: URL de la imagen reducida
	
	Fecha creación: 27-3-07
	Ultima modificación:23-4-08
*/
		function resize($x_size = NULL, $y_size= NULL){
			$Image_o = $this->get_Propieties();
			
			if(isset($x_size) && isset($y_size)){
				
			}
			elseif(isset($x_size) && !isset($y_syze)){
				if($Image_o['X_size'] > $x_size){
					$y_size = ($Image_o['Y_size'] * $x_size)/$Image_o['X_size'];
				}
					
			}
			elseif(isset($y_size) && !isset($x_syze)){
				if($Image_o['Y_size'] > $y_size){
					$x_size = ($Image_o['X_size'] * $y_size)/$Image_o['Y_size'];
				}
			}
			else{
				trigger_error(NO_PARAMETERS.IN_);
			}
			
			$Img_o = imagecreatefromjpeg($this->orig);
			$Img_r = imagecreatetruecolor($x_size, $y_size);
			if(imagecopyresized($Img_r, $Img_o,0,0,0,0, $x_size, $y_size, $Image_o['X_size'], $Image_o['Y_size'])){
				imagejpeg($Img_r, $this->min.'_'.$x_size.'x'.$y_size);
			}
		
/*			if($Image_o = $this->get_Propieties()){
				print_r($Image_o);
				
				if($Image_o['X_size'] > IMG_DEFAULT_SIZE){echo IMG_REDUCED_SIZE;
					$Image_r['Y_size'] = ($Image_o['Y_size'] * IMG_DEFAULT_SIZE)/$Image_o['X_size'];
					$Image_r['X_size'] = IMG_DEFAULT_SIZE;
				}
				if($Image_r['Y_size'] > IMG_DEFAULT_SIZE){
					$Image_r['X_size'] = ($Image_o['X_size'] * IMG_DEFAULT_SIZE)/$Image_o['Y_size'];
					$Image_r['Y_size'] = IMG_DEFAULT_SIZE;
				}

				$Img_o = imagecreatefromjpeg($this->min);
				$Img_r = imagecreatetruecolor($Image_r['X_size'], $Image_r['Y_size']);
				$Creada = imagecopyresized($Img_r, $Img_o,0,0,0,0, $Image_r['X_size'], $Image_r['Y_size'], $Image_o['X_size'], $Image_o['Y_size']);
				if($Creada){
					imagejpeg($Img_r, DIR_IMAGE_REDUC.$Image_r['Nombre']);
				}
			}
*/
		}

//Ampliar Imagen
		function amplia_Imagen($x, $y){
			if($Imagen = $this->get_Imagen($IdImagen)){
				
			
			}
			else{
				return "No se ha podido reducir la imagen, intentelo de nuevo más tarde";
			}
		}

//Escalar Imagen
		function escala_Imagen($IdImagen){
			if($Imagen = $this->get_Imagen($IdImagen)){
				
			
			}
			else{
				return "No se ha podido ampliar la imagen, intentelo de nuevo más tarde";
			}
		}

//Rotar Imagen		
		function rota_Imagen($IdImagen){
			if($Imagen = $this->get_Imagen($IdImagen)){
				
			
			}
			else{
				return "No se ha podido reducir la imagen, intentelo de nuevo más tarde";
			}
		}




//Propiedades de la Imagen
		function get_Propieties(){
			if(file_exists($this->orig)){
				$data = getimagesize($this->orig);
				$Image['X_size'] = $data[0];
				$Image['Y_size']= $data[1];
				return ($Image);
			}
			else{
				return "Error: No se encuentra el archivo imagen \"$this->orig\" en el servidor. ";
			}		
		}		

		
	}
	/***********************************************************************/
	/*
		CREATE TABLE `image`	(
			id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
			filename CHAR(255) NOT NULL COLLATE utf8_unicode_ci,
			title CHAR(255) NOT NULL COLLATE utf8_unicode_ci,
			created  timestamp NOT NULL default current_timestamp,
			user int(11) NOT NULL DEFAULT -1
		);
	*/
	/***********************************************************************/
		
?>

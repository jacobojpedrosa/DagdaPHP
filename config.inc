<?php
	
	//	configuración de la base de datos	
	define ("DB_USER", 'root');
	define ("DB_PASSWORD", '');
	define ("DB_HOST", 'localhost');
	define ("DB_NAME", 'dagda');
	
	
	//	configuración del servidor	
	define("SITE_DIR", 'Dagda/');
	define("SERVER_DIR", $_SERVER[DOCUMENT_ROOT].SITE_DIR);
	
	//	configuración del site
	define("SITE_CONF", SERVER_DIR.'site.conf');
	define("DEFAULT_LANG", 'es_ES');
	define("SITE_ENCODIG", 'utf-8');
	define("SITE_EXIT", 'html');//(html/xml)
	define("DEFAULT_SECCION", 'home');
	
	// Directorios 
	define("FW", SERVER_DIR.'core/fw/');
	define("FILES", SERVER_DIR.'core/');
	define("DATA", SERVER_DIR.'files/');
	define("IMAGES", DATA.'images/');
	define("MODULOS", SERVER_DIR.'modules/');
	define("SMARTY_DIR", SERVER_DIR.'core/smarty/');
	define("LANGUAJES", FILES.'lang/');
//	define("CORE", SERVER_DIR.'core/');
	
	//Smarty values
	define("SMARTY_CLASS", SMARTY_DIR.'Smarty.class.php');
	define("SMARTY_COMPILE", false);
	define("SMARTY_DEBUGGING", false);
	
	
	//Configuracion por defecto de los usuarios
	define("SUPERADMIN_ALIAS", 'root');
	define("SUPERADMIN_PASSWORD", 'b34e20c1b283733ea844f36940d273cc');
	
	//Configuracion
	define("IMG_REDUCED_SIZE",'250');
	
	//Modulos
	define("ARTICLEIMAGES_MOD", MODULOS.'articleImages.mod.php');
?>

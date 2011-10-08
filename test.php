<?php
	//TEST
/*	if(!is_file('./config.inc')) die("<h2>Error</h2><p>Dagda error: no se encuentra el archivo :config.inc </p>");
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

*/
	include_once 'init.inc';

	$s=seccion::getInstance();
	//$s->install();
	
	
	//crear item 
	$i=new item();
	$i->idCom=1;
	$i->idSec=3;
	$i->idUser=1;
	$i->IP='80.58.32.97';

$i->install();
	//guardar items(10diferentes (3secciones))
	//$i->save();
	//cargar items de cada seccion
/*	
	$s->id=1;
	$s->load();
	$items = $s->loadItems();
	print_r($items);
*/	

	$tpl=new template;
	$tpl->display('head.tpl');





/**********************************
INSTALACION:
	group
	item
	seccion
	user
	userGroup




************************************/
?>

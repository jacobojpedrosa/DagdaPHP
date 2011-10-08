<?php
//install.php

/**********************************
INSTALACION:
	group
	item
	seccion
	user
	userGroup
************************************/

include_once 'init.inc';

$sql="CREATE DATABASE `dagda`";
$db =& database::getInstance();
$db->execute($sql);

$g=new group();
$g->install();

$i=new item();
$i->install();

$s=new seccion();
$s->install();

$u = new user();
$u->install();

?>
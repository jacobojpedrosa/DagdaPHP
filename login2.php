<?php
	include_once 'init.inc';
	
	$u = new user();
	$u=&$u->getInstance();
	
	$tpl=new template();
	$tpl->assign('user', $u);
	
	
	if(isset($_GET['action'])){
		if($_GET['action']=='logout'){session_unset();}
		if($_GET['action']=='register'){
			if(!isset($_POST['nick']) OR !isset($_POST['password']) OR !isset($_POST['mail'])){
				$tpl->display('user_form.tpl');
			}
			elseif(isset($_GET['registerUserForm'])){
				echo "Registrando";
			}
		}
	}
	
	if(!isset($_SESSION['user']) && !isset($_POST['nick']) && !isset($_POST['password']) && !isset($_GET['action'])){
		$tpl->display('user_login.tpl');
	}
	elseif(isset($_POST['nick']) OR isset($_POST['password'])){
		$u->login($_POST['nick'],$_POST['password']);
		$u->logedIn=true;
		$_SESSION['user']['id']=$u->id;
		$_SESSION['user']['nick']=$u->nick;
		$_SESSION['user']['password']=$u->password;
		
	}
	
	if(isset($_SESSION['user'])){
		$u->id=$_SESSION['user']['id'];
		$u->load();
		$tpl->display('user_data.tpl');
		echo "<a href=\"?action=logout\">logout</a>";
	}
?>

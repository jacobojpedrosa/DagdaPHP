<?php
	include_once 'init.inc';
	
	$u = new user();
	$u=&$u->getInstance();
	
	$tpl=new template();
	$tpl->assign('user', $u);
	
	$action = $_GET['action'];

//print_r($_POST);
	if(!isset($_SESSION['user'])){
		if($action=="register"){	
			if(!isset($_POST['nick']) OR !isset($_POST['password']) OR !isset($_POST['mail'])){//Formulario Registrar
				$tpl->display('user_form.tpl');
			}
			else{//Guardar Registro
//				echo "Registrando";
				$u->name=$_POST['name'];
				$u->surname=$_POST['surname'];
				$u->mail=$_POST['mail'];
				$u->nick=$_POST['nick'];
				if($_POST['password']==$_POST['password2']){
					$u->password=$_POST['password'];
				}
				$u->save();
			}
		}
		elseif($action=="login" OR $action ==null){
			if(!isset($_POST['nick']) && !isset($_POST['password'])){//Formulario de login
				$tpl->display('user_login.tpl');
			}
			else{//Login
				$u->login($_POST['nick'],$_POST['password']);
				
				$_SESSION['user']['id']=$u->id;
				$_SESSION['user']['nick']=$u->nick;
				$_SESSION['user']['password']=$u->password;
				$_SESSION['user']['group']=$u->loadGroups();
			}
		}
	
	}
	else{
		if(isset($action) && ($action == "logout")){//Logout	
			session_unset();
			$tpl->display('user_login.tpl');
		}
		else{//Usuario logeado,mostrar info
			$u->id=$_SESSION['user']['id'];
			$u->load();
			$tpl->display('user_data.tpl');
			echo "<a href=\"?action=logout\">logout</a>";
		}
	}


?>

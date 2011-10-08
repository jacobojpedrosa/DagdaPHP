<?php /* Smarty version 2.6.19, created on 2008-09-01 18:14:17
         compiled from user_data.tpl */ ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
</head>
<body>
	<form action="" method="POST">
		<table border="1">
			<tr><td rowspan="6">
				Foto</td>
			<tr><td>
				Nombre:</td><td><?php echo $this->_tpl_vars['user']->name; ?>

			</td></tr>
			<tr><td>
				Apellidos:</td><td><?php echo $this->_tpl_vars['user']->surname; ?>

			</td></tr>
			<tr><td>
				mail:</td><td><?php echo $this->_tpl_vars['user']->mail; ?>

			</td></tr>
			<tr><td>
				Nick:</td><td><?php echo $this->_tpl_vars['user']->nick; ?>

			</td></tr>
			<tr><td>
				Fecha de Registro:</td><td><?php echo $this->_tpl_vars['user']->dateRegistred; ?>

			</td></tr>
		</table>
	</form>
</body>
</html>
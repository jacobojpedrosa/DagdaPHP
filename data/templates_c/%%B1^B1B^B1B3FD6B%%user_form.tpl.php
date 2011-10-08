<?php /* Smarty version 2.6.19, created on 2008-09-14 02:17:53
         compiled from user_form.tpl */ ?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
</head>
<body>
	<form action="" method="POST">
		<table border="0" width="100%">
			<tr><td>
				Nombre:</td><td align="right"><input type="text" name="name" value="<?php echo $this->_tpl_vars['user']->name; ?>
" />
			</td></tr>
			<tr><td>
				Apellidos:</td><td align="right"><input type="text" name="surname" value="<?php echo $this->_tpl_vars['user']->surname; ?>
" />
			</td></tr>
			<tr><td>
				mail:</td><td align="right"><input type="text" name="mail" value="<?php echo $this->_tpl_vars['user']->mail; ?>
" />
			</td></tr>
			<tr><td>
				Nick:</td><td align="right"><input type="text" name="nick" value="<?php echo $this->_tpl_vars['user']->nick; ?>
" />
			</td></tr>
			<tr><td>
				Password:</td><td align="right"><input type="password" name="password" />
			</td></tr>
			<tr><td>
				Repeat password:</td><td align="right"><input type="text" name="password2" />
			</td></tr>
			<tr><td>
				</td><td align="right"><input type="submit" name="registerUserForm" value="enviar" />
			</td></tr>
		</table>
	</form>
</body>
</html>
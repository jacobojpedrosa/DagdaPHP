<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
</head>
<body>
	<form action="" method="POST">
		<table border="0" width="100%">
			<tr><td>
				Nombre:</td><td align="right"><input type="text" name="name" value="{$user->name}" />
			</td></tr>
			<tr><td>
				Apellidos:</td><td align="right"><input type="text" name="surname" value="{$user->surname}" />
			</td></tr>
			<tr><td>
				mail:</td><td align="right"><input type="text" name="mail" value="{$user->mail}" />
			</td></tr>
			<tr><td>
				Nick:</td><td align="right"><input type="text" name="nick" value="{$user->nick}" />
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

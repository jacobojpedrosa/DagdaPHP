<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
</head>
<body>
	<form action="" method="POST">
		<table border="1">
			<tr><td rowspan="6">
				Foto</td>
			<tr><td>
				Nombre:</td><td>{$user->name}
			</td></tr>
			<tr><td>
				Apellidos:</td><td>{$user->surname}
			</td></tr>
			<tr><td>
				mail:</td><td>{$user->mail}
			</td></tr>
			<tr><td>
				Nick:</td><td>{$user->nick}
			</td></tr>
			<tr><td>
				Fecha de Registro:</td><td>{$user->dateRegistred}
			</td></tr>
		</table>
	</form>
</body>
</html>

<html>
	<head>
		<title>
			login
		</title>
		<link rel="stylesheet" type="text/css" href="css.css">
	</head>
	<body>
		<form action="http://zend-maroma.fjeclot.net/zendldap/auth.php" method="POST">
			Usuari amb permisos d'administració LDAP: <input type="text" name="adm"><br>
			Contrasenya de l'usuari: <input type="password" name="cts"><br>
			<input type="submit" value="Envia" />
			<input type="reset" value="Neteja" />
		</form>
	</body>
</html>
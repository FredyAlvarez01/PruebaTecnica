<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema de notas</title>
</head>
<body>
	
<h1>Registrar Administrador </h1>

<form method="POST" action="../Controladores/add.php">
	Nombre <br>
	<input type="text" name="Nombre" required="" autocomplete="off" placeholder="Nombre"><br><br>
	Apellido <br>
	<input type="text" name="Apellido" required="" autocomplete="off" placeholder="Apellido"><br><br>
	Uriario <br>
	<input type="text" name="Uriario" required="" autocomplete="off" placeholder="Uriario"><br><br>
    Password <br>
	<input type="text" name="Password" required="" autocomplete="off" placeholder="Password"><br><br>

	<input type="submit" value="registrar Administrador">
</form>

</body>
</html>
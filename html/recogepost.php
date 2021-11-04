<html>
<head>
<meta charset=utf-8 />
<title>Ejemplo de PHP. Recoger post</title>
</head>
<body>
<h1>Datos</h1>
Tu usuario es <?php echo $_POST['Unombre'] ?> <br>
Eres <?php echo $_POST['nombre'] & $_POST['apellido1'] & $_POST['apellido2']  ?> <br>
tu correo es <?php echo $_POST['correo'] ?> <br>
tu dni es <?php echo $_POST['dni'] ?> <br>
tu teléfono es <?php echo $_POST['numero'] ?> <br>
tu contraseña es <?php echo $_POST['contraseña'] ?> <br>
</body>
</html>
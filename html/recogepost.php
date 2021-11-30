



<?php
require 'conexion.php';
$conexion->set_charset('utf8'); //establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos

$Unombre = $_POST['Unombre'];
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$correo = $_POST['correo'];
$dni = $_POST['dni'];
$numero = $_POST['numero'];
$contraseña = $_POST['contraseña'];

$sql = "INSERT INTO `usuario` (`Unombre`, `nombre`, `apellido1`, `apellido2`, `correo`, `dni`, `numero`, `contraseña`) VALUES ('$Unombre', '$nombre', '$apellido1', '$apellido2', '$correo', '$dni', '$numero', '$contraseña')";

$rs = mysqli_query($conexion, $sql);
?>



<html>
<head>
<meta charset=utf-8 />
<title>Ejemplo de PHP. Recoger post</title>
</head>
<body>
<h1>Datos</h1>
Tu usuario es <?php echo $_POST['Unombre'] ?> <br>
Eres <?php echo $_POST['nombre'] . ' ' . $_POST['apellido1'] . ' ' . $_POST['apellido2']  ?> <br>
tu correo es <?php echo $_POST['correo'] ?> <br>
tu dni es <?php echo $_POST['dni'] ?> <br>
tu teléfono es <?php echo $_POST['numero'] ?> <br>
tu contraseña es <?php echo $_POST['contraseña'] ?> <br>
</body>
</html>
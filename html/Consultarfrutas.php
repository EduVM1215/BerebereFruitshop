<?php
require 'conexion.php';
$conexion->set_charset('utf8'); //establece el conjunto de caracteres en la conexión, para que no haya problema de acentos y ñ de los campos
$sql = "SELECT * FROM fruta";
$resultado = $conexion->query($sql);
$numfilas=$resultado->num_rows;
$numcolumns=$resultado->field_count;
if (!$resultado) {
die("No se puede realizar la consulta $conexion->errno: $conexion->error");
}
?>


<html>
<head>
<meta charset=utf-8 />
<title>Conectado a la base de datos</title>
</head>
<body>
<h1>Resultado de la consulta</h1>
<?php 
echo "<center><h1>TABLA Frutas</h1><br><br>";
echo "<center><table border=2><tr><th>ID.</th> <th>CategoriaID</th>  <th>Nombre</th> <th>Precio</th><th>Stock</th> <th>Tipo</th></tr>";
while($registro = $resultado->fetch_assoc()){
echo"<tr>";
foreach ($registro as $campo)
echo "<td>".$campo."</td>";
echo "</tr>"; 
}



?>



</body>
</html>
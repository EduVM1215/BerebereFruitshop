<?php
// caduca en 1 año



if (isset($_COOKIE["vecesvisitado"])){

setcookie("vecesvisitado",$_COOKIE["vecesvisitado"] +1, time() + 60*60*24*365);

}

else setcookie("vecesvisitado",1, time() + 60*60*24*365);

setcookie("idioma", "español", time() + 60*60*24*365);

if (isset($_COOKIE["idioma"])) {
echo 'Tu idioma es '. $_COOKIE["idioma"]; }
else
echo "<p>No conozco tu idioma<p>";

if (isset($_COOKIE["vecesvisitado"])) {

echo '<p>Has visitado estas veces '. $_COOKIE["vecesvisitado"]; }
else
echo "<p>No se cuantas veces has visitado<p>";

?>

<div></div>
<?php
session_start();
$fecha=date("d/m/y");
$_SESSION ["fecha"]=$fecha;
echo 'Fecha almacenada en la sesión: '.$_SESSION ["fecha"];
echo '<br>Nombre de la sesión: '.session_name();
echo '<br>Identificador de la sesión: '.session_id();
?>
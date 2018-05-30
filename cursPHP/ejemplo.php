<?php
/*if (7 == 7 && 5 == 6){
	echo "Verdadero";
}else{

	echo"Falso";
}
$numero = 4;
while($numero < 10){

	echo $numero;
	echo "<br>";
	$numero = $numero + 1;
}
style="background-color: #000; color:#FFF"
<label> 
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$pw = $_POST['pw'];

if($pw == 12345){
echo $nombre. "<br>";
echo $apellido. "<br>";
}
//echo $pw;
*/
echo"Restriccion 1" . "\n";
$X1 = floatval($_POST['x1']);
$X11 = floatval($_POST['x11']);
$recurso1= floatval($_POST['recurso1']);
echo "Si  X1 = 0    => X2= ". $recurso1 / $X11;
echo "Si  X2 = 0    => X2= ". $recurso1 / $X1;

echo"Restriccion 2";
$X2 = floatval($_POST['x2']);
$X22 = floatval($_POST['x22']);
$recurso2= floatval($_POST['recurso2']);
echo "Si  X1 = 0    => X2= ". $recurso2 / $X22;
echo "Si  X2 = 0    => X2= ". $recurso2 / $X2;

echo"Restriccion 3";
$X3 = floatval($_POST['x3']);
$X33 = floatval($_POST['x33']);
$recurso3= floatval($_POST['recurso3']);
echo "Si  X1 = 0    => X2= ". $recurso3 / $X33;
echo "Si  X2 = 0    => X2= ". $recurso3 / $X3;

echo"Restriccion 4";
$X4 = floatval($_POST['x4']);
$X44 = floatval($_POST['x44']);
$recurso4= floatval($_POST['recurso4']);
echo "Si  X1 = 0    => X2= ". $recurso4 / $X44;
echo "Si  X2 = 0    => X2= ". $recurso4 / $X4;

?>


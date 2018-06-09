<!DOCTYPE html PUBLI "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtmll/DTD/xhtmll-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf_8" />
<title>QuickSoft</title>

<body >


	<br>
	<label> METODO GRAFICO <label><br /><br>
	<label>El método gráfico se emplea para resolver problemas que presentan sólo 2
variables de decisión. El procedimiento consiste en trazar las ecuaciones de las
restricciones en un eje de coordenadas X1, X2 para tratar de identificar el área
de soluciones factibles (soluciones que cumplen con todas las restricciones).
La solución óptima del problema se encuentra en uno de los vértices de esta
área de soluciones creada, por lo que se buscará en estos datos el valor
mínimo o máximo del problema.<label><br><br><br><br>

<div>
	<?php

$jornada = floatval($_POST['jornada']);
$diaLaboral = floatval($_POST['diaLaboral']);
$progf = floatval($_POST['progf']);
$progb = floatval($_POST['progb']);
$monto = floatval($_POST['monto']);
$porcentaje = floatval($_POST['porcentaje']);
$precio = floatval($_POST['precio']);
$tiempo = floatval($_POST['tiempo']);
$sueldof = floatval($_POST['sueldof']);
$sueldob = floatval($_POST['sueldob']);
$canthf = floatval($_POST['canthf']);
$canthb = floatval($_POST['canthb']);

$Xf = 2;
$Xb = 3;
$Mf = ((($canthf/8)/30)/$progf);
$Mb = ((($canthb/8)/30)/$progb);
$z = $precio-($Xf*$sueldof*$Mf + $Xb*$sueldob*$Mb);
$montoC = $monto + ($monto*$porcentaje/100);
//Restricciones sin variable Xf y Xb
if( ($precio < $montoC) ){
	echo "El importe a cobrar no cubre el porcentaje minimo de ganacia" . "<br>";
}
if ($Mf > $tiempo){
	echo "La cantidad de programadores Front end no es suficiente para terminar dentro del plazo" . "<br>";
}
if ($Mb > $tiempo){
	echo "La cantidad de programadores Back end no es suficiente para terminar dentro del plazo" . "<br>";
}
//Restricciones con variable Xf y Xb
//Restriccion 1
$indep1 = ($monto / ($sueldof * $tiempo));
$deXf = (($sueldob * $tiempo) / ($sueldof * $tiempo));
//Restriccion 2
$indep2 = ($canthf / ( $jornada * $tiempo * $diaLaboral ));
//Restriccion 3
$indep3 = ($canthb / ( $jornada * $tiempo * $diaLaboral));
//Restriccion 4

//Restriccion 5

	?>
</div>

<script src="https://www.desmos.com/api/v1.0/calculator.js?apiKey=dcb31709b452b1cf9dc26972add0fda6"></script>
<div id="calculator" style="width: 600px; height: 400px;"></div>
<script type="text/javascript">
  /*var vari ="<?php  $X1; ?>";*/
  var elt = document.getElementById('calculator');
  var calculator = Desmos.GraphingCalculator(elt);
  var indep1 = "<?php echo $indep1?>"
  var deXf = "<?php echo $deXf?>"
  var indep2 = "<?php echo $indep2?>"
  var indep3 = "<?php echo $indep3?>"
  var progf = "<?php echo $progf?>"
  var progb = "<?php echo $progb?>"

  //calculator.setExpression({id:'graph1', latex:'y=x^2'});
  //calculator.setExpression({id:'graph2', latex:'y <= x^'+num});
  calculator.setExpression({id:'graph2', latex:'y <= -x*'+deXf +'+'+ indep1});
  calculator.setExpression({id:'graph3', latex:'y >= '+indep2 });
  calculator.setExpression({id:'graph4', latex:'x >= '+indep3});
  calculator.setExpression({id:'graph5', latex:'y <= '+progf});
  calculator.setExpression({id:'graph6', latex:'x <= '+progb});
  calculator.setExpression({id:'graph7', latex:'('+9.37+','+8.85+')'});

</script>

</body>
</html>
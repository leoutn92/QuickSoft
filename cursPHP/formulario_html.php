<!DOCTYPE html PUBLI "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtmll/DTD/xhtmll-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf_8" />
<title>Documento sin titulo</title>

<body >

<form action="Numero_de_restricciones.php" method="post" name="frm">
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

	echo"Restriccion 3";
$X1 = floatval($_POST['x1']);
$X11 = floatval($_POST['x11']);
	echo $X1;
	?>
</div>

<script src="https://www.desmos.com/api/v1.0/calculator.js?apiKey=dcb31709b452b1cf9dc26972add0fda6"></script>
<div id="calculator" style="width: 600px; height: 400px;"></div>
<script type="text/javascript">
  /*var vari ="<?php  $X1; ?>";*/
  var elt = document.getElementById('calculator');
  var calculator = Desmos.GraphingCalculator(elt);
  var num = "<?php echo $X1?>"
  calculator.setExpression({id:'graph1', latex:'y=x^2'});
  calculator.setExpression({id:'graph2', latex:'y=x^'+num});
</script>

<br><br>


<label>Restricciones</label><br>
<input type="text" name="numero">
<input type="submit" value="Aceptar">
</form>


</body>
</html>
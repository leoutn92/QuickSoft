<?php

$fi=fopen("archivo.txt");

fwrite($fi, "Datos:");
fwrite($fi, "  ");
fwrite($fi, $_POST['nombre']);
fwrite($fi, "   ");
fwrite($fi, $_POST['comentario']);
fwrite($fi, "__________");
fclose($fi);
echo "Archivo guardado";
?>
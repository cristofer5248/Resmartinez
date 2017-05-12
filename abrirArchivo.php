 <?php

// Ejemplo aprenderaprogramar.com

// Leemos la primera línea de fichero.txt

// fichero.txt tienen que estar en la misma carpeta que el fichero php

// fichero.txt es un archivo de texto normal creado con notepad, por ejemplo.

$fp = fopen("fichero.txt", "r");

$linea = fgets($fp);

fclose($fp);

echo $linea;

?>
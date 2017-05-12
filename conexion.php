<?php
 $mysqli = new mysqli('localhost','root','','Proyectoads');
            
         if(!$mysqli){
	         printf('No se pudo conectar con la base de datos');
        }else{
             return $mysqli;
	     }
                if (!$mysqli->set_charset("utf8")) {
    printf("Error cargando el conjunto de caracteres utf8: %s\n", $mysqli->error);
    exit();
} else {
    printf("Conjunto de caracteres actual: %s\n", $mysqli->character_set_name());
}
?>

<?php
require_once __DIR__ . '/../config/database.php';

function usuarios_activos()
{
   //permitimos el uso de la variable portadora del numero ip en nuestra funcion
   global $REMOTE_ADDR;

   //asignamos un nombre memotecnico a la variable
   $ip = $_SERVER['REMOTE_ADDR'];
   //$ip = $REMOTE_ADDR;
   //definimos el momento actual
   $ahora = time();

   //conectamos a la base de datos
   //Usad vuestros propios parametros!!
   $conn = conectar();
   

   //actualizamos la tabla
   //borrando los registros de las ip inactivas (24 minutos)
   $limite = $ahora-24*60;
   $statement = $conn->prepare("delete from control_ip where fecha < $limite");
   $statement->execute();
   

   //miramos si el ip del visitante existe en nuestra tabla
   $statement = $conn->prepare("select ip, fecha from control_ip where ip = '$ip'");
   $statement->execute();
   $result = $statement->rowCount();
   

   //si existe actualizamos el campo fecha
   if ($result != 0){ $ssql = "update control_ip set fecha = ".$ahora." where ip = '$ip'";}
   //si no existe insertamos el registro correspondiente a la nueva sesion
   else {$ssql = "insert into control_ip (ip, fecha) values ('$ip', $ahora)";}

   //ejecutamos la sentencia sql
   $statement = $conn->prepare($ssql);
   $statement->execute();

   //calculamos el numero de sesiones
   $ssql = "select ip from control_ip";
   $statement = $conn->prepare($ssql);
   $statement->execute();
   $usuarios = $result = $statement->rowCount();

   //liberamos memoria
   $statement->closeCursor();
   //mysql_free_result($result);

   //devolvemos el resultado
   return $usuarios;
}
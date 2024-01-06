<?php
require "../database/database.php";
//$pdo= new pdo ('mysql:host=localhost;dbname=bdd_auto' , 'root', '');

// comprobar conexión

 

?>

<?php 

 //error_reporting (0);
 
 $action="registro_solicitud.php";
 
        $nombres = $_POST["nombres"];
        $apellidos = $_POST["apellidos"];
        $cedula = $_POST["cedula"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $ingreso = $_POST["ingreso"];
        $direccion = $_POST["direccion"];
        $marca = $_POST["marca"];
        $ano = $_POST["ano"];
        date_default_timezone_set('Europe/Madrid');
        $date = date('Y-m-d H:i:s');
       
$ssql = ("INSERT INTO  tab_solicitud (nombres, apellidos, cedula, email, telefono, ingreso, direccion, marca, ano)
VALUES ('$nombres', '$apellidos', '$cedula', '$email', '$telefono', '$ingreso', '$direccion', '$marca', '$ano");

if ($conn->query($sql) === TRUE) {
  echo "Datos insertados correctamente en la base de datos";
} else {
  echo "Error al insertar datos: " . $conn->error;
}
if($conexion->query($ssql)) {
  echo "<p>Registro insertado con éxito</p>";
} else {
  echo "<p>Hubo un error al ejecutar la sentencia de inserción: {$conexion->error}</p>";
}
$conexion->close();
?>
<p><a href="insertar.php">Volver al formulario</a></p>
<?php

$insertar->bindParam(':nombres', $nombres);
$insertar->bindParam(':apellidos', $apellidos);
$insertar->bindParam(':cedula', $cedula);
$insertar->bindParam(':email', $email);
$insertar->bindParam(':telefono', $telefono);
$insertar->bindParam(':ingreso', $ingreso);
$insertar->bindParam(':direccion', $direccion);
$insertar->bindParam(':marca', $dmarca);
$insertar->bindParam(':ano', $ano);

if ($_POST->execute()){
echo "datos registrado correctamente... ";
}
else{
  echo "no se ha registrado ningun documento... ";
}



// Ejecutamos la sentencia y comprobamos si ha ido bien

?>
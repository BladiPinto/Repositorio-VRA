<?php
include 'config.inc.php';

// Obtener los valores del formulario
$userName = $_POST['userName'];
$password = $_POST['password'];

// Crear una instancia de la clase Conect_MySql
$connection = new Conect_MySql();

// Consultar la base de datos para verificar las credenciales
$query = "SELECT * FROM usuarios WHERE nombre_usuario = '$userName' AND contraseña = '$password'";
$result = $connection->execute($query);

// Comprobar si se encontró un registro con las credenciales proporcionadas
if ($connection->get_num_rows() > 0) {
  $response = array('valid' => true);
} else {
  $response = array('valid' => false);
}

// Enviar la respuesta en formato JSON
header('Content-type: application/json');
echo json_encode($response);

// Cerrar la conexión a la base de datos
$connection->close_db();
?>

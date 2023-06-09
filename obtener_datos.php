<?php
include 'config.inc.php';

// Crear una instancia de la clase Conect_MySql
$connection = new Conect_MySql();

// Consultar la base de datos para obtener los datos de la tabla
$query = "SELECT * FROM tbl_documentos";
$result = $connection->execute($query);

// Construir un array con los datos de la tabla
$data = array();
while ($row = $connection->fetch_row($result)) {
  $data[] = array(
    'titulo' => $row['titulo'],
    'descripcion' => $row['descripcion'],
    'tipo' => $row['tipo_documento'],
    'fecha' => $row['fecha'],
    'archivo' => $row['nombre_archivo']
  );
}

// Enviar los datos en formato JSON
header('Content-type: application/json');
echo json_encode($data);

// Cerrar la conexión a la base de datos
$connection->close_db();
?>

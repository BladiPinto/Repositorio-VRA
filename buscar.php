<?php
include_once 'config.inc.php';

// Obtener los valores de búsqueda del formulario
$nombre = $_GET['nombre'];
$fecha = $_GET['fecha'];
$numero = $_GET['numero'];

// Preparar la consulta SQL con los criterios de búsqueda
$sql = "SELECT * FROM tbl_documentos WHERE 1 = 1";

if (!empty($nombre)) {
    $sql .= " AND titulo LIKE '%$nombre%'";
}

if (!empty($fecha)) {
    $sql .= " AND fecha = '$fecha'";
}

if (!empty($numero)) {
    $sql .= " AND numero = $numero";
}

// Ejecutar la consulta y obtener los resultados
$db = new Conect_MySql();
$query = $db->execute($sql);

// Mostrar los resultados en una tabla
echo '<table>';
echo '<tr>
        <td>titulo</td>
        <td>descripcion</td>
        <td>tipo</td>
        <td>fecha</td>
        <td>archivo</td>
    </tr>';

while ($datos = $db->fetch_row($query)) {
    echo '<tr>
            <td>'.$datos['titulo'].'</td>
            <td>'.$datos['descripcion'].'</td>
            <td>'.$datos['tipo_documento'].'</td>
            <td>'.$datos['fecha'].'</td>
            <td><a href="archivo.php?id='.$datos['id_documento'].'">'.$datos['nombre_archivo'].'</a></td>
        </tr>';
}

echo '</table>';
?>

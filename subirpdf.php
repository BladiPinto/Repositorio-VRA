<?php
include_once 'config.inc.php';
if (isset($_POST['subir'])) {
    $nombre = $_FILES['archivo']['name'];
    $tipo = $_FILES['archivo']['type'];
    $ruta = $_FILES['archivo']['tmp_name'];
    $destino = "archivos/" . $nombre;
    if ($nombre != "") {
        if (copy($ruta, $destino)) {
            $titulo= $_POST['titulo'];
            $descri= $_POST['descripcion'];
            $tipodoc= $_POST['tipo_documento'];
            $fecha=$_POST['fecha_documento'];
            $db=new Conect_MySql();
            $sql = "INSERT INTO tbl_documentos(titulo,descripcion,tipo_documento,tipo,fecha,nombre_archivo) VALUES('$titulo','$descri','$tipodoc','$tipo','$fecha','$nombre')";
            $query = $db->execute($sql);
            if($query){
                echo "<script>window.location.href = 'subirarchivo.html';</script>";

            }
        } else {
            echo '<script>alert("Error al guardar en la base de datos");</script>';
        }
    }
}
?>
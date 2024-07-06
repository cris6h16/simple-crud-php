<?php

$cedula = $_POST['cedula'];
$primer_nombre = $_POST['primer_nombre'];
$segundo_nombre = $_POST['segundo_nombre'];
$primer_apellido = $_POST['primer_apellido'];
$segundo_apellido = $_POST['segundo_apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$genero = $_POST['genero'];
$id = $_POST['id'];

// Validaciones
$errorMsg = array();
if (empty($cedula)) array_push($errorMsg, "cedula_vacia");
if (empty($primer_nombre)) array_push($errorMsg, "primer_nombre_vacio");
if (empty($segundo_nombre)) array_push($errorMsg, "segundo_nombre_vacio");
if (empty($primer_apellido)) array_push($errorMsg, "primer_apellido_vacio");
if (empty($segundo_apellido)) array_push($errorMsg, "segundo_apellido_vacio");
if (empty($telefono)) array_push($errorMsg, "telefono_vacio");
if (empty($correo)) array_push($errorMsg, "correo_vacio");
if (empty($fecha_nacimiento)) array_push($errorMsg, "nacimiento_vacia");
if (empty($genero)) array_push($errorMsg, "genero_vacio");

if (count($errorMsg) > 0) {
    header('Location: index.php?error=' . urlencode(implode(',', $errorMsg)));
    exit();
}


$sql = "
INSERT INTO persona (
         cedula, 
         primer_nombre, 
         sergundo_nombre,
         primer_apellido, 
         segundo_apellido,
         correo, 
         telefono, 
         fecha_nacimiento, 
         genero
     ) 
VALUES (
        '$cedula',
        '$primer_nombre',
        '$segundo_nombre',
        '$primer_apellido',
        '$segundo_apellido',
        '$correo',
        '$telefono',
        '$fecha_nacimiento',
        '$genero'
    )
";

$conexion = new mysqli('localhost', 'root', '', 'crud_cristian_herrera');
$ejecutado = $conexion->query($sql);
$conexion->close();

if ($ejecutado) {
    header('Location: index.php?mensaje=' . urlencode('Registro guardado correctamente'));
} else {
    header('Location: index.php?error=' . urlencode('Error al guardar el registro'));
}
?>






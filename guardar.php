<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Recibe los datos del formulario y los sanitiza
$cedula = filter_var($_POST['cedula'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$primer_nombre = filter_var($_POST['primer_nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$segundo_nombre = filter_var($_POST['segundo_nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$primer_apellido = filter_var($_POST['primer_apellido'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$segundo_apellido = filter_var($_POST['segundo_apellido'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
$telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$fecha_nacimiento = filter_var($_POST['fecha_nacimiento'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$genero = filter_var($_POST['genero'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// valdia si los campos estan vacios
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
    header(
        'Location: index.php?error=' . urlencode(implode(',', $errorMsg))
        . '&cedula=' . urlencode($cedula)
        . '&primer_nombre=' . urlencode($primer_nombre)
        . '&segundo_nombre=' . urlencode($segundo_nombre)
        . '&primer_apellido=' . urlencode($primer_apellido)
        . '&segundo_apellido=' . urlencode($segundo_apellido)
        . '&correo=' . urlencode($correo)
        . '&telefono=' . urlencode($telefono)
        . '&fecha_nacimiento=' . urlencode($fecha_nacimiento)
        . '&genero=' . urlencode($genero)
    );
    exit();
}

try {
    $conexion = new mysqli('localhost', 'root', '', 'crud_cristian_herrera');

    $stmt = $conexion->prepare("
        INSERT INTO personas (
            cedula, primer_nombre, segundo_nombre, primer_apellido,
            segundo_apellido, correo, telefono, fecha_nacimiento, genero
        )
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");

//    s -> string
    $stmt->bind_param("sssssssss", $cedula, $primer_nombre, $segundo_nombre, $primer_apellido,
        $segundo_apellido, $correo, $telefono, $fecha_nacimiento, $genero);

    $ejecutado = $stmt->execute();

    $msg = ($ejecutado) ? 'Registro guardado correctamente' : 'Error al guardar el registro';
    header('Location: index.php?mensaje=' . urlencode($msg));

} catch (Exception $e) {
    header('Location: index.php?mensaje=' . urlencode($e->getMessage())
        . '&cedula=' . urlencode($cedula)
        . '&primer_nombre=' . urlencode($primer_nombre)
        . '&segundo_nombre=' . urlencode($segundo_nombre)
        . '&primer_apellido=' . urlencode($primer_apellido)
        . '&segundo_apellido=' . urlencode($segundo_apellido)
        . '&correo=' . urlencode($correo)
        . '&telefono=' . urlencode($telefono)
        . '&fecha_nacimiento=' . urlencode($fecha_nacimiento)
        . '&genero=' . urlencode($genero)
    );

} finally {
    $conexion->close();
}
?>
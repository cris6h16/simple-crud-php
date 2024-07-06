<?php
$id =  filter_var($_POST['id'], FILTER_SANITIZE_STRING);

if (empty($id)) {
    header('Location: index.php?error=' . urlencode('id_vacio'));
    exit();
}

try {
    $conexion = new mysqli('localhost', 'root', '', 'crud_cristian_herrera');

    $stmt = $conexion->prepare("DELETE FROM personas WHERE id = ?");
    $stmt->bind_param("i", $id);

    $ejecutado = $stmt->execute();

    $msg = $ejecutado ? "Registro eliminado correctamente" : 'Error al eliminar el registro';

    header('Location: index.php?mensaje=' . urlencode($msg ));

} catch (Exception $e) {
    header('Location: index.php?mensaje=' . urlencode($e->getMessage()));
} finally {
    $conexion->close();
}
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


try {
    $conexion = new mysqli('localhost', 'root', '', 'crud_cristian_herrera');

    $sql = "SELECT id, cedula, primer_nombre, primer_apellido, correo, fecha_nacimiento FROM personas";
    $resultado = $conexion->query($sql);

    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";

        echo "<td>" . htmlspecialchars($fila['id']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['cedula']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['primer_nombre']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['primer_apellido']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['correo']) . "</td>";
        echo "<td>" . htmlspecialchars($fila['fecha_nacimiento']) . "</td>";

        echo "</tr>";
    }
} catch (Exception $e) {
    error_log('Error al ejecutar SQL: ' . $e->getMessage());
    header('Location: index.php?mensaje=' . urlencode($e->getMessage()));
} finally {
    $conexion->close();
}
?>
<?PHP
$conexion = new mysqli('localhost', 'root', '', 'crud_cristian_herrera');
$sql = "SELECT * FROM persona";
$resultado = $conexion->query($sql);
$conexion->close();

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>";

    echo "<td>" . $fila['id'] . "</td>";
    echo "<td>" . $fila['cedula'] . "</td>";
    echo "<td>" . $fila['primer_nombre'] . "</td>";
    echo "<td>" . $fila['primer_apellido'] . "</td>";
    echo "<td>" . $fila['correo'] . "</td>";
    echo "<td>" . $fila['fecha_nacimiento'] . "</td>";

    echo "</tr>";
}

?>
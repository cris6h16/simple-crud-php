<table class="table table-dark table-hover clickable-table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">CEDULA</th>
        <th scope="col">PRIMER NOMBRE</th>
        <th scope="col">SEGUNDO NOMBRE</th>
        <th scope="col">PRIMER APELLIDO</th>
        <th scope="col">SEGUNDO APELLIDO</th>
        <th scope="col">CORREO</th>
        <th scope="col">TELEFONO</th>
        <th scope="col">FECHA NACIMIENTO</th>
        <th scope="col">GENERO</th>
    </tr>
    </thead>
    <tbody>

    <?php

    try {
        $conexion = new mysqli('localhost', 'root', '', 'crud_cristian_herrera');

        $sql = "SELECT * FROM personas";
        $resultado = $conexion->query($sql);

        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";

            echo "<td>" . htmlspecialchars($fila['id']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['cedula']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['primer_nombre']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['segundo_nombre']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['primer_apellido']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['segundo_apellido']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['correo']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['telefono']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['fecha_nacimiento']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['genero']) . "</td>";

            echo "</tr>";
        }
    } catch (Exception $e) {
        error_log('Error al ejecutar SQL: ' . $e->getMessage());
        header('Location: index.php?mensaje=' . urlencode($e->getMessage()));
    } finally {
        $conexion->close();
    }
    ?>
    </tbody>
</table>

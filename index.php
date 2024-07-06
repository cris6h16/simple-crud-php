<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro de usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #212529;
            color: #d9d9d9;
        }

        .header-titulo {
            font-weight: bold;
            background-color: #004639;
            color: #d9d9d9;
        }

        .form-control, .form-select, .form-control:disabled {
            background-color: #343a40;
            border-color: #495057;
            color: #d9d9d9;
        }

        .form-control:focus, .form-select:focus {
            background-color: #495057;
            border-color: #495057;
            color: #d9d9d9;
        }

        .btn-primary {
            background-color: #004639;
            border-color: #004639;
        }

        .btn:hover {
            border-color: #000000;
        }

        .bg-my-black {
            background-color: #1c1c1c;
        }

        .clickable-table:hover {
            cursor: pointer;
        }

    </style>
</head>
<body>
<!--
if ($ejecutado) {
    header('Location: index.php?mensaje=' . urlencode('Registro guardado correctamente'));
} else {
    header('Location: index.php?error=' . urlencode('Error al guardar el registro'));
} -->
<?php

if (isset($_GET['mensaje'])) {
    $mdl =
        "
        <div class='modal fade  text-white' id='modal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
          <div class='modal-dialog '>
            <div class='modal-content bg-dark'>
              <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>MENSAJE</h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
              </div>
              <div class='modal-body text-center'>
                <p>" . $_GET['mensaje'] . "</p>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cerrar</button>
                </div>
            </div>
            </div>
        </div>
    ";

    echo $mdl;
}

?>


<div class="container bg-my-black p-5  mt-5 rounded">

    <section class="s1">
        <h4 class="text-center header-titulo p-5 mb-5 rounded">REGISTRO DE PERSONA</h4>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula"
                               value="<?php echo isset($_GET['cedula']) ? $_GET['cedula'] : '' ?>">
                        <?php
                        // isset -> verifica si la variable es Not Null
                        // strpos -> verifica si la cadena contiene la subcadena
                        if (isset($_GET['error']) && strpos($_GET['error'], 'cedula_vacia') !== false) {
                            echo '<p class="text-danger">La cédula no puede estar vacía</p>';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="input_primer_nombre" class="form-label">Primer Nombre</label>
                        <input type="text" class="form-control" id="input_primer_nombre" name="primer_nombre"
                               value="<?php echo isset($_GET['primer_nombre']) ? $_GET['primer_nombre'] : '' ?>"
                        >
                        <?php
                        if (isset($_GET['error']) && strpos($_GET['error'], 'primer_nombre_vacio') !== false) {
                            echo '<p class="text-danger">El primer nombre no puede estar vacío</p>';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="input_segundo_nombre" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" id="input_segundo_nombre" name="segundo_nombre"
                               value="<?php echo isset($_GET['segundo_nombre']) ? $_GET['segundo_nombre'] : '' ?>"
                        >
                        <?php
                        if (isset($_GET['error']) && strpos($_GET['error'], 'segundo_nombre_vacio') !== false) {
                            echo '<p class="text-danger">El segundo nombre no puede estar vacío</p>';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="input_primer_apellido" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control" id="input_primer_apellido" name="primer_apellido"
                               value="<?php echo isset($_GET['primer_apellido']) ? $_GET['primer_apellido'] : '' ?>"
                        >
                        <?php
                        if (isset($_GET['error']) && strpos($_GET['error'], 'primer_apellido_vacio') !== false) {
                            echo '<p class="text-danger">El primer apellido no puede estar vacío</p>';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="input_segundo_apellido" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" id="input_segundo_apellido" name="segundo_apellido"
                               value="<?php echo isset($_GET['segundo_apellido']) ? $_GET['segundo_apellido'] : '' ?>"
                        >
                        <?php
                        if (isset($_GET['error']) && strpos($_GET['error'], 'segundo_apellido_vacio') !== false) {
                            echo '<p class="text-danger">El segundo apellido no puede estar vacío</p>';
                        }
                        ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo"
                               value="<?php echo isset($_GET['correo']) ? $_GET['correo'] : '' ?>"
                        >
                        <?php
                        if (isset($_GET['error']) && strpos($_GET['error'], 'correo_vacio') !== false) {
                            echo '<p class="text-danger">El correo no puede estar vacío</p>';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono"
                               value="<?php echo isset($_GET['telefono']) ? $_GET['telefono'] : '' ?>"
                        >
                        <?php
                        if (isset($_GET['error']) && strpos($_GET['error'], 'telefono_vacio') !== false) {
                            echo '<p class="text-danger">El teléfono no puede estar vacío</p>';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="input_nacimiento" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="input_nacimiento" name="fecha_nacimiento"
                               value="<?php echo isset($_GET['fecha_nacimiento']) ? $_GET['fecha_nacimiento'] : '' ?>"
                        >
                        <?php
                        if (isset($_GET['error']) && strpos($_GET['error'], 'nacimiento_vacia') !== false) {
                            echo '<p class="text-danger">La fecha de nacimiento no puede estar vacía</p>';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="genero" class="form-label">Género</label>
                        <select class="form-select" id="genero" name="genero"
                                value="<?php echo isset($_GET['genero']) ? $_GET['genero'] : '' ?>"
                        >
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                        <?php
                        if (isset($_GET['error']) && strpos($_GET['error'], 'genero_vacio') !== false) {
                            echo '<p class="text-danger">El género no puede estar vacío</p>';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input class="form-control" id="id" type="text" name="id" readonly
                               value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
                        <?php
                        if (isset($_GET['error']) && strpos($_GET['error'], 'id_vacio') !== false) {
                            echo '<p class="text-danger">El id no puede estar vacío</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>


            <div class="row mt-3">
                <span class="col-4 col-sm-4 col-md-5 col-lg-5">
                    <button type="button" class="btn btn-warning mb-2"
                            onclick="formOperacion('actualizar')">Actualizar</button>
                    <button type="button" class="btn btn-danger mb-2"
                            onclick="formOperacion('eliminar')">Eliminar</button>
                </span>
                <span class="col-4 col-sm-4 col-md-2 col-lg-2">
                    <button type="button" class="btn btn-info mb-2 " onclick="datosDePrueba()">Datos de prueba</button>
                </span>
                <span class="col-4 col-sm-4 col-md-5 col-lg-5 text-end">
                    <button type="button" class="btn btn-primary mb-2"
                            onclick="formOperacion('registro')">Registrar</button>
                    <button type="button" class="btn btn-secondary mb-2" onclick="limpiarForm()">Limpiar</button>
                </span>
            </div>
        </form>
    </section>

    <section class="s2 mt-5 table-responsive">
        <?PHP include 'fracmentos/tabla.php'; ?>
    </section>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script>
    function formOperacion(operacion) {
        if (operacion === 'eliminar') document.forms[0].action = 'eliminar.php';
        else if (operacion === 'registro') document.forms[0].action = 'guardar.php';
        else document.forms[0].action = 'actualizar.php';

        document.forms[0].submit();
    }

    function limpiarForm() {
        document.getElementById('cedula').value = '';
        document.getElementById('input_primer_nombre').value = '';
        document.getElementById('input_segundo_nombre').value = '';
        document.getElementById('input_primer_apellido').value = '';
        document.getElementById('input_segundo_apellido').value = '';
        document.getElementById('correo').value = '';
        document.getElementById('telefono').value = '';
        document.getElementById('genero').value = 'M';
        document.getElementById('id').value = '-1';
        document.getElementById('input_nacimiento').value = '';
    }

    function datosDePrueba() {
        document.getElementById('cedula').value = '1550212742';
        document.getElementById('input_primer_nombre').value = 'Cristian';
        document.getElementById('input_segundo_nombre').value = 'Manuel';
        document.getElementById('input_primer_apellido').value = 'Herrera';
        document.getElementById('input_segundo_apellido').value = 'Guallo';
        document.getElementById('correo').value = 'cristianmherrera21@gmail.com';
        document.getElementById('telefono').value = '0960279073';
        document.getElementById('genero').value = 'M';
        document.getElementById('id').value = '-1';


        const hoy = new Date();
        const ano = hoy.getFullYear();
        const mes = hoy.getMonth() + 1;
        const dia = hoy.getDate();
        const fechaEnString = `${ano}-${mes < 10 ? '0' + mes : mes}-${dia < 10 ? '0' + dia : dia}`;
        document.getElementById('input_nacimiento').value = fechaEnString;
    }


    // mostrar modal si existe
    document.addEventListener('DOMContentLoaded', (event) => {
        if (document.getElementById('modal')) {
            var myModal = new bootstrap.Modal(document.getElementById('modal'), {});
            myModal.show();
        }
    });


    // clickable-table
    document.addEventListener('DOMContentLoaded', (event) => { // tipo de evento, función a ejecutar
        const table = document.querySelector('.clickable-table');
        table.addEventListener('click', (event) => {
            const fila = event.target.parentElement;
            const celdas = fila.children;
            document.getElementById('cedula').value = celdas[1].innerText;
            document.getElementById('input_primer_nombre').value = celdas[2].innerText;
            document.getElementById('input_segundo_nombre').value = celdas[3].innerText;
            document.getElementById('input_primer_apellido').value = celdas[4].innerText;
            document.getElementById('input_segundo_apellido').value = celdas[5].innerText;
            document.getElementById('correo').value = celdas[6].innerText;
            document.getElementById('telefono').value = celdas[7].innerText;
            document.getElementById('input_nacimiento').value = celdas[8].innerText;
            document.getElementById('genero').value = celdas[9].innerText;
            document.getElementById('id').value = celdas[0].innerText;
        });
    });
</script>
</body>
</html>

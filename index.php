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


    </style>
</head>
<body>
<div class="container bg-my-black p-5  mt-5 rounded">

    <section class="s1">
        <h4 class="text-center header-titulo p-5 mb-5 rounded">REGISTRO DE PERSONA</h4>
        <form action="" method="">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="cedula" class="form-label">Cédula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula">
                        <?php
                        // isset -> verifica si la variable es Not Null
                        // strpos -> verifica si la cadena contiene la subcadena
                        if (isset($_GET['error']) && strpos($_GET['error'], 'cedula_vacia') !== false) {
                            echo '<p class="text-danger">La cédula no puede estar vacía</p>';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="primerNombre" class="form-label">Primer Nombre</label>
                        <input type="text" class="form-control" id="primerNombre" name="primerNombre">
                        <?php
                        if (isset($_GET['error']) && strpos($_GET['error'], 'primer_nombre_vacio') !== false) {
                            echo '<p class="text-danger">El primer nombre no puede estar vacío</p>';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="segundoNombre" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" id="segundoNombre" name="segundoNombre">
                        <?php
                        if (isset($_GET['error']) && strpos($_GET['error'], 'segundo_nombre_vacio') !== false) {
                            echo '<p class="text-danger">El segundo nombre no puede estar vacío</p>';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="primerApellido" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control" id="primerApellido" name="primerApellido">
                        <?php
                        if (isset($_GET['error']) && strpos($_GET['error'], 'primer_apellido_vacio') !== false) {
                            echo '<p class="text-danger">El primer apellido no puede estar vacío</p>';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="segundoApellido" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" id="segundoApellido" name="segundoApellido">
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
                        <input type="email" class="form-control" id="correo" name="correo">
                        <?php
                        if (isset($_GET['error']) && strpos($_GET['error'], 'correo_vacio') !== false) {
                            echo '<p class="text-danger">El correo no puede estar vacío</p>';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono">
                        <?php
                        if (isset($_GET['error']) && strpos($_GET['error'], 'telefono_vacio') !== false) {
                            echo '<p class="text-danger">El teléfono no puede estar vacío</p>';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="nacimiento" class="form-label">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="nacimiento" name="nacimiento">
                        <?php
                        if (isset($_GET['error']) && strpos($_GET['error'], 'nacimiento_vacia') !== false) {
                            echo '<p class="text-danger">La fecha de nacimiento no puede estar vacía</p>';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="genero" class="form-label">Género</label>
                        <select class="form-select" id="genero" name="genero">
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
                        <input class="form-control" id="id" type="text" disabled readonly value="-1">
                    </div>
                </div>
            </div>


            <div class="row mt-3">
                <span class="col-5">
                    <button type="button" class="btn btn-warning mb-2"
                            onclick="formOperacion('actualizar')">Actualizar</button>
                    <button type="button" class="btn btn-danger mb-2"
                            onclick="formOperacion('eliminar')">Eliminar</button>
                </span>
                <span class="col-2 text-center">
                    <button type="button" class="btn btn-info mb-2 " onclick="datosDePrueba()">Datos de prueba</button>
                </span>
                <span class="col-5 text-end">
                    <button type="button" class="btn btn-primary mb-2"
                            onclick="formOperacion('registro')">Registrar</button>
                    <button type="reset" class="btn btn-secondary mb-2">Limpiar</button>
                </span>
            </div>
        </form>
    </section>

    <section class="s2 mt-5 container">
        <table class="table table-dark table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">CEDULA</th>
                <th scope="col">PRIMER NOMBRE</th>
                <th scope="col">PRIMER APELLIDO</th>
                <th scope="col">CORREO</th>
                <th scope="col">FECHA DE NACIMIENTO</th>
            </tr>
            <!--            --><?PHP //include 'imprimir_filas_usuarios.php'; ?>
            </thead>
            <tbody>
            <!-- Each row represents a user. The data should be filled dynamically -->

            <!-- More rows... -->
            </tbody>
        </table>
    </section>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<script>
    function formOperacion(operacion) {
        if (operacion === 'eliminar') {
            document.forms[0].action = 'eliminar.php';
            document.forms[0].method = 'delete';
        } else if (operacion === 'registro') {
            document.forms[0].action = 'guardar.php';
            document.forms[0].method = 'post';
        } else {
            document.forms[0].action = 'actualizar.php';
            document.forms[0].method = 'put';
        }
        document.forms[0].submit();
    }

    function datosDePrueba() {
        document.getElementById('cedula').value = '1550212508';
        document.getElementById('primerNombre').value = 'Cristian';
        document.getElementById('segundoNombre').value = 'Manuel';
        document.getElementById('primerApellido').value = 'Herrera';
        document.getElementById('segundoApellido').value = 'Guallo';
        document.getElementById('correo').value = 'cristianmherrera21@gmail.com';
        document.getElementById('telefono').value = '0960279073';
        document.getElementById('genero').value = 'M';
        document.getElementById('id').value = '-1';


        // llenar fecha de nacimiento con la fecha actual
        const hoy = new Date();
        const ano = hoy.getFullYear();
        const mes = hoy.getMonth() + 1;
        const dia = hoy.getDate();
        const fechaEnString = `${ano}-${mes < 10 ? '0' + mes : mes}-${dia < 10 ? '0' + dia : dia}`;
        document.getElementById('nacimiento').value = fechaEnString;
    }
</script>
</body>
</html>

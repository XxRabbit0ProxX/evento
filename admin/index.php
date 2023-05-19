<?php require_once("../php/guard.php"); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/jquery.dataTables.css">
</head>

<body>
    <?php $_SESSION['rol']; ?>
    <!-- NavBar -->
    <?php include_once("../components/navbar.php"); ?>

    <!-- Tabla -->
    <div class="container mt-5 mb-5 bg-white rounded p-2">
        <div class="row">
            <div class="col-12">
                <table id="myTable" class='dtVisitantes table table-light table-striped display'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Completo</th>
                            <th>Email</th>
                            <th>Telefono</th>
                            <th>Fecha de nacimiento</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Actualizar-->
    <div class="modal fade" id="editarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar visitante</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmUpdate">
                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="hidden" name="id" id="id">
                                    <input id="nombre" name="nombre" type="text" class="form-control"
                                        placeholder="nombre">
                                    <label for="nombre" class="form-label"><i class="fa-solid fa-circle-user"></i>
                                        Nombre:</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input id="apellidos" name="apellidos" type="text" class="form-control"
                                        placeholder="apellidos">
                                    <label for="apellidos" class="form-label"><i class="fa-solid fa-circle-user"></i>
                                        Apellidos:</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="form-floating">
                                    <input id="telefono" name="telefono" type="number" class="form-control"
                                        placeholder="telefono">
                                    <label for="telefono" class="form-label"><i class="fa-solid fa-phone"></i>
                                        Telefono:</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input id="fecha" name="fecha" type="date" class="form-control"
                                        placeholder="fecha nacimiento">
                                    <label for="fecha" class="form-label"><i class="fa-solid fa-cake-candles"></i> Fecha
                                        de
                                        nacimiento:</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input id="email" name="email" type="email" class="form-control"
                                        placeholder="name@example.com">
                                    <label for="email" class="form-label"><i class="fa-solid fa-at"></i> Email:</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="form-floating">
                                    <input id="contrasena" name="contrasena" type="password" class="form-control"
                                        placeholder="pass">
                                    <label for="contrasena" class="form-label"><i class="fa-solid fa-lock"></i>
                                        Contraseña:</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-12">
                                <div class="form-floating">
                                    <select id="categoria" name="categoria" class="form-select"
                                        aria-label="Disabled select example">
                                        <option disabled selected>Categoria...</option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="General">General</option>
                                    </select>
                                    <label for="categoria" class="form-label"><i class="fa-solid fa-lock"></i>
                                        Categoria:</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-12">
                                <div id="mensajeu" class="mensajeu">

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input form="frmUpdate" type="submit" value="Guardar" data-bs-dismiss="modal"
                        class="btn btn-primary" id="btnUpdate">
                </div>
            </div>
        </div>
    </div>

    <div id="confirmar" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar...</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Seguro que deseas eliminar el visitante?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/jquery-3.7.0.js"></script>
    <script src="../js/jquery.validate.js"></script>
    <script src="../js/jquery.dataTables.js"></script>
    <script src="https://kit.fontawesome.com/acd1cc9c1a.js" crossorigin="anonymous"></script>
    <script src="../js/login.js"></script>
    <script src="admin.js"></script>
    <script>
        /* function borrar(id) {
            
            alert("HOLA");
        } */
    </script>
</body>

</html>
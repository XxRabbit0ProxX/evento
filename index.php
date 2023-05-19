<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evento</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <!-- Este es el navbar -->
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fa-regular fa-calendar fa-flip fa-xl"></i> Evento</a>
        </div>
    </nav>

    <!-- Este es el card del login -->
    <div id="containerLogin" class="container mt-5" style="width: 30rem;">

        <div class="row">
            <div class="card">
                <h1 class="card-header text-center">
                    <i class="fa-solid fa-user fa-xl"></i><br>
                    <p>LOGIN</p>
                </h1>
                <form id="frmLogin" class="card-body container">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <div class="form-floating">
                                <input id="email" name="email" type="email" class="form-control"
                                    placeholder="name@example.com">
                                <label for="email" class="form-label"><i class="fa-solid fa-at"></i> Email:</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-2">
                            <div class="form-floating">
                                <input id="contrasena" name="contrasena" type="password" class="form-control"
                                    placeholder="password">
                                <label for="contrasena" class="form-label"><i class="fa-solid fa-lock"></i> Password:</label>
                            </div>
                        </div>
                    </div>

                    <!-- Estos son los botones -->
                    <div class="row">
                        <div class="col-5 text-center">
                            <div id="btnRegistrarse" class="btn btn-primary">Registrarse</div>
                        </div>

                        <div class="col-5 text-center offset-2">
                            <input type="submit" value="Acceder" class="btn btn-primary" id="btnAcceder">
                        </div>
                    </div>
                </form>
                <div id="mensajel" class="mensajel">

                </div>
            </div>
        </div>
    </div>

    <!-- Este es el card de registro -->
    <div id="containerRegistro" class="container mt-3" style="width: 36rem;">
        <div class="row">
            <div class="card">
                <h1 class="card-header text-center">
                    <i class="fa-solid fa-user fa-xl"></i><br>
                    <p>Registro</p>
                </h1>
                <form id="frmRegistro" class="card-body container">
                    <div class="row mb-2">
                        <div class="col-6">
                            <div class="form-floating">
                                <input id="nombre" name="nombre" type="text" class="form-control" placeholder="nombre">
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
                                <label for="fecha" class="form-label"><i class="fa-solid fa-cake-candles"></i> Fecha de
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
                        <div class="col-6">
                            <div class="form-floating">
                                <input id="contrasena" name="contrasena" type="password" class="form-control"
                                    placeholder="pass">
                                <label for="contrasena" class="form-label"><i class="fa-solid fa-lock"></i>
                                    Contraseña:</label>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-floating">
                                <input id="confPass" name="confPass" type="password" class="form-control"
                                    placeholder="pass">
                                <label for="confPass" class="form-label"><i class="fa-solid fa-lock"></i> Confirmar
                                    contraseña:</label>
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

                    <!-- Estos son los botones -->
                    <div class="row mb-5">
                        <div class="col-5 text-center">
                            <div id="btnLog" class="btn btn-primary">Iniciar Sesión</div>
                        </div>

                        <div class="col-5 text-center offset-2">
                            <input type="submit" value="Registrar" class="btn btn-primary" id="btnReg">
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12">
                            <div id="mensajer" class="mensajer">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery-3.7.0.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="https://kit.fontawesome.com/acd1cc9c1a.js" crossorigin="anonymous"></script>
    <script src="js/login.js"></script>
</body>

</html>
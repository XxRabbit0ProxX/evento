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
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.bundle.js"></script>
    <script src="../js/jquery-3.7.0.js"></script>
    <script src="../js/jquery.validate.js"></script>
    <script src="../js/jquery.dataTables.js"></script>
    <script src="https://kit.fontawesome.com/acd1cc9c1a.js" crossorigin="anonymous"></script>
    <script src="../js/login.js"></script>
    <script src="general.js"></script>
</body>

</html>
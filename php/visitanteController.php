<?php

require_once("cn.php");

// Tipo de solicitud
$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo) {
    case 'POST':
        
        if (!isset($_REQUEST['nombre']) || !isset($_REQUEST['apellidos']) || !isset($_REQUEST['email']) || !isset($_REQUEST['telefono']) || !isset($_REQUEST['fecha']) || !isset($_REQUEST['categoria']) || !isset($_REQUEST['contrasena'])) {
            
            die(json_encode(
                [
                    'status' => '503',
                    'message' => 'No contiene los datos',
                    'value' => $_REQUEST
                ]
            ));
        }

        // Datos enviados
        $nom = $_POST['nombre'];
        $ape = $_POST['apellidos'];
        $ema = $_POST['email'];
        $tel = $_POST['telefono'];
        $fec = $_POST['fecha'];
        $cat = $_POST['categoria'];
        $pas = $_POST['contrasena'];

        // En caso de no recibir id se inserta por el contrario se actualiza
        if (!isset($_POST['id'])) {// INSERT
            
            $sentencia = "INSERT INTO visitante(nombre, apellidos, email, telefono, fecha_nacimiento, categoria, contrasena) VALUES('$nom', '$ape', '$ema', '$tel', '$fec', '$cat', '$pas')";

            if (mysqli_query($cn, $sentencia)) {// Se ingresa
                
                echo json_encode([
                    'message' => 'Se ingreso correctamente',
                    'value' => $nom . ' ' . $ape,
                    'status' => '201'
                ]);
            }else {// No se ingresa
                
                echo json_encode([
                    'message' => 'No se ingresaron los datos',
                    'status' => '500'
                ]);
            }
        }else {// UPDATE

            // ID recibido
            $id = $_POST['id'];
            
            $sentencia = "UPDATE visitante SET nombre = '$nom', apellidos = '$ape', email = '$ema', telefono = '$tel', fecha_nacimiento = '$fec', categoria = '$cat', contrasena = '$pas' WHERE id_visitante = $id";

            if (mysqli_query($cn, $sentencia)) {// Se actualiza
                
                echo json_encode([
                    'message' => 'Se actualizo correctamente',
                    'value' => $nom . ' ' . $ape,
                    'status' => '200'
                ]);
            }else {// No se actualiza
                
                echo json_encode([
                    'message' => 'No se actualizaron los datos',
                    'status' => '400'
                ]);
            }
        }
        break;

    case 'GET':
        
        if (!isset($_GET['id']) && !isset($_GET['delete'])) {
            
            $sentencia = "SELECT id_visitante, nombre, apellidos, email, telefono, fecha_nacimiento, categoria, contrasena FROM visitante";

            $result = mysqli_query($cn, $sentencia);
            session_start();
            while ($tupla = mysqli_fetch_array($result)) {

                $id = $tupla['id_visitante'];
                $nombre = $tupla['nombre'];
                $apellidos = $tupla['apellidos'];
                $email = $tupla['email'];
                $telefono = $tupla['telefono'];
                $fecha = $tupla['fecha_nacimiento'];
                $categoria = $tupla['categoria'];
                $contrasena = $tupla['contrasena'];

                if ($_SESSION['rol'] == "General") {
                    
                    echo "<tr id='$id'>".
                    "<td>$id</td>".
                    "<td>$nombre $apellidos</td>".
                    "<td>$email</td>".
                    "<td>$telefono</td>".
                    "<td>$fecha</td>".
                    "<td>$categoria</td>".
                    "</tr>";
                }else if ($_SESSION['rol'] == "Administrador") {
                    
                    echo "<tr id='$id'>".
                    "<td>$id</td>".
                    "<td>$nombre $apellidos</td>".
                    "<td>$email</td>".
                    "<td>$telefono</td>".
                    "<td>$fecha</td>".
                    "<td>$categoria</td>".
                    "<td>".
                    "<button onclick='editar($id)' type='button' class='btn editar btn-xs' data-bs-toggle='modal' data-bs-target='#editarModal'><i class='fa-solid fa-pen-to-square'></i></button>".
                    "<div class='btn borrar btn-xs' data-id='$id'  onclick='borrar($id)' data-bs-toggle='modal' data-bs-target='#confirmar'><i class='fa-solid fa-eraser'></i></div>".
                    "</td>".
                    "</tr>";
                }
                
            }
        } else if(!isset($_GET['delete'])) {
            
            $id = $_GET['id'];

            $sentencia = "SELECT id_visitante, nombre, apellidos, email, telefono, fecha_nacimiento, categoria, contrasena FROM visitante WHERE id_visitante = $id";

            $result = mysqli_query($cn, $sentencia);

            if ($tupla = mysqli_fetch_array($result)) {
                
                $id = $tupla['id_visitante'];
                $nombre = $tupla['nombre'];
                $apellidos = $tupla['apellidos'];
                $email = $tupla['email'];
                $telefono = $tupla['telefono'];
                $fecha = $tupla['fecha_nacimiento'];
                $categoria = $tupla['categoria'];
                $contrasena = $tupla['contrasena'];

                echo json_encode([

                    'id' => $id,
                    'nombre' => $nombre,
                    'apellidos' => $apellidos,
                    'email' => $email,
                    'telefono' => $telefono,
                    'fecha' => $fecha,
                    'categoria' => $categoria,
                    'contrasena' => $contrasena
                ]);
            }
        } else {

            if (!isset($_GET['id'])) {
            
                die(json_encode(
                    [
                        'message' => 'Faltan datos',
                        'status' => '503'
                    ]
                ));
            }
    
            $id = $_GET['id'];
    
            $sentencia = "DELETE FROM visitante WHERE id_visitante = $id";
    
            $result = mysqli_query($cn, $sentencia);
    
            if (mysqli_affected_rows($cn) > 0) {
    
                echo json_encode([
    
                    'message' => 'Se elimino correctamente',
                    'value' => "$id"
                ]);
            } else {
                echo json_encode([
                    'message' => 'No se encontró el puesto a eliminar'
                ]);
            }
        }
        break;
    
    case 'DELETE':
        
        /* if (!isset($_GET['id'])) {
            
            die(json_encode(
                [
                    'message' => 'Faltan datos',
                    'status' => '503'
                ]
            ));
        }

        $id = $_REQUEST['id'];

        $sentencia = "DELETE FROM visitante WHERE id_visitante = $id";

        $result = mysqli_query($cn, $sentencia);

        if (mysqli_affected_rows($cn) > 0) {

            echo json_encode([

                'message' => 'Se elimino correctamente',
                'value' => "$id"
            ]);
        } else {
            echo json_encode([
                'message' => 'No se encontró el puesto a eliminar'
            ]);
        }
        break; */
    default:
        # code...
        break;
}

?>
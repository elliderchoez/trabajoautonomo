<?php
session_start();
include 'php/conexion.php';

if (!isset($_SESSION['usuario'])) {
    echo '
            <script>
                alert("Porfavor iniciar sesion");
                window.location = "inicio-sesion.php";
            </script>
        ';
    session_destroy();
    die();
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generacion tarjeta/busqueda vehiculo</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <img class="imagen1" src="imagenes/imagen1.png">

    <header>
        <div class="usuarioo">
            <div class="header-usuario">
                <a href="bienvenido_usuario.php">
                    <button class="botones-usuario">Inicio</button>
                </a>
                <a href="Generacion_tarjeta.php">
                    <button class="botones-usuario">Generacion de tarjeta/busqueda vehiculo</button>
                </a>
                <a href="Notificaciones.php">
                    <button class="botones-usuario">Notificaciones</button>
                </a>
                <a href="contacto.php">
                    <button class="botones-usuario">Contacto</button>
                </a>
                <a href="php/cerrar_sesion.php">
                    <button class="botones-usuario">Cerrar sesion</button>
                </a>
            </div>
        </div>
    </header>
    <style>
        .usuarioo {
            padding: 10px 90px;
        }

        .header-usuario {

            padding: 10px 100px;
        }

        .header-usuario button {
            margin-left: 10px;
            padding: 10px 30px;
        }

        .botones-usuario {
            padding: 10px 20px;
            background-color: b7e4c7;
            /* Color de fondo de los botones */
            color: black;
            /* Color del texto de los botones */
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .botones-usuario:hover {
            background-color: #FEBAAD;
            /* Color al pasar el mouse sobre los botones */
        }

        .busqueda_tarjeta {
            padding: 10px 500px;

        }

        .text_center {
            padding: 10px 70px;
            font-size: 27px;
            /* Tamaño grande */
            font-weight: bold;
            /* Negrita */


        }

        .contenedor_busqueda {
            max-width: 300px;
            margin: 25px auto;
            padding:10px;
            text-align: center;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px #fff(0, 0, 0, 10.1);
            background-color: rgba(255, 255, 255, 0.7);
            /* Color blanco con opacidad del 50% */


        }
    </style>

    <form action="" method="get" class="busqueda_tarjeta">
        <label class="text_center">Busqueda vehiculo por placa</label>
        <input type="text" name="busqueda"><br>
        <input type="submit" name="enviar" value="Buscar"><br>


    </form>

    <div class="contenedor_busqueda">
        <?php
        if (isset($_GET['enviar'])) {
            $busqueda = $_GET['busqueda'];
            $consulta1 = $conexion->query("SELECT * FROM vehiculos WHERE numero_placa LIKE '%$busqueda%'");


            while ($row = $consulta1->fetch_assoc()) {
                echo "Numero de placa:  ".$row['numero_placa'] . '<br>'.'<br>'."Nombre del propietario:  " 
                .$row['nombre_propietario'] .'<br>'.'<br>'."Cedula del propietario:  ".$row['cedula_propietario'] .
                '<br>'.'<br>'."Modelo del vehiculo:  ".$row['modelo_vehiculo'].'<br>'.'<br>'."Color de vehiculo:  "
                .$row['color_vehiculo'].'<br>'.'<br>'."Telefono:  ". $row['telefono'];
                
            }


        }
        ?>
    </div>


    <div class="container">
        <h1>Registro de Vehículo</h1>
        <form action="php/registro_tarjeta.php" method="POST" id="vehicleForm">
            <label>Número de Placa:</label>
            <input type="text" name="numero_placa" required>

            <label>Nombre del Propietario:</label>
            <input type="text" name="nombre_propietario" required>

            <label>Cédula del Propietario:</label>
            <input type="text" name="cedula_propietario" required>

            <label>Modelo del Vehículo:</label>
            <input type="text" name="modelo_vehiculo" required>

            <label>Color del Vehículo:</label>
            <input type="text" name="color_vehiculo" required>

            <label>Telefono:</label>
            <input type="text" name="telefono" required>

            <div class="button">
                <button>Registrar Vehículo</button>
            </div>
        </form>
    </div>
    <script src="scripts.js"></script>
</body>

</html>
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
            <a href="administrador.php">
                <button class="botones-usuario" >Inicio</button>
            </a>   
            <a href="ad_generacion_tarjeta.php">
                <button class="botones-usuario">Generar tarjeta</button>
            </a>        
            <a href="info_tarjeta.php">
                <button class="botones-usuario">Informacion de tarjetas</button>
            </a>
            <a href="generar_reporte.php">
                <button class="botones-usuario">Generar reporte</button>
            </a>
           
            <a href="php/cerrar_sesion.php">
                <button class="botones-usuario">Cerrar sesion</button>
            </a>
            </div>
        </div>
    </header>
            <style>
                .usuarioo{
                padding: 10px 200px;
                }
                .header-usuario{
                
                padding: 10px 100px;
                }
                .header-usuario button {   
                margin-left: 10px;
                padding: 10px 30px;
                }
                .botones-usuario{
                padding: 10px 20px;
                background-color: b7e4c7; /* Color de fondo de los botones */
                color: black; /* Color del texto de los botones */
                border: none;
                border-radius: 25px;
                cursor: pointer;
                transition: background-color 0.3s;
                }
                .botones-usuario:hover {
                background-color: #FEBAAD; /* Color al pasar el mouse sobre los botones */
                }
            </style>
    
    <div class="container">
        <h1>Registro de Vehículo</h1>
        <form action="php/ad_generar_tarjeta.php" method="POST" id="vehicleForm">
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
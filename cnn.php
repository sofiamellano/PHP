<?php

// // config.php
// define('DB_HOST', 'localhost');
// define('DB_USER', 'root');
// define('DB_PASS', '');
// define('DB_NAME', 'bd_prueba');

// $cnn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// if (!$cnn) {
// 	die('Error de conexiÃ³n: ' . mysqli_connect_error());
// }

// // VersiÃ³n corregida con utf8mb4 y manejo de errores
// if (!mysqli_set_charset($cnn, 'utf8mb4')) {
// 	die('Error al establecer charset utf8mb4: ' . mysqli_error($cnn));
// }



// config.php

// Definir las credenciales de conexión en variables
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'bd_prueba';

// Crear la conexión usando las variables
$cnn = mysqli_connect($host, $user, $pass, $dbname);

// Verificar la conexión
if (!$cnn) {
    die('Error de conexión: ' . mysqli_connect_error());
}

// Establecer el charset utf8mb4
if (!mysqli_set_charset($cnn, 'utf8mb4')) {
    die('Error al establecer charset utf8mb4: ' . mysqli_error($cnn));
}

?>


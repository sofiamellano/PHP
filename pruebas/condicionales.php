<?php
// CONDICIONALES

// $edad = 0;

// if(isset($_GET['edad'])) {
//     $edad = $_GET['edada'];
// }

// $edad = $_GET['edadalumno'];
// if ($edad <= 18) {
//     echo "<br> Es menor de edad";
// } elseif ($edad < 66) {
//     echo "<br> Es mayor de edad";
// } else {
//     echo "<br> Es de la tercera edad";
// }

$notas = 0;

if (isset($_GET['notas'])) {
    $notas = $_GET['notas'];
}

if ($notas <= 3) {
    echo "<br> Malo";
} elseif ($notas <= 5) {
    echo "<br> Bueno";
} elseif ($notas <= 7) {
    echo "<br> Regular";
} elseif ($notas <= 9) {
    echo "<br> Muy bueno";
} elseif ($notas = 10) {
    echo "<br> Excelente";
} else {
    echo "<br> Nota no válida";
};



?>
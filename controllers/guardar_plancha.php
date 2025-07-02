<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Validación de campos
$nombre = $_POST['nombre'] ?? '';
$votacion_id = $_POST['votacion_id'] ?? '';
$imagen = $_FILES['imagen'] ?? null;

if ($nombre && $votacion_id && $imagen && $imagen['error'] == 0) {
    // Procesar imagen
    $ruta_subida = '../assets/img/';
    $nombre_archivo = basename($imagen['name']);
    $ruta_final = $ruta_subida . $nombre_archivo;

    if (move_uploaded_file($imagen['tmp_name'], $ruta_final)) {
        // Simular almacenamiento
        // En una app real, guardarías la ruta, nombre y votacion_id en BD

        header("Location: planchas.php?mensaje=creada");
        exit();
    } else {
        header("Location: crear_plancha.php?error=upload");
        exit();
    }
} else {
    header("Location: crear_plancha.php?error=campos");
    exit();
}

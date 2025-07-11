<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = $_POST['id'] ?? null;
$nombre = $_POST['nombre'] ?? '';
$imagen = $_FILES['imagen'] ?? null;

if ($id && $nombre) {
    $imagen_guardada = false;

    if ($imagen && $imagen['error'] == 0) {
        $ruta_subida = '../assets/img/';
        $nombre_archivo = basename($imagen['name']);
        $ruta_final = $ruta_subida . $nombre_archivo;

        if (move_uploaded_file($imagen['tmp_name'], $ruta_final)) {
            $imagen_guardada = true;
        } else {
            header("Location: editar_plancha.php?id=$id&error=upload");
            exit();
        }
    }

    // Simulación de actualización en BD
    // En una app real se actualizaría la BD con $nombre y $ruta_final si hubo imagen nueva

    header("Location: planchas.php?mensaje=actualizada");
    exit();

} else {
    header("Location: editar_plancha.php?id=$id&error=campos");
    exit();
}

<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Obtener ID de la votación a eliminar
$id = $_GET['id'] ?? null;

if ($id) {
    // Simulamos la eliminación (en una app real, se eliminaría de la BD)

    // Redirigir al listado con mensaje de éxito
    header("Location: votaciones.php?mensaje=eliminada");
    exit();
} else {
    // Redirigir si no hay ID proporcionado
    header("Location: votaciones.php?error=sin_id");
    exit();
}

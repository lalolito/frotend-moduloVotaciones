<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Captura de datos POST
$id = $_POST['id'] ?? null;
$tipo = $_POST['tipo_votacion'] ?? '';
$facultad = $_POST['facultad'] ?? '';
$inicio = $_POST['fecha_inicio'] ?? '';
$fin = $_POST['fecha_fin'] ?? '';

// Validación básica
if ($id && $tipo && $facultad && $inicio && $fin) {
    // Simulamos actualización (en una app real, se usaría BD)

    // Redirigir al listado con mensaje de éxito
    header("Location: votaciones.php?mensaje=actualizada");
    exit();
} else {
    // Redirigir a formulario con datos previos y mensaje de error
    $tipo = urlencode($tipo);
    $facultad = urlencode($facultad);
    $inicio = urlencode($inicio);
    $fin = urlencode($fin);
    $id = urlencode($id);

    header("Location: editar_votacion.php?error=faltan_datos&id=$id&tipo_votacion=$tipo&facultad=$facultad&fecha_inicio=$inicio&fecha_fin=$fin");
    exit();
}

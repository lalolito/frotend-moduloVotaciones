<?php

// Mostrar errores (importante en desarrollo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Capturar los datos enviados por POST
$tipo = $_POST['tipo_votacion'] ?? '';
$facultad = $_POST['facultad'] ?? '';
$inicio = $_POST['fecha_inicio'] ?? '';
$fin = $_POST['fecha_fin'] ?? '';

// Validar que los campos obligatorios no estén vacíos
if ($tipo && $facultad && $inicio && $fin) {
    // Simular almacenamiento exitoso
    // En una versión con BD, aquí se insertaría el registro

    // Redirigir al listado con mensaje
    header("Location: votaciones.php?mensaje=creada");
    exit();
} else {
    // Redirigir al formulario con valores conservados
    $tipo = urlencode($tipo);
    $facultad = urlencode($facultad);
    $inicio = urlencode($inicio);
    $fin = urlencode($fin);

    header("Location: crear_votacion.php?error=faltan_datos&tipo_votacion=$tipo&facultad=$facultad&fecha_inicio=$inicio&fecha_fin=$fin");
    exit();
}

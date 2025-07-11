<?php
// Mostrar errores en desarrollo
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Cargar dependencias
require_once('../controllers/votacionController.php');
use app\controllers\votacionController;

// Validar que todos los campos estén presentes
if (empty($_POST['tipo_votacion']) || empty($_POST['facultad']) || 
    empty($_POST['fecha_inicio']) || empty($_POST['fecha_fin'])) {
    
    // Redirigir con error y mantener datos
    $params = http_build_query([
        'error' => 'faltan_datos',
        'tipo_votacion' => $_POST['tipo_votacion'] ?? '',
        'facultad' => $_POST['facultad'] ?? '',
        'fecha_inicio' => $_POST['fecha_inicio'] ?? '',
        'fecha_fin' => $_POST['fecha_fin'] ?? ''
    ]);
    header("Location: crear_votacion.php?" . $params);
    exit();
}

// Mapear facultades a códigos
$facultades_map = [
    'Ingeniería' => 'ING',
    'Derecho' => 'DER',
    'Educación' => 'EDU',
    'Arquitectura' => 'ARQ',
    'Economía' => 'ECO',
    'Salud' => 'SAL',
    'Medicina' => 'MED',
    'Administración' => 'ADM',
    'Ciencias' => 'CIE',
    'Ciencias Sociales' => 'SOC'
];

// Generar agrupador
$tipo_dependiente = 'E'; // Por defecto estudiantes
$codigo_facultad = $facultades_map[$_POST['facultad']] ?? 'GEN';
$agrupador = $tipo_dependiente . $codigo_facultad;

// Preparar datos para el controlador
$_POST['tipo_solicitud'] = $_POST['tipo_votacion'];
$_POST['agrupador'] = $agrupador;
$_POST['servicio'] = 'VOT';

// Formatear fechas correctamente
$_POST['fecha_inicio'] = date('Y-m-d H:i:s', strtotime($_POST['fecha_inicio']));
$_POST['fecha_fin'] = date('Y-m-d H:i:s', strtotime($_POST['fecha_fin']));

try {
    $votacionController = new votacionController();
    $resultado = $votacionController->crearVotacionControlador();
    
    if (is_array($resultado) && $resultado['tipo'] == 'limpiar') {
        // Éxito - redirigir con mensaje
        header("Location: votaciones.php?mensaje=creada&id=" . $resultado['id_votacion']);
        exit();
    } else {
        // Error - redirigir al formulario con el mensaje de error
        $params = http_build_query([
            'error' => 'error_bd',
            'mensaje' => $resultado['texto'] ?? 'Error desconocido',
            'tipo_votacion' => $_POST['tipo_solicitud'],
            'facultad' => $_POST['facultad'],
            'fecha_inicio' => $_POST['fecha_inicio'],
            'fecha_fin' => $_POST['fecha_fin']
        ]);
        header("Location: crear_votacion.php?" . $params);
        exit();
    }
} catch (Exception $e) {
    // Log más detallado
    error_log("=== ERROR DETALLADO ===");
    error_log("Mensaje: " . $e->getMessage());
    error_log("Archivo: " . $e->getFile());
    error_log("Línea: " . $e->getLine());
    error_log("Trace: " . $e->getTraceAsString());
    error_log("POST data: " . print_r($_POST, true));
    
    $params = http_build_query([
        'error' => 'error_sistema',
        'mensaje' => 'Error: ' . $e->getMessage(), // Mostrar el error real
        'tipo_votacion' => $_POST['tipo_votacion'],
        'facultad' => $_POST['facultad'],
        'fecha_inicio' => $_POST['fecha_inicio'],
        'fecha_fin' => $_POST['fecha_fin']
    ]);
    header("Location: crear_votacion.php?" . $params);
    exit();
}
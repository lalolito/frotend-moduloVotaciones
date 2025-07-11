<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Cargar dependencias
require_once(__DIR__ . '/../config/server.php');
require_once(__DIR__ . '/../controllers/votacionController.php');

use app\controllers\votacionController;

// Verificar que sea POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: votaciones.php");
    exit();
}

// Validar campos obligatorios
$campos_requeridos = ['id_tipo_solicitud', 'tipo_solicitud', 'facultad', 'tipo_dependiente', 'fecha_inicio', 'fecha_fin'];
foreach ($campos_requeridos as $campo) {
    if (empty($_POST[$campo])) {
        $params = http_build_query([
            'error' => 'campos_vacios',
            'id' => $_POST['id_tipo_solicitud'] ?? ''
        ]);
        header("Location: editar_votacion.php?" . $params);
        exit();
    }
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

// Mapear tipos de dependiente a códigos
$tipos_dependiente_map = [
    'Estudiante' => 'E',
    'Docente' => 'D',
    'Administrativo' => 'A'
];

// Generar nuevo agrupador
$codigo_tipo = $tipos_dependiente_map[$_POST['tipo_dependiente']] ?? 'E';
$codigo_facultad = $facultades_map[$_POST['facultad']] ?? 'GEN';
$nuevo_agrupador = $codigo_tipo . $codigo_facultad;

// Preparar datos para el controlador
$_POST['agrupador'] = $nuevo_agrupador;
$_POST['servicio'] = 'VOT';

// Formatear fechas
$_POST['fecha_inicio'] = str_replace('T', ' ', $_POST['fecha_inicio']) . ':00';

$_POST['fecha_fin'] = str_replace('T', ' ', $_POST['fecha_fin']) . ':00';


try {
    $votacionController = new votacionController();
    $resultado = $votacionController->modificarVotacionControlador();
    
    if (is_array($resultado)) {
        if ($resultado['tipo'] == 'recargar') {
            // Éxito
            header("Location: votaciones.php?mensaje=actualizada&id=" . $_POST['id_tipo_solicitud']);
            exit();
        } else {
            // Error del controlador
            $params = http_build_query([
                'error' => 'error_bd',
                'mensaje' => $resultado['texto'],
                'id' => $_POST['id_tipo_solicitud']
            ]);
            header("Location: editar_votacion.php?" . $params);
            exit();
        }
    } else {
        throw new Exception("Respuesta inesperada del controlador");
    }
    
} catch (Exception $e) {
    error_log("Error en actualizar_votacion.php: " . $e->getMessage());
    
    $params = http_build_query([
        'error' => 'error_bd',
        'mensaje' => 'Error del sistema: ' . $e->getMessage(),
        'id' => $_POST['id_tipo_solicitud']
    ]);
    header("Location: editar_votacion.php?" . $params);
    exit();
}
?>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../libs/Smarty.class.php');
require_once('../models/mainModel.php');
require_once('../controllers/votacionController.php');

use app\controllers\votacionController;

$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';


// Procesar formulario si se envía
if ($_POST) {
    // Debug temporal
    error_log("=== CREAR VOTACION DEBUG ===");
    error_log("POST recibido: " . print_r($_POST, true));
    
    // Validar que todos los campos estén presentes
    if (empty($_POST['tipo_votacion']) || empty($_POST['facultad']) || 
        empty($_POST['fecha_inicio']) || empty($_POST['fecha_fin'])) {
        
        error_log("Campos faltantes detectados");
        
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

    // Por defecto, asumimos que es para estudiantes (E)
    $tipo_dependiente = 'E';
    $codigo_facultad = $facultades_map[$_POST['facultad']] ?? 'GEN';
    $agrupador = $tipo_dependiente . $codigo_facultad;

    // Preparar datos para el controlador
    $_POST['tipo_solicitud'] = $_POST['tipo_votacion'];
    $_POST['agrupador'] = $agrupador;
    $_POST['servicio'] = 'VOT';
    
    // Formatear fechas correctamente
    $_POST['fecha_inicio'] = str_replace('T', ' ', $_POST['fecha_inicio']) . ':00';
    $_POST['fecha_fin'] = str_replace('T', ' ', $_POST['fecha_fin']) . ':00';


    error_log("Datos preparados para controlador:");
    error_log("- tipo_solicitud: " . $_POST['tipo_solicitud']);
    error_log("- agrupador: " . $_POST['agrupador']);
    error_log("- fecha_inicio: " . $_POST['fecha_inicio']);
    error_log("- fecha_fin: " . $_POST['fecha_fin']);
    error_log("- id_tipo_solicitud: " . ($_POST['id_tipo_solicitud'] ?? 'AUTO'));

    try {
        $votacionController = new votacionController();
        $resultado = $votacionController->crearVotacionControlador();
        
        error_log("Resultado del controlador: " . print_r($resultado, true));

        if (is_array($resultado) && $resultado['tipo'] == 'limpiar') {
            // Redirigir con mensaje de éxito
            header("Location: votaciones.php?mensaje=creada&id=" . ($resultado['id_votacion'] ?? ''));
            exit();
        } else {
            // Mostrar error
            $error_texto = $resultado['texto'] ?? 'Error desconocido';
            error_log("Error del controlador: " . $error_texto);
            $smarty->assign("error_mensaje", $error_texto);
        }
    } catch (Exception $e) {
        error_log("Excepción en crear_votacion.php: " . $e->getMessage());
        error_log("Stack trace: " . $e->getTraceAsString());
        $smarty->assign("error_mensaje", "Error al crear la votación: " . $e->getMessage());
    }
}

// Datos para los selectores - adaptados a la base de datos
$tipos_votacion = [
    "Consejo Académico", 
    "Representante Estudiantil", 
    "Decanatura",
    "Consejo Directivo",
    "Representante Docente",
    "Representante Administrativo"
];

$facultades = [
    "Ingeniería", 
    "Derecho", 
    "Educación", 
    "Arquitectura",
    "Economía",
    "Salud",
    "Medicina",
    "Administración",
    "Ciencias",
    "Ciencias Sociales"
];

$smarty->assign("tipos_votacion", $tipos_votacion);
$smarty->assign("facultades", $facultades);
$smarty->assign("titulo_pagina", "Crear Votación");

$smarty->display('crear_votacion.tpl');
?>

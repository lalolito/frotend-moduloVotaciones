<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../libs/Smarty.class.php');
require_once('../controllers/votacionController.php');

use app\controllers\votacionController;

$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';

// Obtener ID desde la URL
$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    header("Location: votaciones.php?error=id_invalido");
    exit();
}

try {
    $votacionController = new votacionController();
    
    // Obtener datos de la votación
    $votacion_bd = $votacionController->obtenerVotacionControlador($id);
    
    if (!$votacion_bd) {
        header("Location: votaciones.php?error=no_encontrada");
        exit();
    }
    
    // Adaptar datos para el template
    $votacion = [
        'id' => $votacion_bd['ID_TIPO_SOLICITUD'],
        'tipo' => $votacion_bd['TIPO_SOLICITUD'],
        'facultad' => $votacion_bd['FACULTAD'], // Ya viene procesada del modelo
        'tipo_dependiente' => $votacion_bd['TIPO_DEPENDIENTE'], // Ya viene procesada
        'agrupador' => $votacion_bd['AGRUPADOR'],
        'inicio' => date('Y-m-d\TH:i', strtotime($votacion_bd['FECHA_INICIO'])), // Formato para datetime-local
        'fin' => date('Y-m-d\TH:i', strtotime($votacion_bd['FECHA_FIN'])),
        'id_tipo_dependiente' => $votacion_bd['ID_TIPO_DEPENDIENTE']
    ];
    
    // Datos para los selectores
    $tipos_votacion = [
        "Consejo Académico",
        "Representante Estudiantil",
        "Decanatura",
        "Consejo Directivo",
        "Representante Docente",
        "Representante Administrativo"
    ];
    
    $facultades = [
        "Derecho",
        "Ingeniería",
        "Economía",
        "Arquitectura",
        "Educación"
    ];
    
    $tipos_dependiente = [
        "Estudiante",
        "Docente",
        "Administrativo"
    ];
    
    // Asignar variables al template
    $smarty->assign("votacion", $votacion);
    $smarty->assign("tipos_votacion", $tipos_votacion);
    $smarty->assign("facultades", $facultades);
    $smarty->assign("tipos_dependiente", $tipos_dependiente);
    $smarty->assign("titulo_pagina", "Editar Votación");
    
    // Mostrar mensajes de error si existen
    if (isset($_GET['error'])) {
        $errores = [
            'campos_vacios' => 'Todos los campos son obligatorios',
            'fechas_invalidas' => 'Las fechas no son válidas',
            'agrupador_duplicado' => 'Ya existe una votación con ese agrupador',
            'error_bd' => $_GET['mensaje'] ?? 'Error en la base de datos'
        ];
        
        $smarty->assign("error_mensaje", $errores[$_GET['error']] ?? 'Error desconocido');
    }
    
    // Asignar flag para limpiar URL si hay parámetros de error
    $smarty->assign("limpiar_url", isset($_GET['error']));
    
    $smarty->display('editar_votacion.tpl');
    
} catch (Exception $e) {
    error_log("Error en editar_votacion.php: " . $e->getMessage());
    header("Location: votaciones.php?error=error_sistema");
    exit();
}
?>
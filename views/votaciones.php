<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../libs/Smarty.class.php');
require_once('../controllers/votacionController.php');

use app\controllers\votacionController;

$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';

try {
    // SIEMPRE cargar las votaciones, sin importar los parámetros GET
    $votacionController = new votacionController();
    $votaciones_bd = $votacionController->listarVotacionesControlador();
    
    // Procesar votaciones para el template (mantener tu formato original)
    $votaciones = [];
    
    if (is_array($votaciones_bd) && count($votaciones_bd) > 0) {
        foreach ($votaciones_bd as $votacion_bd) {
            $votaciones[] = [
                'id' => $votacion_bd['ID_TIPO_SOLICITUD'],
                'tipo' => $votacion_bd['TIPO_SOLICITUD'],
                'facultad' => $votacion_bd['FACULTAD'],
                'inicio' => date('d/m/Y H:i', strtotime($votacion_bd['FECHA_INICIO'])),
                'fin' => date('d/m/Y H:i', strtotime($votacion_bd['FECHA_FIN'])),
                // Campos adicionales por si los necesitas
                'agrupador' => $votacion_bd['AGRUPADOR'],
                'estado' => $votacion_bd['ESTADO'],
                'tipo_dependiente' => $votacion_bd['TIPO_DEPENDIENTE']
            ];
        }
    }
    
    // Asignar al template
    $smarty->assign("votaciones", $votaciones);
    $smarty->assign("titulo_pagina", "Listado de Votaciones");
    $smarty->display('votaciones.tpl');
    
} catch (Exception $e) {
    error_log("Error en votaciones.php: " . $e->getMessage());
    
    // En caso de error, mostrar template vacío con mensaje
    $smarty->assign("votaciones", []);
    $smarty->assign("error_sistema", "Error al cargar las votaciones: " . $e->getMessage());
    $smarty->assign("titulo_pagina", "Listado de Votaciones");
    $smarty->display('votaciones.tpl');
}
?>
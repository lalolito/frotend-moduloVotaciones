<?php

require_once('../controllers/planchaController.php');
require_once('../libs/Smarty.class.php');

use app\controllers\planchaController;

$ctrl = new planchaController();

$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';

try {
    // Obtener planchas reales desde el modelo
    $planchas_bd = $ctrl->modelo->listarPlanchas()->fetchAll(PDO::FETCH_ASSOC);

    // Procesar los datos si quieres adaptarlos (opcional)
    $planchas = [];
    foreach ($planchas_bd as $p) {

        $votacion = $ctrl->modelo->obtenerVotacionDePlancha($p['ID_OPCION_PREGUNTA']);
        $nombre_votacion = $votacion[0]['TIPO_SOLICITUD'] ?? 'Sin asociacion';

        $planchas[] = [
            'id' => $p['ID_OPCION_PREGUNTA'],
            'nombre' => $p['OPCION'],
            'imagen' => $p['URL'],
            'votacion' => $nombre_votacion, 
        ];
    }

    // Enviar datos a la plantilla
    $smarty->assign("planchas", $planchas);
    $smarty->assign("titulo_pagina", "Listado de Planchas");
    $smarty->display('planchas.tpl');

} catch (Exception $e) {
    // Si hay un error, mostrar mensaje en la plantilla
    $smarty->assign("planchas", []);
    $smarty->assign("titulo_pagina", "Listado de Planchas");
    $smarty->assign("error_sistema", "Error al cargar las planchas: " . $e->getMessage());
    $smarty->display('planchas.tpl');
}

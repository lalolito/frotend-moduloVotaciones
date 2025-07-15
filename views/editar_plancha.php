<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../libs/Smarty.class.php');
require_once('../controllers/planchaController.php');

use app\controllers\planchaController;

$ctrl = new planchaController();
$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';

$id = $_GET['id'] ?? null;

if ($id) {
    // Obtener plancha completa desde BD
    $plancha = $ctrl->modelo->obtenerPlanchaPorID($id);

    if ($plancha) {
        // Obtener los datos de relación pregunta-tipo para esta plancha
        $relacion = $ctrl->modelo->obtenerPreguntaPorRelacion($plancha["ID_SOLICITUD_PREGUNTA"]);
        
        // Agregar estos valores al arreglo que se le pasa a Smarty
        $plancha['id_pregunta'] = $relacion['ID_PREGUNTA'];
        $plancha['id_tipo'] = $relacion['ID_TIPO_SOLICITUD'];

        // Asignar datos a la vista
        $smarty->assign("plancha", $plancha);
        $smarty->assign("preguntas", $ctrl->modelo->obtenerPreguntas());
        $smarty->assign("tipos", $ctrl->modelo->obtenerTiposVotacion());
        $smarty->assign("titulo_pagina", "Editar Plancha");

        $smarty->display('editar_plancha.tpl');
    } else {
        echo "<p>Plancha no encontrada.</p>";
    }
} else {
    echo "<p>ID de plancha no especificado.</p>";
}

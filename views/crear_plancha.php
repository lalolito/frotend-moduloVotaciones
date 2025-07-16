<?php

require_once('../libs/Smarty.class.php');
require_once('../controllers/planchaController.php');

use app\controllers\planchaController;

$ctrl = new planchaController();

$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';

$preguntas = $ctrl->modelo->obtenerPreguntas();
$tipos     = $ctrl->modelo->obtenerTiposVotacion();

$smarty->assign("preguntas", $preguntas->fetchAll(PDO::FETCH_ASSOC));
$smarty->assign("tipos", $tipos->fetchAll(PDO::FETCH_ASSOC));
$smarty->assign("titulo_pagina", "Crear Nueva Plancha");
$smarty->display('crear_plancha.tpl');


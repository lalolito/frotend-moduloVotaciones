<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../libs/Smarty.class.php');


$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';

// Datos simulados
$tipos_votacion = ["Consejo Académico", "Representante Estudiantil", "Decanatura"];
$facultades = ["Ingeniería", "Derecho", "Educación", "Arquitectura"];

$smarty->assign("tipos_votacion", $tipos_votacion);
$smarty->assign("facultades", $facultades);
$smarty->assign("titulo_pagina", "Crear Votación");

$smarty->display('crear_votacion.tpl');

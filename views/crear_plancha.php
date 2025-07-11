<?php

require_once('../libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';

// Simulación de votaciones existentes para asociar
$votaciones = [
    [ 'id' => 1, 'nombre' => 'Consejo Académico' ],
    [ 'id' => 2, 'nombre' => 'Representante Estudiantil' ],
    [ 'id' => 3, 'nombre' => 'Consejo de Facultad' ]
];

$smarty->assign("votaciones", $votaciones);
$smarty->assign("titulo_pagina", "Crear Nueva Plancha");
$smarty->display('crear_plancha.tpl');

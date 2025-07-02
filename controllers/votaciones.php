<?php

require_once('../libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';

// Datos simulados (en producción vendrán de BD)
$votaciones = [
    [
        'id' => 1,
        'tipo' => 'Consejo Académico',
        'facultad' => 'Ingeniería',
        'inicio' => '2025-08-01 08:00',
        'fin' => '2025-08-03 17:00'
    ],
    [
        'id' => 2,
        'tipo' => 'Representante Estudiantil',
        'facultad' => 'Derecho',
        'inicio' => '2025-08-05 09:00',
        'fin' => '2025-08-07 16:00'
    ]
];

$smarty->assign("votaciones", $votaciones);
$smarty->assign("titulo_pagina", "Listado de Votaciones");
$smarty->display('votaciones.tpl');

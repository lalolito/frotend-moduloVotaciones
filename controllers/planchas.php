<?php

require_once('../libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';

// Simulación de planchas
$planchas = [
    [
        'id' => 1,
        'nombre' => 'Plancha Verde',
        'imagen' => '../assets/img/image (8).png',
        'votacion' => 'Consejo Académico'
    ],
    [
        'id' => 2,
        'nombre' => 'Plancha Renovación',
        'imagen' => '../assets/img/plancha2.jpg',
        'votacion' => 'Representante Estudiantil'
    ],
    [
        'id' => 3,
        'nombre' => 'Plancha Justicia',
        'imagen' => '../assets/img/plancha3.jpg',
        'votacion' => 'Consejo de Facultad'
    ]
];

$smarty->assign("planchas", $planchas);
$smarty->assign("titulo_pagina", "Listado de Planchas");
$smarty->display('planchas.tpl');

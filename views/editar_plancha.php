<?php

require_once('../libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';

// Simulación de planchas registradas
$planchas = [
    1 => [
        'id' => 1,
        'nombre' => 'Plancha Verde',
        'imagen' => '../assets/img/plancha1.jpg',
        'votacion' => 'Consejo Académico'
    ],
    2 => [
        'id' => 2,
        'nombre' => 'Plancha Renovación',
        'imagen' => '../assets/img/plancha2.jpg',
        'votacion' => 'Representante Estudiantil'
    ]
];

$id = $_GET['id'] ?? null;

if ($id && isset($planchas[$id])) {
    $smarty->assign("plancha", $planchas[$id]);
    $smarty->assign("titulo_pagina", "Editar Plancha");
    $smarty->display('editar_plancha.tpl');
} else {
    echo "<p>Plancha no encontrada</p>";
}

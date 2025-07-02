<?php

require_once('../libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';

// Obtener ID desde la URL
$id = $_GET['id'] ?? null;

// Datos simulados (en una app real, se consultan desde la BD)
$votaciones = [
    1 => [
        'id' => 1,
        'tipo' => 'Consejo Académico',
        'facultad' => 'Ingeniería',
        'inicio' => '2025-08-01T08:00',
        'fin' => '2025-08-03T17:00'
    ],
    2 => [
        'id' => 2,
        'tipo' => 'Representante Estudiantil',
        'facultad' => 'Derecho',
        'inicio' => '2025-08-05T09:00',
        'fin' => '2025-08-07T16:00'
    ]
];

$tipos_votacion = ["Consejo Académico", "Representante Estudiantil", "Decanatura"];
$facultades = ["Ingeniería", "Derecho", "Educación", "Arquitectura"];

if ($id && isset($votaciones[$id])) {
    $smarty->assign("votacion", $votaciones[$id]);
    $smarty->assign("tipos_votacion", $tipos_votacion);
    $smarty->assign("facultades", $facultades);
    $smarty->assign("titulo_pagina", "Editar Votación");
    $smarty->display('editar_votacion.tpl');
} else {
    echo "<p>Votación no encontrada</p>";
}

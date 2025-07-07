<?php
// Ubicación: controllers/vista_principal.php

session_start();

// Simulación temporal de sesión
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = 'admin';
}

// CORREGIDO: subir un nivel para acceder a la carpeta libs/
require_once('../libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';

$smarty->assign("titulo_pagina", "Inicio - Módulo de Votaciones");
$smarty->assign("usuario", $_SESSION['usuario']);

$smarty->display('vista_principal.tpl');

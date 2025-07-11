<?php
// Ubicación: controllers/vista_usuario.php

session_start();

// Simulación temporal del usuario
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = 'usuario_demo';
}

// Simulación de rol (puede ser 'docente' o 'estudiante')
if (!isset($_SESSION['rol'])) {
    $_SESSION['rol'] = 'estudiante'; // cambiar a 'docente' si lo deseas
}

require_once('../libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';

$smarty->assign("titulo_pagina", "Panel del Usuario");
$smarty->assign("usuario", $_SESSION['usuario']);
$smarty->assign("rol", $_SESSION['rol']);

$smarty->display('vista_usuario.tpl');

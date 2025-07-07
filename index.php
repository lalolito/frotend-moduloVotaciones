<?php
// Ubicación: index.php

require_once('libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

// Puedes usar este título si se mostrará en layout.tpl
$smarty->assign("titulo_pagina", "Iniciar Sesión - Módulo de Votaciones");

// Carga directamente la vista de login
$smarty->display('login.tpl');

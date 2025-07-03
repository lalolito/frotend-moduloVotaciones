<?php
// Ubicación: index.php o controllers/home.php

require_once('libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

$smarty->assign("titulo_pagina", "Inicio - Módulo de Votaciones");
$smarty->display('vista_principal.tpl');

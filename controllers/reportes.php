<?php

require_once('../libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';

$smarty->assign("titulo_pagina", "Reportes de Escrutinio");
$smarty->display('reportes.tpl');

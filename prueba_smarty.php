<?php
require_once('libs/Smarty.class.php');

$smarty = new Smarty();
$smarty->template_dir = 'templates';
$smarty->compile_dir  = 'templates_c';

$smarty->assign("nombre", "Tu Nombre Aquí");
$smarty->display('prueba.tpl');
?>

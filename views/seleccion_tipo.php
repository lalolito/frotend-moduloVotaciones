<?php
session_start();
require_once('../libs/Smarty.class.php');

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    exit;
}

$smarty = new Smarty();
$smarty->template_dir = '../templates';
$smarty->compile_dir = '../templates_c';

$rol = $_SESSION['rol'];
$facultad = $_SESSION['facultad_codigo'];
$nombre = $_SESSION['nombre'];

$nombres_facultades = [
  'ING' => 'Ingeniería',
  'ECO' => 'Economía',
  'ARQ' => 'Arquitectura',
  'DER' => 'Derecho',
  'EDU' => 'Educación'
];

$smarty->assign('nombre', $nombre);
$smarty->assign('rol', $rol);
$smarty->assign('nombre_facultad', $nombres_facultades[$facultad] ?? 'General');

$smarty->display('seleccion_tipo.tpl');

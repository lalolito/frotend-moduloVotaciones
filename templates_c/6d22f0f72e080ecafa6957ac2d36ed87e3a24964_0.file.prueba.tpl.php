<?php
/* Smarty version 4.5.5, created on 2025-07-02 16:45:33
  from 'C:\xampp\htdocs\front\templates\prueba.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6865460d9d1752_52117883',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6d22f0f72e080ecafa6957ac2d36ed87e3a24964' => 
    array (
      0 => 'C:\\xampp\\htdocs\\front\\templates\\prueba.tpl',
      1 => 1751467512,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6865460d9d1752_52117883 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prueba Smarty</title>
</head>
<body>
    <h1>¡Hola, <?php echo $_smarty_tpl->tpl_vars['nombre']->value;?>
!</h1>
    <p>Si estás viendo esto, Smarty funciona correctamente ✅</p>
</body>
</html>
<?php }
}

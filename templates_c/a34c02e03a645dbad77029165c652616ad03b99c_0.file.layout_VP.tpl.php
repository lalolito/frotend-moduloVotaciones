<?php
/* Smarty version 4.5.5, created on 2025-07-03 00:08:52
  from 'C:\xampp\htdocs\front\templates\layout_VP.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6865adf49f8c41_95480876',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a34c02e03a645dbad77029165c652616ad03b99c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\front\\templates\\layout_VP.tpl',
      1 => 1751494108,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header_VP.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6865adf49f8c41_95480876 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['titulo_pagina']->value ?? null)===null||$tmp==='' ? "Módulo de Votaciones" ?? null : $tmp);?>
</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header_VP.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <main>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_122812756865adf49f7a03_16655204', "contenido");
?>

    </main>

    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html>
<?php }
/* {block "contenido"} */
class Block_122812756865adf49f7a03_16655204 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_122812756865adf49f7a03_16655204',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "contenido"} */
}

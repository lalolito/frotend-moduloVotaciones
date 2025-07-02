<?php
/* Smarty version 4.5.5, created on 2025-07-02 18:27:54
  from 'C:\xampp\htdocs\front\templates\layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68655e0a7443e6_21477554',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7b84bb91b6ce3099e53aecb88f258b10b5c97f3b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\front\\templates\\layout.tpl',
      1 => 1751473658,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_68655e0a7443e6_21477554 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['titulo_pagina']->value ?? null)===null||$tmp==='' ? "Módulo de Votaciones" ?? null : $tmp);?>
</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <main>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_132063406568655e0a742b29_98110323', "contenido");
?>

    </main>

    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html>
<?php }
/* {block "contenido"} */
class Block_132063406568655e0a742b29_98110323 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_132063406568655e0a742b29_98110323',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "contenido"} */
}

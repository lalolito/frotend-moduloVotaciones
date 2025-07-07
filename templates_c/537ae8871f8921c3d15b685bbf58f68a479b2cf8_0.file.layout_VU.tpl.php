<?php
/* Smarty version 4.5.5, created on 2025-07-07 22:53:37
  from 'C:\xampp\htdocs\frotend-moduloVotaciones\templates\layout_VU.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_686c33d1b7f6f3_83000232',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '537ae8871f8921c3d15b685bbf58f68a479b2cf8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\frotend-moduloVotaciones\\templates\\layout_VU.tpl',
      1 => 1751921386,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_686c33d1b7f6f3_83000232 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('usuario'=>(($tmp = $_smarty_tpl->tpl_vars['usuario']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp)), 0, false);
?>

    <main>
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_477429498686c33d1b7a414_86281834', "contenido");
?>

        <?php if ((isset($_smarty_tpl->tpl_vars['mensaje']->value))) {?>
            <div class="mensaje-notificacion"><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</div>
        <?php }?>
    </main>

    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php echo '<script'; ?>
>
function abrirModalPlancha() {
  document.getElementById("modalPlancha").style.display = "block";
}

function cerrarModal() {
  document.getElementById("modalPlancha").style.display = "none";
}
<?php echo '</script'; ?>
>

</body>
</html>


<?php }
/* {block "contenido"} */
class Block_477429498686c33d1b7a414_86281834 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_477429498686c33d1b7a414_86281834',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "contenido"} */
}

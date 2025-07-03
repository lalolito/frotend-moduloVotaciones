<?php
/* Smarty version 4.5.5, created on 2025-07-03 18:24:42
  from 'C:\xampp\htdocs\frotend-moduloVotaciones\templates\layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6866aecaba5389_15949401',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '513634ec9478afa03fff85c3cc0cdb482e918b1b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\frotend-moduloVotaciones\\templates\\layout.tpl',
      1 => 1751559872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6866aecaba5389_15949401 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15096463016866aecab9d703_97982184', "contenido");
?>

        <?php if ((isset($_smarty_tpl->tpl_vars['mensaje']->value))) {?>
            <div class="mensaje-notificacion"><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</div>
        <?php }?>
    </main>
    <div class="menu-flotante">
    <button onclick="toggleMenu()">☰</button>
    <div id="opciones-menu" class="menu-opciones oculto">
        <div class="burbuja-opcion">
        <a href="votaciones.php">🗳</a>
        <span class="tooltip-opcion">Votaciones</span>
        </div>

        <div class="burbuja-opcion">
        <a href="planchas.php">📋</a>
        <span class="tooltip-opcion">Planchas</span>
        </div>

        <div class="burbuja-opcion">
        <a href="reportes.php">📊</a>
        <span class="tooltip-opcion">Reportes</span>
        </div>

        <div class="burbuja-opcion">
        <a href="../index.php">🏠</a>
        <span class="tooltip-opcion">Inicio</span>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
>
function toggleMenu() {
  const menu = document.getElementById("opciones-menu");
  menu.classList.toggle("oculto");
  setTimeout(() => {
    menu.classList.toggle("visible");
  }, 10); // se activa después del display para permitir la transición
}
<?php echo '</script'; ?>
>


    <?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html>


<?php }
/* {block "contenido"} */
class Block_15096463016866aecab9d703_97982184 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_15096463016866aecab9d703_97982184',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "contenido"} */
}

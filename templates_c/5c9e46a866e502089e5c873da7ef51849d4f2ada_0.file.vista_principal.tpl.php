<?php
/* Smarty version 4.5.5, created on 2025-07-03 16:31:20
  from 'C:\xampp\htdocs\frotend-moduloVotaciones\templates\vista_principal.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6866943813a0c3_09744774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c9e46a866e502089e5c873da7ef51849d4f2ada' => 
    array (
      0 => 'C:\\xampp\\htdocs\\frotend-moduloVotaciones\\templates\\vista_principal.tpl',
      1 => 1751553077,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6866943813a0c3_09744774 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_149498230368669438138ff4_86005716', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout_VP.tpl");
}
/* {block "contenido"} */
class Block_149498230368669438138ff4_86005716 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_149498230368669438138ff4_86005716',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2 class="text-center">Administración del Módulo de Votaciones</h2>
<p class="text-center">Selecciona el módulo que deseas administrar:</p>

<div class="menu-principal">
    <div class="menu-card">
        <img src="assets/img/votaciones.png" alt="Votaciones">
        <h3>Votaciones</h3>
        <p>Gestiona fechas, tipos y reglas de votación.</p>
        <a href="controllers/votaciones.php">Ingresar</a>
    </div>

    <div class="menu-card">
        <img src="assets/img/planchas.png" alt="Planchas">
        <h3>Planchas</h3>
        <p>Registra y administra las planchas por votación.</p>
        <a href="controllers/planchas.php">Ingresar</a>
    </div>

    <div class="menu-card">
        <img src="assets/img/reportes.png" alt="Reportes">
        <h3>Reportes</h3>
        <p>Genera resultados generales o por facultad.</p>
        <a href="controllers/reportes.php">Ingresar</a>
    </div>
</div>
<?php
}
}
/* {/block "contenido"} */
}

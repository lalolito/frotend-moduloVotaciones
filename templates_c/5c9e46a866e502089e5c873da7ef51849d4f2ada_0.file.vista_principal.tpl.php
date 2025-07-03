<?php
/* Smarty version 4.5.5, created on 2025-07-03 15:42:16
  from 'C:\xampp\htdocs\frotend-moduloVotaciones\templates\vista_principal.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_686688b86c27a8_75193442',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c9e46a866e502089e5c873da7ef51849d4f2ada' => 
    array (
      0 => 'C:\\xampp\\htdocs\\frotend-moduloVotaciones\\templates\\vista_principal.tpl',
      1 => 1751549920,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_686688b86c27a8_75193442 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_222146459686688b86c0ac9_25390036', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout_VP.tpl");
}
/* {block "contenido"} */
class Block_222146459686688b86c0ac9_25390036 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_222146459686688b86c0ac9_25390036',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Administración del Módulo de Votaciones</h2>

<p>Seleccione la sección a la que desea acceder:</p>

<div class="card-container vertical-layout">
    <div class="card full-width">
        <div class="card-content">
            <h3>🗳 Votaciones</h3>
            <p>Administra la creación, modificación y supervisión de procesos de votación.</p>
            <div class="card-actions">
                <a href="controllers/votaciones.php" class="card-button">Ir a Votaciones</a>
            </div>
        </div>
    </div>

    <div class="card full-width">
        <div class="card-content">
            <h3>📋 Planchas</h3>
            <p>Agrega y edita las planchas participantes en los procesos de votación.</p>
            <div class="card-actions">
                <a href="controllers/planchas.php" class="card-button">Ir a Planchas</a>
            </div>
        </div>
    </div>

    <div class="card full-width">
        <div class="card-content">
            <h3>📊 Reportes</h3>
            <p>Descarga informes de escrutinio general y por facultad.</p>
            <div class="card-actions">
                <a href="controllers/reportes.php" class="card-button">Ir a Reportes</a>
            </div>
        </div>
    </div>
</div>
<?php
}
}
/* {/block "contenido"} */
}

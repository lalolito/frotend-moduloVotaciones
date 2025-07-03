<?php
/* Smarty version 4.5.5, created on 2025-07-03 15:42:34
  from 'C:\xampp\htdocs\frotend-moduloVotaciones\templates\reportes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_686688ca353e08_85431493',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '079df7d1bbe4068cbaa5135c01cf3b0feb485e33' => 
    array (
      0 => 'C:\\xampp\\htdocs\\frotend-moduloVotaciones\\templates\\reportes.tpl',
      1 => 1751549920,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_686688ca353e08_85431493 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_333315533686688ca3463c5_09247283', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_333315533686688ca3463c5_09247283 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_333315533686688ca3463c5_09247283',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Reportes de Escrutinio</h2>

<?php if ((isset($_GET['error'])) && $_GET['error'] == "facultad") {?>
    <p style="color: red;">⚠️ Por favor seleccione una facultad para generar el reporte.</p>
<?php }?>

<p>Seleccione el tipo de reporte que desea generar y descargar:</p>

<div style="display: flex; flex-direction: column; gap: 20px; max-width: 400px;">
    <a href="reporte_general.php" class="card-button" style="text-align: center;">📥 Descargar Escrutinio General</a>

    <form method="get" action="reporte_facultad.php">
        <label for="facultad">Seleccionar facultad:</label>
        <select name="facultad" id="facultad" required>
            <option value="">-- Seleccione --</option>
            <option value="Ingeniería">Ingeniería</option>
            <option value="Derecho">Derecho</option>
            <option value="Educación">Educación</option>
            <option value="Arquitectura">Arquitectura</option>
        </select><br><br>
        <button type="submit" class="card-button">📥 Descargar por Facultad</button>
    </form>
</div>
<?php
}
}
/* {/block "contenido"} */
}

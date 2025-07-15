<?php
/* Smarty version 4.5.5, created on 2025-07-15 18:03:32
  from 'C:\Xampp\htdocs\frotend-moduloVotaciones\templates\reportes.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68767bd48e5bd1_14978721',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34dad96f6ac09b806e4736a8d060ec3c00399cf0' => 
    array (
      0 => 'C:\\Xampp\\htdocs\\frotend-moduloVotaciones\\templates\\reportes.tpl',
      1 => 1752269473,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68767bd48e5bd1_14978721 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_196926142668767bd48dbf43_19438513', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_196926142668767bd48dbf43_19438513 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_196926142668767bd48dbf43_19438513',
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

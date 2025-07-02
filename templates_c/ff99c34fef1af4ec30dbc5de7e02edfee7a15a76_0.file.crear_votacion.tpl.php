<?php
/* Smarty version 4.5.5, created on 2025-07-02 22:12:51
  from 'C:\xampp\htdocs\frotend-moduloVotaciones\templates\crear_votacion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_686592c3460de8_23927926',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff99c34fef1af4ec30dbc5de7e02edfee7a15a76' => 
    array (
      0 => 'C:\\xampp\\htdocs\\frotend-moduloVotaciones\\templates\\crear_votacion.tpl',
      1 => 1751487000,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_686592c3460de8_23927926 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_752822412686592c3433998_51406062', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_752822412686592c3433998_51406062 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_752822412686592c3433998_51406062',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Crear Nueva Votación</h2>

<?php if ((isset($_GET['error'])) && $_GET['error'] == "faltan_datos") {?>
    <p style="color: red;">⚠️ Todos los campos del formulario son obligatorios.</p>
    <div class="alert alert-error">
        ⚠️ Todos los campos del formulario son obligatorios.
    </div>
<?php }?>

<form method="post" action="guardar_votacion.php">
    <label>Tipo de votación:</label>
    <select name="tipo_votacion" required>
        <option value="">-- Seleccione --</option>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tipos_votacion']->value, 'tipo');
$_smarty_tpl->tpl_vars['tipo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->value) {
$_smarty_tpl->tpl_vars['tipo']->do_else = false;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
" <?php if (((($tmp = $_GET['tipo_votacion'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp)) == $_smarty_tpl->tpl_vars['tipo']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select><br><br>

    <label>Facultad:</label>
    <select name="facultad" required>
        <option value="">-- Seleccione --</option>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['facultades']->value, 'facultad');
$_smarty_tpl->tpl_vars['facultad']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['facultad']->value) {
$_smarty_tpl->tpl_vars['facultad']->do_else = false;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['facultad']->value;?>
" <?php if (((($tmp = $_GET['facultad'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp)) == $_smarty_tpl->tpl_vars['facultad']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['facultad']->value;?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select><br><br>

    <label>Fecha de inicio:</label>
    <input type="datetime-local" name="fecha_inicio" value="<?php echo (($tmp = $_GET['fecha_inicio'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required><br><br>

    <label>Fecha de fin:</label>
    <input type="datetime-local" name="fecha_fin" value="<?php echo (($tmp = $_GET['fecha_fin'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
" required><br><br>

    <button type="submit">Guardar Votación</button>
</form>
<?php
}
}
/* {/block "contenido"} */
}

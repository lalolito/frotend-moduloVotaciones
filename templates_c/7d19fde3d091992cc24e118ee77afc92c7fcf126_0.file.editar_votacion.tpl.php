<?php
/* Smarty version 4.5.5, created on 2025-07-02 18:23:39
  from 'C:\xampp\htdocs\front\templates\editar_votacion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68655d0b50d984_24627512',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d19fde3d091992cc24e118ee77afc92c7fcf126' => 
    array (
      0 => 'C:\\xampp\\htdocs\\front\\templates\\editar_votacion.tpl',
      1 => 1751473409,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68655d0b50d984_24627512 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_117266698868655d0b4e30e2_37461380', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_117266698868655d0b4e30e2_37461380 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_117266698868655d0b4e30e2_37461380',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Editar Votación</h2>

<?php if ((isset($_GET['error'])) && $_GET['error'] == "faltan_datos") {?>
    <p style="color: red;">⚠️ Todos los campos del formulario son obligatorios.</p>
<?php }?>

<form method="post" action="actualizar_votacion.php">
    <input type="hidden" name="id" value="<?php echo (($tmp = $_GET['id'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['votacion']->value['id'] ?? null : $tmp);?>
">

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
" <?php if (((($tmp = $_GET['tipo_votacion'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['votacion']->value['tipo'] ?? null : $tmp)) == $_smarty_tpl->tpl_vars['tipo']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
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
" <?php if (((($tmp = $_GET['facultad'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['votacion']->value['facultad'] ?? null : $tmp)) == $_smarty_tpl->tpl_vars['facultad']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['facultad']->value;?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select><br><br>

    <label>Fecha de inicio:</label>
    <input type="datetime-local" name="fecha_inicio" value="<?php echo (($tmp = $_GET['fecha_inicio'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['votacion']->value['inicio'] ?? null : $tmp);?>
" required><br><br>

    <label>Fecha de fin:</label>
    <input type="datetime-local" name="fecha_fin" value="<?php echo (($tmp = $_GET['fecha_fin'] ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['votacion']->value['fin'] ?? null : $tmp);?>
" required><br><br>

    <button type="submit">Actualizar Votación</button>
</form>
<?php
}
}
/* {/block "contenido"} */
}

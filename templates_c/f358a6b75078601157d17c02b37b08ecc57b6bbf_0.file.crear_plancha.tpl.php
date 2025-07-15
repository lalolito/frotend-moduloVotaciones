<?php
/* Smarty version 4.5.5, created on 2025-07-15 18:02:57
  from 'C:\Xampp\htdocs\frotend-moduloVotaciones\templates\crear_plancha.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68767bb1e4f245_49826152',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f358a6b75078601157d17c02b37b08ecc57b6bbf' => 
    array (
      0 => 'C:\\Xampp\\htdocs\\frotend-moduloVotaciones\\templates\\crear_plancha.tpl',
      1 => 1752269473,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68767bb1e4f245_49826152 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_173617468668767bb1e3f449_94163953', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_173617468668767bb1e3f449_94163953 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_173617468668767bb1e3f449_94163953',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Crear Nueva Plancha</h2>

<form method="post" action="guardar_plancha.php" enctype="multipart/form-data">
    <label>Nombre de la plancha:</label>
    <input type="text" name="nombre" required><br><br>

    <label>Votación asociada:</label>
    <select name="votacion_id" required>
        <option value="">-- Seleccione una votación --</option>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['votaciones']->value, 'votacion');
$_smarty_tpl->tpl_vars['votacion']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['votacion']->value) {
$_smarty_tpl->tpl_vars['votacion']->do_else = false;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['votacion']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['votacion']->value['nombre'];?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select><br><br>

    <label>Imagen de la plancha:</label>
    <input type="file" name="imagen" accept="image/*" required><br><br>

    <button type="submit">Guardar Plancha</button>
</form>
<?php
}
}
/* {/block "contenido"} */
}

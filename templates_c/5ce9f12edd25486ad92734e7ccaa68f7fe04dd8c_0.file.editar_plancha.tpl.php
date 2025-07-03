<?php
/* Smarty version 4.5.5, created on 2025-07-02 22:39:31
  from 'C:\xampp\htdocs\frotend-moduloVotaciones\templates\editar_plancha.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_686599034ada56_34507221',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ce9f12edd25486ad92734e7ccaa68f7fe04dd8c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\frotend-moduloVotaciones\\templates\\editar_plancha.tpl',
      1 => 1751488350,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_686599034ada56_34507221 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6754956886865990349e8d7_09558505', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_6754956886865990349e8d7_09558505 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_6754956886865990349e8d7_09558505',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Editar Plancha</h2>

<form method="post" action="actualizar_plancha.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['plancha']->value['id'];?>
">

    <label>Nombre de la plancha:</label>
    <input type="text" name="nombre" value="<?php echo $_smarty_tpl->tpl_vars['plancha']->value['nombre'];?>
" required><br><br>

    <p><strong>Votación asociada:</strong> <?php echo $_smarty_tpl->tpl_vars['plancha']->value['votacion'];?>
</p><br>

    <label>Imagen actual:</label><br>
    <img src="<?php echo $_smarty_tpl->tpl_vars['plancha']->value['imagen'];?>
" alt="Imagen actual" style="width: 200px; height: auto;"><br><br>

    <label>Subir nueva imagen (opcional):</label>
    <input type="file" name="imagen" accept="image/*"><br><br>

    <button type="submit">Actualizar Plancha</button>
</form>
<?php
}
}
/* {/block "contenido"} */
}

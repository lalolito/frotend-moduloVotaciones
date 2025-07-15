<?php
/* Smarty version 4.5.5, created on 2025-07-15 22:26:55
  from 'C:\Xampp\htdocs\frotend-moduloVotaciones\templates\editar_plancha.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6876b98fd8b930_71810751',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38ec2d8dfd5d64e1497a6504f88c9c53ec91308e' => 
    array (
      0 => 'C:\\Xampp\\htdocs\\frotend-moduloVotaciones\\templates\\editar_plancha.tpl',
      1 => 1752611177,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6876b98fd8b930_71810751 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5981066676876b98fd724f4_13053121', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_5981066676876b98fd724f4_13053121 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_5981066676876b98fd724f4_13053121',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Editar Plancha</h2>

<form method="post" action="actualizar_plancha.php" enctype="multipart/form-data">
    <!-- ID de la plancha -->
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['plancha']->value['ID_OPCION_PREGUNTA'];?>
">
    <!-- URL actual de la imagen -->
    <input type="hidden" name="url_actual" value="<?php echo $_smarty_tpl->tpl_vars['plancha']->value['URL'];?>
">

    <!-- Nombre -->
    <label>Nombre de la plancha:</label>
    <input type="text" name="nombre" value="<?php echo $_smarty_tpl->tpl_vars['plancha']->value['OPCION'];?>
" required><br><br>

    <!-- Pregunta asociada -->
    <label>Pregunta asociada:</label>
    <select name="pregunta" required>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['preguntas']->value, 'preg');
$_smarty_tpl->tpl_vars['preg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['preg']->value) {
$_smarty_tpl->tpl_vars['preg']->do_else = false;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['preg']->value['ID_PREGUNTA'];?>
" <?php if ($_smarty_tpl->tpl_vars['preg']->value['ID_PREGUNTA'] == $_smarty_tpl->tpl_vars['plancha']->value['id_pregunta']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['preg']->value['PREGUNTA'];?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select><br><br>

    <!-- Tipo de solicitud -->
    <label>Tipo de solicitud:</label>
    <select name="tipo" required>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tipos']->value, 'tipo');
$_smarty_tpl->tpl_vars['tipo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->value) {
$_smarty_tpl->tpl_vars['tipo']->do_else = false;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['tipo']->value['ID_TIPO_SOLICITUD'];?>
" <?php if ($_smarty_tpl->tpl_vars['tipo']->value['ID_TIPO_SOLICITUD'] == $_smarty_tpl->tpl_vars['plancha']->value['id_tipo']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['tipo']->value['TIPO_SOLICITUD'];?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select><br><br>

    <!-- Imagen actual -->
    <label>Imagen actual:</label><br>
    <img src="<?php echo $_smarty_tpl->tpl_vars['plancha']->value['URL'];?>
" alt="Imagen actual" style="width: 200px;"><br><br>

    <!-- Subir nueva imagen -->
    <label>Subir nueva imagen (opcional):</label>
    <input type="file" name="imagen" accept="image/*"><br><br>

    <button type="submit">Actualizar Plancha</button>
</form>
<?php
}
}
/* {/block "contenido"} */
}

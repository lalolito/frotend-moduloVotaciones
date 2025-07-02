<?php
/* Smarty version 4.5.5, created on 2025-07-02 22:15:11
  from 'C:\xampp\htdocs\front\templates\planchas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6865934fd40a41_46258825',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a554ef797902e1101cee0524e0b563b3be1d682' => 
    array (
      0 => 'C:\\xampp\\htdocs\\front\\templates\\planchas.tpl',
      1 => 1751487296,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6865934fd40a41_46258825 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18467015226865934fc1bf11_27934917', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_18467015226865934fc1bf11_27934917 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_18467015226865934fc1bf11_27934917',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Listado de Planchas</h2>

<?php if ((isset($_GET['mensaje']))) {?>
    <?php if ($_GET['mensaje'] == "creada") {?>
        <p style="color: green;">✅ Plancha creada exitosamente.</p>
    <?php } elseif ($_GET['mensaje'] == "actualizada") {?>
        <p style="color: green;">✅ Plancha actualizada correctamente.</p>
    <?php } elseif ($_GET['mensaje'] == "eliminada") {?>
        <p style="color: green;">🗑 Plancha eliminada correctamente.</p>
    <?php }
}?>

<?php if ((isset($_GET['error']))) {?>
    <?php if ($_GET['error'] == "campos") {?>
        <p style="color: red;">⚠️ Todos los campos son obligatorios.</p>
    <?php } elseif ($_GET['error'] == "upload") {?>
        <p style="color: red;">⚠️ Error al subir la imagen de la plancha.</p>
    <?php } elseif ($_GET['error'] == "sin_id") {?>
        <p style="color: red;">⚠️ No se especificó qué plancha eliminar.</p>
    <?php }
}?>

<a href="crear_plancha.php">
    <button style="margin-bottom: 20px;">+ Nueva Plancha</button>
</a>

<div class="card-container vertical-layout">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['planchas']->value, 'plancha');
$_smarty_tpl->tpl_vars['plancha']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plancha']->value) {
$_smarty_tpl->tpl_vars['plancha']->do_else = false;
?>
    <div class="card full-width">
        <img src="<?php echo $_smarty_tpl->tpl_vars['plancha']->value['imagen'];?>
" alt="Plancha <?php echo $_smarty_tpl->tpl_vars['plancha']->value['nombre'];?>
" class="card-img">
        <div class="card-content">
            <h3><?php echo $_smarty_tpl->tpl_vars['plancha']->value['nombre'];?>
</h3>
            <p><strong>Votación:</strong> <?php echo $_smarty_tpl->tpl_vars['plancha']->value['votacion'];?>
</p>
            <div class="card-actions">
                <a href="editar_plancha.php?id=<?php echo $_smarty_tpl->tpl_vars['plancha']->value['id'];?>
" class="card-button">✏️ Editar</a>
                <a href="eliminar_plancha.php?id=<?php echo $_smarty_tpl->tpl_vars['plancha']->value['id'];?>
" class="card-button danger" onclick="return confirm('¿Deseas eliminar esta plancha?')">🗑 Eliminar</a>
            </div>
        </div>
    </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<?php
}
}
/* {/block "contenido"} */
}

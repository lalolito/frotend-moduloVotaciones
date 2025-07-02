<?php
/* Smarty version 4.5.5, created on 2025-07-02 17:56:41
  from 'C:\xampp\htdocs\front\templates\votaciones.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_686556b9d38631_89974229',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14fcbf16bff7cd989412f46bdaad470102902afd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\front\\templates\\votaciones.tpl',
      1 => 1751471262,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_686556b9d38631_89974229 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2109651391686556b9b277c3_45023437', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_2109651391686556b9b277c3_45023437 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_2109651391686556b9b277c3_45023437',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Listado de Votaciones</h2>

<?php if ((isset($_GET['mensaje']))) {?>
    <?php if ($_GET['mensaje'] == "creada") {?>
        <p style="color: green;">✅ Votación creada exitosamente.</p>
    <?php } elseif ($_GET['mensaje'] == "actualizada") {?>
        <p style="color: green;">✅ Votación actualizada correctamente.</p>
    <?php } elseif ($_GET['mensaje'] == "eliminada") {?>
        <p style="color: green;">✅ Votación eliminada.</p>
    <?php }
}?>

<?php if ((isset($_GET['error']))) {?>
    <?php if ($_GET['error'] == "campos") {?>
        <p style="color: red;">⚠️ Por favor completa todos los campos.</p>
    <?php } elseif ($_GET['error'] == "sin_id") {?>
        <p style="color: red;">⚠️ No se especificó la votación a eliminar.</p>
    <?php } elseif ($_GET['error'] == "faltan_datos") {?>
        <p style="color: red;">⚠️ Todos los campos del formulario son obligatorios.</p>
    <?php }
}?>

<a href="crear_votacion.php"><button>+ Nueva Votación</button></a>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo de Votación</th>
            <th>Facultad</th>
            <th>Fecha Inicio</th>
            <th>Fecha Fin</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['votaciones']->value, 'votacion');
$_smarty_tpl->tpl_vars['votacion']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['votacion']->value) {
$_smarty_tpl->tpl_vars['votacion']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['votacion']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['votacion']->value['tipo'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['votacion']->value['facultad'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['votacion']->value['inicio'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['votacion']->value['fin'];?>
</td>
            <td>
                <a href="editar_votacion.php?id=<?php echo $_smarty_tpl->tpl_vars['votacion']->value['id'];?>
"><button>Editar</button></a>
                <a href="eliminar_votacion.php?id=<?php echo $_smarty_tpl->tpl_vars['votacion']->value['id'];?>
" onclick="return confirm('¿Deseas eliminar esta votación?')"><button>Eliminar</button></a>
            </td>
        </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
<?php
}
}
/* {/block "contenido"} */
}

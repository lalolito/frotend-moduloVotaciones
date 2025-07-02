<?php
/* Smarty version 4.5.5, created on 2025-07-02 22:12:31
  from 'C:\xampp\htdocs\frotend-moduloVotaciones\templates\votaciones.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_686592af1851c5_22891010',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a9a50ca42ffbc1f7f8db5db3d289ae5f9eaa272' => 
    array (
      0 => 'C:\\xampp\\htdocs\\frotend-moduloVotaciones\\templates\\votaciones.tpl',
      1 => 1751487147,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_686592af1851c5_22891010 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_201001033686592af14acf9_56223404', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_201001033686592af14acf9_56223404 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_201001033686592af14acf9_56223404',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Listado de Votaciones</h2>

<?php if ((isset($_GET['mensaje']))) {?>
    <?php if ($_GET['mensaje'] == "creada") {?>
        <div class="alert alert-success">✅ Votación creada exitosamente.</div>
    <?php } elseif ($_GET['mensaje'] == "actualizada") {?>
        <div class="alert alert-success">✅ Votación actualizada correctamente.</div>
    <?php } elseif ($_GET['mensaje'] == "eliminada") {?>
        <div class="alert alert-success">✅ Votación eliminada.</div>
    <?php }
}?>

<?php if ((isset($_GET['error']))) {?>
    <?php if ($_GET['error'] == "campos") {?>
        <div class="alert alert-error">⚠️ Por favor completa todos los campos.</div>
    <?php } elseif ($_GET['error'] == "sin_id") {?>
        <div class="alert alert-error">⚠️ No se especificó la votación a eliminar.</div>
    <?php } elseif ($_GET['error'] == "faltan_datos") {?>
        <div class="alert alert-error">⚠️ Todos los campos del formulario son obligatorios.</div>
    <?php }
}
echo '<script'; ?>
>
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(alert => {
            alert.style.display = 'none';
        });
    }, 5000); // Oculta en 5 segundos
<?php echo '</script'; ?>
>

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

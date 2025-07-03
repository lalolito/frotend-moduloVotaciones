<?php
/* Smarty version 4.5.5, created on 2025-07-03 18:46:00
  from 'C:\xampp\htdocs\frotend-moduloVotaciones\templates\planchas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6866b3c87ffdc2_07774141',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ee21be66ed48b8b0fe5def76bc498aebb020769' => 
    array (
      0 => 'C:\\xampp\\htdocs\\frotend-moduloVotaciones\\templates\\planchas.tpl',
      1 => 1751561157,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6866b3c87ffdc2_07774141 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18961112726866b3c87e5f78_61326305', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_18961112726866b3c87e5f78_61326305 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_18961112726866b3c87e5f78_61326305',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Listado de Planchas</h2>
<a href="crear_plancha.php"><button class="btn">+ Nueva Plancha</button></a>

<div class="card-container">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['planchas']->value, 'plancha');
$_smarty_tpl->tpl_vars['plancha']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plancha']->value) {
$_smarty_tpl->tpl_vars['plancha']->do_else = false;
?>
    <div class="card">
        <img class="card-img" src="<?php echo $_smarty_tpl->tpl_vars['plancha']->value['imagen'];?>
" alt="Plancha <?php echo $_smarty_tpl->tpl_vars['plancha']->value['nombre'];?>
">

        <div class="card-content">
            <h4><?php echo $_smarty_tpl->tpl_vars['plancha']->value['nombre'];?>
</h4>
            <p><strong>Votación:</strong> <?php echo $_smarty_tpl->tpl_vars['plancha']->value['votacion'];?>
</p>

            <div class="card-actions">
                <a href="editar_plancha.php?id=<?php echo $_smarty_tpl->tpl_vars['plancha']->value['id'];?>
" class="card-button">Editar</a>
                <a href="eliminar_plancha.php?id=<?php echo $_smarty_tpl->tpl_vars['plancha']->value['id'];?>
" class="card-button danger" onclick="return confirm('¿Deseas eliminar esta plancha?')">Eliminar</a>
            </div>
        </div>

<?php if ((isset($_smarty_tpl->tpl_vars['plancha']->value['principal'])) || (isset($_smarty_tpl->tpl_vars['plancha']->value['suplente']))) {?>
        <div class="card-photos">
            <?php if ($_smarty_tpl->tpl_vars['plancha']->value['principal']) {?>
            <div>
                <img src="<?php echo $_smarty_tpl->tpl_vars['plancha']->value['principal'];?>
" alt="Principal">
                <div class="label">Principal</div>
            </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['plancha']->value['suplente']) {?>
            <div>
                <img src="<?php echo $_smarty_tpl->tpl_vars['plancha']->value['suplente'];?>
" alt="Suplente">
                <div class="label">Suplente</div>
            </div>
            <?php }?>
        </div>
        <?php }?>
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

<?php
/* Smarty version 4.5.5, created on 2025-07-17 23:19:54
  from 'C:\xampp\htdocs\frotend-moduloVotaciones\templates\seleccion_tipo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_687968fa7077e5_17905324',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '06c4c0e62fb6590e851c73c0ea253cd8317d78a5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\frotend-moduloVotaciones\\templates\\seleccion_tipo.tpl',
      1 => 1752787192,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_687968fa7077e5_17905324 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1444158782687968fa6cbed8_82016762', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_1444158782687968fa6cbed8_82016762 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_1444158782687968fa6cbed8_82016762',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <h2>Bienvenido, <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['nombre']->value, ENT_QUOTES, 'UTF-8', true);?>
 👋</h2>
  <h3>Facultad de <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['nombre_facultad']->value, ENT_QUOTES, 'UTF-8', true);?>
</h3>
  <h4>Selecciona el tipo de elección:</h4>

  <div class="opciones-eleccion">
    <?php if ($_smarty_tpl->tpl_vars['rol']->value == 'Estudiante') {?>
      <form method="post" action="vista_usuario.php">
        <input type="hidden" name="tipo" value="estudiantil">
        <button class="btn-opcion">Consejo Estudiantil</button>
      </form>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['rol']->value == 'Estudiante' || $_smarty_tpl->tpl_vars['rol']->value == 'Docente') {?>
      <form method="post" action="vista_usuario.php">
        <input type="hidden" name="tipo" value="docentes">
        <button class="btn-opcion">Representante de Docentes</button>
      </form>
    <?php }?>
  </div>
<?php
}
}
/* {/block "contenido"} */
}

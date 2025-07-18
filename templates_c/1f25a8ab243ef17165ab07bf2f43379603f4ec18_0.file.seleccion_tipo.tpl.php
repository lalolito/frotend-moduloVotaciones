<?php
/* Smarty version 4.5.5, created on 2025-07-18 16:52:54
  from 'C:\Xampp\htdocs\frotend-moduloVotaciones\templates\seleccion_tipo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_687a5fc6442a23_05525330',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f25a8ab243ef17165ab07bf2f43379603f4ec18' => 
    array (
      0 => 'C:\\Xampp\\htdocs\\frotend-moduloVotaciones\\templates\\seleccion_tipo.tpl',
      1 => 1752850313,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_687a5fc6442a23_05525330 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_272919444687a5fc642bb92_28948129', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_272919444687a5fc642bb92_28948129 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_272919444687a5fc642bb92_28948129',
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

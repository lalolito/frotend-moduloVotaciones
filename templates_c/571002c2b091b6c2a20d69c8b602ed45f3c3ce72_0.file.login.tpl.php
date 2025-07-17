<?php
/* Smarty version 4.5.5, created on 2025-07-17 17:49:04
  from 'C:\xampp\htdocs\frotend-moduloVotaciones\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68791b70dd3060_98679179',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '571002c2b091b6c2a20d69c8b602ed45f3c3ce72' => 
    array (
      0 => 'C:\\xampp\\htdocs\\frotend-moduloVotaciones\\templates\\login.tpl',
      1 => 1752767341,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68791b70dd3060_98679179 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_151827984468791b70dbcba9_14602141', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout_VP.tpl");
}
/* {block "contenido"} */
class Block_151827984468791b70dbcba9_14602141 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_151827984468791b70dbcba9_14602141',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Iniciar Sesión</h2>

<?php if ((isset($_GET['error']))) {?>
  <div class="mensaje-notificacion error">
    <?php if ($_GET['error'] == "datos") {?>
      ❌ Usuario o contraseña incorrectos.
    <?php } elseif ($_GET['error'] == "campos") {?>
      ⚠️ Por favor completa todos los campos.
    <?php }?>
  </div>
<?php }?>

<form method="post" action="views/login.php" class="form-login">
  <div class="form-group">
    <label for="usuario">Usuario o Correo:</label>
    <input type="text" id="usuario" name="usuario" required>
  </div>

  <div class="form-group">
    <label for="clave">Contraseña:</label>
    <input type="password" id="clave" name="clave" required>
  </div>

  <div class="form-actions">
    <button type="submit" class="btn">Iniciar Sesión</button>
  </div>
</form>
<?php
}
}
/* {/block "contenido"} */
}

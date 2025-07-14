<?php
/* Smarty version 4.5.5, created on 2025-07-14 15:54:47
  from 'C:\Xampp\htdocs\frotend-moduloVotaciones\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68750c270b3048_93299410',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3f9b719bae8ef3ced027accf2719b5fb1f803fd' => 
    array (
      0 => 'C:\\Xampp\\htdocs\\frotend-moduloVotaciones\\templates\\login.tpl',
      1 => 1752269473,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68750c270b3048_93299410 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_25912798868750c27080669_67625125', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout_VP.tpl");
}
/* {block "contenido"} */
class Block_25912798868750c27080669_67625125 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_25912798868750c27080669_67625125',
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

<form method="post" action="controllers/login.php" class="form-login">
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

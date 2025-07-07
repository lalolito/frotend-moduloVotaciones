<?php
/* Smarty version 4.5.5, created on 2025-07-07 22:25:33
  from 'C:\xampp\htdocs\frotend-moduloVotaciones\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_686c2d3dc538c7_20127430',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3d4590d09715a2b5314823115f0719f89d4be4a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\frotend-moduloVotaciones\\templates\\header.tpl',
      1 => 1751919930,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_686c2d3dc538c7_20127430 (Smarty_Internal_Template $_smarty_tpl) {
?><header>
  <div class="logo">
    <img src="../assets/img/ugc.png" alt="Logo Universidad">
  </div>

  <h1>Módulo de Administración de Votaciones</h1>

  <?php if ((isset($_smarty_tpl->tpl_vars['usuario']->value))) {?>
    <div class="perfil-usuario">
      <span>👤Usuario <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
</span>
      <a href="../index.php" class="btn btn-salir">Salir</a>
    </div>
  <?php }?>
</header>
<?php }
}

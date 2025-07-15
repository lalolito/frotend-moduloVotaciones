<?php
/* Smarty version 4.5.5, created on 2025-07-15 16:11:29
  from 'C:\Xampp\htdocs\frotend-moduloVotaciones\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6876619105a933_80995798',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6e212caccb11e440e034b6464e759223f6309f04' => 
    array (
      0 => 'C:\\Xampp\\htdocs\\frotend-moduloVotaciones\\templates\\header.tpl',
      1 => 1752269473,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6876619105a933_80995798 (Smarty_Internal_Template $_smarty_tpl) {
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

<?php
/* Smarty version 4.5.5, created on 2025-07-07 22:54:24
  from 'C:\xampp\htdocs\frotend-moduloVotaciones\templates\vista_usuario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_686c34008c0e20_29546661',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5638a680f52f9a50d29dd277e53e93e1d1e22641' => 
    array (
      0 => 'C:\\xampp\\htdocs\\frotend-moduloVotaciones\\templates\\vista_usuario.tpl',
      1 => 1751921663,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_686c34008c0e20_29546661 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2024548717686c34008bc481_94874424', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout_VU.tpl");
}
/* {block "contenido"} */
class Block_2024548717686c34008bc481_94874424 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_2024548717686c34008bc481_94874424',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h2>Bienvenido, <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
</h2>

<div class="card-container horizontal-layout">
  <div class="card" onclick="abrirModalPlancha()">
    <img src="../assets/img/plancha.png" alt="Planchas" class="card-icon" />
    <h3>Planchas</h3>
    <p>Consulta los candidatos y selecciona tu voto.</p>
    <button class="card-button">Ver Planchas</button>
  </div>
</div>

<!-- Modal emergente -->
<div id="modalPlancha" class="modal">
  <div class="modal-contenido">
    <span class="cerrar" onclick="cerrarModal()">&times;</span>
    <h2>Plancha Renovación</h2>
    <img src="../assets/img/plancha.png" class="img-modal" alt="Plancha">
    <p><strong>Facultad:</strong> Ingeniería</p>
    <p><strong>Candidato principal:</strong> Javier Muñoz</p>
    <p><strong>Suplente:</strong> Juan Rivera</p>
    <button class="card-button">Votar</button>
  </div>
</div>

<?php
}
}
/* {/block "contenido"} */
}

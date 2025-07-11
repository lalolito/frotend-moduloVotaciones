<?php
/* Smarty version 4.5.5, created on 2025-07-11 19:41:01
  from 'C:\xampp\htdocs\frotend-moduloVotaciones\templates\crear_votacion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68714cad0458b0_51215570',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff99c34fef1af4ec30dbc5de7e02edfee7a15a76' => 
    array (
      0 => 'C:\\xampp\\htdocs\\frotend-moduloVotaciones\\templates\\crear_votacion.tpl',
      1 => 1752255658,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68714cad0458b0_51215570 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_136449999968714cad01aa65_28384122', "contenido");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_136449999968714cad01aa65_28384122 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_136449999968714cad01aa65_28384122',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Crear Nueva Votación</h2>

<?php if ((isset($_GET['error'])) && $_GET['error'] == "faltan_datos") {?>
    <div class="alert alert-error">
        ⚠️ Todos los campos del formulario son obligatorios.
    </div>
<?php }?>

<?php if ((isset($_GET['error'])) && $_GET['error'] == "error_sistema") {?>
    <div class="alert alert-error">
        ⚠️ <?php echo (($tmp = $_GET['mensaje'] ?? null)===null||$tmp==='' ? "Error del sistema" ?? null : $tmp);?>

    </div>
<?php }?>

<?php if ((isset($_smarty_tpl->tpl_vars['error_mensaje']->value))) {?>
    <div class="alert alert-error">
        ⚠️ <?php echo $_smarty_tpl->tpl_vars['error_mensaje']->value;?>

    </div>
<?php }?>


<form method="post" action="crear_votacion.php">
    
    <!-- Campos normales -->
    <label>Tipo de votación:</label>
    <select name="tipo_votacion" required>
        <option value="">-- Seleccione --</option>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tipos_votacion']->value, 'tipo');
$_smarty_tpl->tpl_vars['tipo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->value) {
$_smarty_tpl->tpl_vars['tipo']->do_else = false;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
" <?php if (((($tmp = $_GET['tipo_votacion'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp)) == $_smarty_tpl->tpl_vars['tipo']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select><br><br>

    <label>Facultad:</label>
    <select name="facultad" required>
        <option value="">-- Seleccione --</option>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['facultades']->value, 'facultad');
$_smarty_tpl->tpl_vars['facultad']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['facultad']->value) {
$_smarty_tpl->tpl_vars['facultad']->do_else = false;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['facultad']->value;?>
" <?php if (((($tmp = $_GET['facultad'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp)) == $_smarty_tpl->tpl_vars['facultad']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['facultad']->value;?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select><br><br>

    <label>Fecha de inicio:</label><br>
<input type="datetime-local" name="fecha_inicio"
       value="<?php echo '<?php'; ?>
 echo isset($_GET['fecha_inicio']) && strpos($_GET['fecha_inicio'], ' ') !== false ? smarty_modifier_truncate(smarty_modifier_replace($_GET['fecha_inicio'],' ','T'),16,'') : ''; <?php echo '?>'; ?>
"
       required><br><br>

<label>Fecha de fin:</label><br>
<input type="datetime-local" name="fecha_fin"
       value="<?php echo '<?php'; ?>
 echo isset($_GET['fecha_fin']) && strpos($_GET['fecha_fin'], ' ') !== false ? smarty_modifier_truncate(smarty_modifier_replace($_GET['fecha_fin'],' ','T'),16,'') : ''; <?php echo '?>'; ?>
"
       required><br><br>




    <button type="submit">Guardar Votación</button>
</form>

<?php echo '<script'; ?>
>
function toggleIdManual() {
    const checkbox = document.getElementById('usar_id_manual');
    const campoId = document.getElementById('campo_id_manual');
    const inputId = document.getElementById('id_tipo_solicitud');
    
    if (checkbox.checked) {
        campoId.style.display = 'block';
        inputId.required = false;
    } else {
        campoId.style.display = 'none';
        inputId.value = '';
        inputId.required = false;
    }
}

// Mantener el estado si viene con error
<?php if ((isset($_GET['id_tipo_solicitud'])) && $_GET['id_tipo_solicitud'] != '') {?>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('usar_id_manual').checked = true;
    toggleIdManual();
});
<?php }
echo '</script'; ?>
>

<?php
}
}
/* {/block "contenido"} */
}

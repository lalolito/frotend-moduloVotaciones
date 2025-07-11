<?php
/* Smarty version 4.5.5, created on 2025-07-11 19:38:26
  from 'C:\xampp\htdocs\frotend-moduloVotaciones\templates\editar_votacion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68714c12319a52_05117756',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '33f83dcc24be1fec218a081dfd1eb032d47dadb2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\frotend-moduloVotaciones\\templates\\editar_votacion.tpl',
      1 => 1752255154,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68714c12319a52_05117756 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_64903289668714c122eb348_13674213', "contenido");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_64903289668714c122eb348_13674213 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_64903289668714c122eb348_13674213',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\frotend-moduloVotaciones\\libs\\plugins\\modifier.replace.php','function'=>'smarty_modifier_replace',),1=>array('file'=>'C:\\xampp\\htdocs\\frotend-moduloVotaciones\\libs\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>

<h2>Editar Votación</h2>

<?php if ((isset($_smarty_tpl->tpl_vars['error_mensaje']->value))) {?>
    <div class="mensaje-notificacion error">
        ⚠️ <?php echo $_smarty_tpl->tpl_vars['error_mensaje']->value;?>

    </div>
<?php }?>

<form method="post" action="actualizar_votacion.php">
    <input type="hidden" name="id_tipo_solicitud" value="<?php echo $_smarty_tpl->tpl_vars['votacion']->value['id'];?>
">
    <input type="hidden" name="agrupador_original" value="<?php echo $_smarty_tpl->tpl_vars['votacion']->value['agrupador'];?>
">
    
    <!-- Información actual -->
    <div style="background-color: #f8f9fa; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
        <h3>📊 Información Actual</h3>
        <p><strong>ID:</strong> <?php echo $_smarty_tpl->tpl_vars['votacion']->value['id'];?>
</p>
        <p><strong>Agrupador actual:</strong> <code><?php echo $_smarty_tpl->tpl_vars['votacion']->value['agrupador'];?>
</code></p>
        <p><strong>Tipo dependiente:</strong> <?php echo $_smarty_tpl->tpl_vars['votacion']->value['tipo_dependiente'];?>
</p>
    </div>
    
    <label>Tipo de votación:</label>
    <select name="tipo_solicitud" required>
        <option value="">-- Seleccione --</option>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tipos_votacion']->value, 'tipo');
$_smarty_tpl->tpl_vars['tipo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->value) {
$_smarty_tpl->tpl_vars['tipo']->do_else = false;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['votacion']->value['tipo'] == $_smarty_tpl->tpl_vars['tipo']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select><br><br>
    
    <label>Tipo de dependiente:</label>
    <select name="tipo_dependiente" required>
        <option value="">-- Seleccione --</option>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tipos_dependiente']->value, 'tipo_dep');
$_smarty_tpl->tpl_vars['tipo_dep']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tipo_dep']->value) {
$_smarty_tpl->tpl_vars['tipo_dep']->do_else = false;
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['tipo_dep']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['votacion']->value['tipo_dependiente'] == $_smarty_tpl->tpl_vars['tipo_dep']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['tipo_dep']->value;?>
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
" <?php if ($_smarty_tpl->tpl_vars['votacion']->value['facultad'] == $_smarty_tpl->tpl_vars['facultad']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['facultad']->value;?>
</option>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select><br><br>

  <input type="datetime-local" name="fecha_inicio" value="<?php echo smarty_modifier_truncate(smarty_modifier_replace($_smarty_tpl->tpl_vars['votacion']->value['inicio'],' ','T'),16,'');?>
" required>
<input type="datetime-local" name="fecha_fin" value="<?php echo smarty_modifier_truncate(smarty_modifier_replace($_smarty_tpl->tpl_vars['votacion']->value['fin'],' ','T'),16,'');?>
" required>

    
    <!-- Campo oculto para ID_TIPO_DEPENDIENTE si existe -->
    <?php if ((isset($_smarty_tpl->tpl_vars['votacion']->value['id_tipo_dependiente'])) && $_smarty_tpl->tpl_vars['votacion']->value['id_tipo_dependiente']) {?>
        <input type="hidden" name="id_tipo_dependiente" value="<?php echo $_smarty_tpl->tpl_vars['votacion']->value['id_tipo_dependiente'];?>
">
    <?php }?>

    <!-- Preview del nuevo agrupador -->
    <div id="agrupador-preview" style="margin: 15px 0; padding: 10px; background-color: #e7f3ff; border: 1px solid #b3d9ff; border-radius: 4px;">
        <strong>🏷️ Nuevo agrupador:</strong> <span id="agrupador-text"><?php echo $_smarty_tpl->tpl_vars['votacion']->value['agrupador'];?>
</span>
        <input type="hidden" name="agrupador" id="agrupador" value="<?php echo $_smarty_tpl->tpl_vars['votacion']->value['agrupador'];?>
">
    </div>

    <button type="submit">Actualizar Votación</button>
    <a href="votaciones.php"><button type="button">Cancelar</button></a>
</form>

<?php echo '<script'; ?>
>
// Función para limpiar URL si hay parámetros de error
document.addEventListener('DOMContentLoaded', function() {
    <?php if ((isset($_smarty_tpl->tpl_vars['limpiar_url']->value)) && $_smarty_tpl->tpl_vars['limpiar_url']->value) {?>
    // Limpiar URL después de mostrar el mensaje de error
    setTimeout(() => {
        // Fade out del mensaje
        const mensajes = document.querySelectorAll('.mensaje-notificacion');
        mensajes.forEach(mensaje => {
            mensaje.style.transition = 'opacity 0.5s';
            mensaje.style.opacity = '0';
            
            setTimeout(() => {
                mensaje.style.display = 'none';
            }, 500);
        });
        
        // Limpiar URL manteniendo solo el ID
        setTimeout(() => {
            const baseUrl = window.location.protocol + "//" + 
                           window.location.host + window.location.pathname;
            const newUrl = baseUrl + "?id=<?php echo $_smarty_tpl->tpl_vars['votacion']->value['id'];?>
";
            window.history.replaceState({}, document.title, newUrl);
        }, 500);
        
    }, 3000); // 3 segundos para leer el mensaje
    <?php }?>
});

// Mapeo de facultades a códigos
const facultadesMap = {
    'Ingeniería': 'ING',
    'Derecho': 'DER',
    'Educación': 'EDU',
    'Arquitectura': 'ARQ',
    'Economía': 'ECO',
    'Salud': 'SAL',
    'Medicina': 'MED',
    'Administración': 'ADM',
    'Ciencias': 'CIE',
    'Ciencias Sociales': 'SOC'
};

// Mapeo de tipos de dependiente a códigos
const tiposDependienteMap = {
    'Estudiante': 'E',
    'Docente': 'D',
    'Administrativo': 'A'
};

// Generar agrupador automáticamente
function generarAgrupador() {
    const tipoDependiente = document.querySelector('select[name="tipo_dependiente"]').value;
    const facultad = document.querySelector('select[name="facultad"]').value;
    
    if (tipoDependiente && facultad) {
        const codigoTipo = tiposDependienteMap[tipoDependiente] || 'E';
        const codigoFacultad = facultadesMap[facultad] || 'GEN';
        const agrupador = codigoTipo + codigoFacultad;
        
        // Actualizar campo oculto
        document.getElementById('agrupador').value = agrupador;
        
        // Actualizar preview
        document.getElementById('agrupador-text').textContent = agrupador;
        
        // Cambiar color si es diferente al original
        const agrupadorOriginal = '<?php echo $_smarty_tpl->tpl_vars['votacion']->value['agrupador'];?>
';
        const preview = document.getElementById('agrupador-preview');
        if (agrupador !== agrupadorOriginal) {
            preview.style.backgroundColor = '#fff3cd';
            preview.style.borderColor = '#ffeaa7';
            document.getElementById('agrupador-text').innerHTML = agrupador + ' <small style="color: #856404;">(Cambiado)</small>';
        } else {
            preview.style.backgroundColor = '#e7f3ff';
            preview.style.borderColor = '#b3d9ff';
            document.getElementById('agrupador-text').textContent = agrupador;
        }
    }
}

// Event listeners
document.querySelector('select[name="tipo_dependiente"]').addEventListener('change', generarAgrupador);
document.querySelector('select[name="facultad"]').addEventListener('change', generarAgrupador);

// Generar agrupador inicial
generarAgrupador();
<?php echo '</script'; ?>
>

<style>
.mensaje-notificacion {
    padding: 15px;
    margin: 15px 0;
    border-radius: 5px;
    font-weight: bold;
    transition: all 0.5s ease;
}

.mensaje-notificacion.error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

button {
    margin-right: 10px;
    padding: 8px 16px;
}

button[type="submit"] {
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
}

button[type="button"] {
    background-color: #6c757d;
    color: white;
    border: none;
    border-radius: 4px;
}
</style>

<?php
}
}
/* {/block "contenido"} */
}

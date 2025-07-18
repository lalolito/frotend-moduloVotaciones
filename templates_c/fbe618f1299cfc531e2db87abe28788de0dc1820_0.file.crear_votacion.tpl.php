<?php
/* Smarty version 4.5.5, created on 2025-07-18 23:24:52
  from 'C:\Xampp\htdocs\frotend-moduloVotaciones\templates\crear_votacion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_687abba48a8d32_76085305',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fbe618f1299cfc531e2db87abe28788de0dc1820' => 
    array (
      0 => 'C:\\Xampp\\htdocs\\frotend-moduloVotaciones\\templates\\crear_votacion.tpl',
      1 => 1752873767,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_687abba48a8d32_76085305 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1186089341687abba487b9e8_69662322', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_1186089341687abba487b9e8_69662322 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_1186089341687abba487b9e8_69662322',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<style>
    /* Estilos generales para el cuerpo y el contenedor del formulario */
    body {
        font-family: "Inter", sans-serif; /* Una fuente limpia y moderna */
        background-color: #f8f9fa; /* Fondo muy claro */
        color: #343a40; /* Texto oscuro para contraste */
        line-height: 1.6;
    }

    .form-container {
        max-width: 500px;
        margin: 40px auto;
        padding: 30px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05); /* Sombra sutil */
        border: 1px solid #e0e0e0; /* Borde ligero */
    }

    /* Títulos */
    h2 {
        font-size: 1.8rem;
        color: #212529;
        margin-bottom: 25px;
        text-align: center;
        font-weight: 600;
    }

    /* Etiquetas de formulario */
    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #495057;
        font-size: 0.95rem;
    }

    /* Campos de entrada de texto y selectores */
    input[type="text"],
    input[type="datetime-local"],
    select {
        width: 100%;
        padding: 12px 15px;
        margin-bottom: 20px;
        border: 1px solid #ced4da;
        border-radius: 6px;
        font-size: 1rem;
        color: #495057;
        background-color: #ffffff;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
        box-sizing: border-box; /* Asegura que el padding no aumente el ancho */
    }

    input[type="text"]:focus,
    input[type="datetime-local"]:focus,
    select:focus {
        border-color: #007bff; /* Borde azul al enfocar */
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Sombra de enfoque */
        outline: none; /* Eliminar el contorno predeterminado del navegador */
    }

    /* Estilo específico para select */
    select {
        appearance: none; /* Eliminar el estilo predeterminado del sistema */
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23495057'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E"); /* Flecha personalizada */
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 18px;
    }

    /* Botón de envío */
    button[type="submit"] {
        width: 100%;
        padding: 12px 20px;
        background-color: #28a745; 
        color: #ffffff;
        border: none;
        border-radius: 6px;
        font-size: 1.1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.2s ease, transform 0.1s ease;
        margin-top: 10px;
    }

    button[type="submit"]:hover {
        background-color: #143b1dff; 
        transform: translateY(-1px); /* Efecto ligero de elevación */
    }

    button[type="submit"]:active {
        background-color: #143b1dff; /* Azul aún más oscuro al hacer clic */
        transform: translateY(0);
    }

    /* Mensajes de alerta */
    .alert {
        padding: 15px 20px;
        margin-bottom: 20px;
        border-radius: 6px;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .alert-error {
        background-color: #f8d7da; /* Fondo rojo claro */
        color: #721c24; /* Texto rojo oscuro */
        border: 1px solid #f5c6cb;
    }

    .alert-error::before {
        content: "⚠️"; /* Icono de advertencia */
        font-size: 1.2rem;
    }

    /* Pequeños ajustes para el espaciado de los <br><br> */
    form br {
        display: none; /* Ocultar los <br> para controlar el espaciado con CSS */
    }

    .form-group {
        margin-bottom: 20px; /* Espacio entre grupos de label/input */
    }
</style>

<div class="form-container">
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
        <div class="form-group">
            <label for="tipo_votacion">Tipo de votación:</label>
            <select name="tipo_votacion" id="tipo_votacion" required>
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
            </select>
        </div>

        <div class="form-group">
            <label for="tipo_usuario">Tipo de usuario:</label>
            <select name="tipo_usuario" id="tipo_usuario" required>
                <option value="">-- Seleccione --</option>
                <option value="Estudiante" <?php if (((($tmp = $_GET['tipo_usuario'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp)) == 'Estudiante') {?>selected<?php }?>>Estudiante</option>
                <option value="Docente" <?php if (((($tmp = $_GET['tipo_usuario'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp)) == 'Docente') {?>selected<?php }?>>Docente</option>
                <option value="Administrativo" <?php if (((($tmp = $_GET['tipo_usuario'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp)) == 'Administrativo') {?>selected<?php }?>>Administrativo</option>
            </select>
        </div>


        <div class="form-group">
            <label for="facultad">Facultad:</label>
            <select name="facultad" id="facultad" required>
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
            </select>
        </div>

        <div class="form-group">
            <label for="fecha_inicio">Fecha de inicio:</label>
            <input type="datetime-local" name="fecha_inicio" id="fecha_inicio"
                value="<?php echo '<?php'; ?>
 echo isset($_GET['fecha_inicio']) && strpos($_GET['fecha_inicio'], ' ') !== false ? smarty_modifier_truncate(smarty_modifier_replace($_GET['fecha_inicio'],' ','T'),16,'') : ''; <?php echo '?>'; ?>
"
                required>
        </div>

        <div class="form-group">
            <label for="fecha_fin">Fecha de fin:</label>
            <input type="datetime-local" name="fecha_fin" id="fecha_fin"
                value="<?php echo '<?php'; ?>
 echo isset($_GET['fecha_fin']) && strpos($_GET['fecha_fin'], ' ') !== false ? smarty_modifier_truncate(smarty_modifier_replace($_GET['fecha_fin'],' ','T'),16,'') : ''; <?php echo '?>'; ?>
"
                required>
        </div>

        <button type="submit">Guardar Votación</button>
    </form>
</div>

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

function actualizarAgrupador() {
    const tipoUsuario = document.getElementById("tipo_usuario").value;
    const facultad = document.getElementById("facultad").value;

    let letra = '';
    switch (tipoUsuario) {
        case 'Estudiante': letra = 'E'; break;
        case 'Docente': letra = 'D'; break;
        case 'Administrativo': letra = 'A'; break;
        default: letra = '';
    }

    const facultadesMap = {
        'Ingeniería': 'ING',
        'Derecho': 'DER',
        'Educación': 'EDU',
        'Arquitectura': 'ARQ',
        'Economía': 'ECO'
    };

    const codFacultad = facultadesMap[facultad] || '';
    const agrupador = letra + codFacultad;

    const campoAgrupador = document.getElementById("agrupador_generado");
    if (campoAgrupador) campoAgrupador.value = agrupador;
}

document.getElementById("tipo_usuario").addEventListener("change", actualizarAgrupador);
document.getElementById("facultad").addEventListener("change", actualizarAgrupador);


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

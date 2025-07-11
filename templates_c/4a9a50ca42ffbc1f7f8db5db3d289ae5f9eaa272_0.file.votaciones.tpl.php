<?php
/* Smarty version 4.5.5, created on 2025-07-11 18:54:28
  from 'C:\xampp\htdocs\frotend-moduloVotaciones\templates\votaciones.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_687141c4f1a2f2_07394383',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a9a50ca42ffbc1f7f8db5db3d289ae5f9eaa272' => 
    array (
      0 => 'C:\\xampp\\htdocs\\frotend-moduloVotaciones\\templates\\votaciones.tpl',
      1 => 1752252866,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_687141c4f1a2f2_07394383 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1791146343687141c4ed31e8_71312795', "contenido");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_1791146343687141c4ed31e8_71312795 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_1791146343687141c4ed31e8_71312795',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Listado de Votaciones</h2>

<?php if ((isset($_GET['mensaje']))) {?>
    <?php if ($_GET['mensaje'] == "creada") {?>
        <div class="mensaje-notificacion">✅ Votación creada exitosamente.</div>
    <?php } elseif ($_GET['mensaje'] == "actualizada") {?>
        <div class="mensaje-notificacion">✅ Votación actualizada correctamente.</div>
    <?php } elseif ($_GET['mensaje'] == "eliminada") {?>
        <div class="mensaje-notificacion">✅ Votación eliminada.</div>
    <?php }
}?>

<?php if ((isset($_GET['error']))) {?>
    <?php if ($_GET['error'] == "campos") {?>
        <div class="mensaje-notificacion error">⚠️ Por favor completa todos los campos.</div>
    <?php } elseif ($_GET['error'] == "sin_id") {?>
        <div class="mensaje-notificacion error">⚠️ No se especificó la votación a eliminar.</div>
    <?php } elseif ($_GET['error'] == "faltan_datos") {?>
        <div class="mensaje-notificacion error">⚠️ Todos los campos del formulario son obligatorios.</div>
    <?php } elseif ($_GET['error'] == "no_encontrada") {?>
        <div class="mensaje-notificacion error">⚠️ La votación no fue encontrada.</div>
    <?php } elseif ($_GET['error'] == "error_eliminar") {?>
        <div class="mensaje-notificacion error">⚠️ <?php echo (($tmp = $_GET['mensaje'] ?? null)===null||$tmp==='' ? "Error al eliminar la votación." ?? null : $tmp);?>
</div>
    <?php }
}?>

<?php echo '<script'; ?>
>
    setTimeout(() => {
        document.querySelectorAll('.mensaje-notificacion').forEach(alert => {
            alert.style.display = 'none';
        });
    }, 5000);
<?php echo '</script'; ?>
>

<a href="crear_votacion.php"><button>+ Nueva Votación</button></a>

<?php if ($_smarty_tpl->tpl_vars['votaciones']->value && count($_smarty_tpl->tpl_vars['votaciones']->value) > 0) {?>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de Votación</th>
                <th>Facultad</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['votaciones']->value, 'votacion');
$_smarty_tpl->tpl_vars['votacion']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['votacion']->value) {
$_smarty_tpl->tpl_vars['votacion']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['votacion']->value['id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['votacion']->value['tipo'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['votacion']->value['facultad'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['votacion']->value['inicio'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['votacion']->value['fin'];?>
</td>
                <td>
                    <a href="editar_votacion.php?id=<?php echo $_smarty_tpl->tpl_vars['votacion']->value['id'];?>
"><button>Editar</button></a>
                    
                    <!-- Formulario POST para eliminar (sin onclick) -->
                    <form method="post" action="eliminar_votacion.php" style="display: inline;" class="form-eliminar">
                        <input type="hidden" name="id_tipo_solicitud" value="<?php echo $_smarty_tpl->tpl_vars['votacion']->value['id'];?>
">
                        <input type="hidden" name="tipo_votacion" value="<?php echo $_smarty_tpl->tpl_vars['votacion']->value['tipo'];?>
">
                        <input type="hidden" name="facultad_votacion" value="<?php echo $_smarty_tpl->tpl_vars['votacion']->value['facultad'];?>
">
                        <button type="button" class="btn-eliminar" data-id="<?php echo $_smarty_tpl->tpl_vars['votacion']->value['id'];?>
" data-tipo="<?php echo $_smarty_tpl->tpl_vars['votacion']->value['tipo'];?>
" data-facultad="<?php echo $_smarty_tpl->tpl_vars['votacion']->value['facultad'];?>
">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
<?php } else { ?>
    <p>📭 No hay votaciones registradas.</p>
    <a href="crear_votacion.php"><button>Crear primera votación</button></a>
<?php }?>

<!-- Modal de confirmación personalizado -->
<div id="modal-eliminar" class="modal-overlay" style="display: none;">
    <div class="modal-content">
        <div class="modal-header">
            <h3>🗑️ Confirmar Eliminación</h3>
        </div>
        <div class="modal-body">
            <p><strong>¿Está seguro de que desea eliminar esta votación?</strong></p>
            <div class="votacion-info">
                <p><strong>ID:</strong> <span id="modal-id"></span></p>
                <p><strong>Tipo:</strong> <span id="modal-tipo"></span></p>
                <p><strong>Facultad:</strong> <span id="modal-facultad"></span></p>
            </div>
            <div class="warning-message">
                ⚠️ <strong>Esta acción no se puede deshacer.</strong>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="btn-cancelar" class="btn-cancelar">
                ❌ Cancelar
            </button>
            <button type="button" id="btn-confirmar" class="btn-confirmar">
                🗑️ Sí, Eliminar
            </button>
        </div>
    </div>
</div>

<style>
/* Estilos para el modal */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1000;
    display: flex;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    max-width: 500px;
    width: 90%;
    max-height: 90vh;
    overflow-y: auto;
}

.modal-header {
    background-color: #f8f9fa;
    padding: 20px;
    border-bottom: 1px solid #dee2e6;
    border-radius: 8px 8px 0 0;
}

.modal-header h3 {
    margin: 0;
    color: #dc3545;
    font-size: 1.25rem;
}

.modal-body {
    padding: 20px;
}

.modal-body p {
    margin-bottom: 15px;
    font-size: 16px;
}

.votacion-info {
    background-color: #f8f9fa;
    padding: 15px;
    border-radius: 5px;
    margin: 15px 0;
    border-left: 4px solid #007bff;
}

.votacion-info p {
    margin: 5px 0;
    font-size: 14px;
}

.warning-message {
    background-color: #fff3cd;
    color: #856404;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ffeaa7;
    margin-top: 15px;
    font-size: 14px;
}

.modal-footer {
    padding: 20px;
    border-top: 1px solid #dee2e6;
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

.btn-cancelar {
    background-color: #6c757d;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}

.btn-cancelar:hover {
    background-color: #5a6268;
}

.btn-confirmar {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}

.btn-confirmar:hover {
    background-color: #c82333;
}

.btn-eliminar {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 8px 10px;
    border-radius: 3px;
    cursor: pointer;
}

.btn-eliminar:hover {
    background-color: #c82333;
}
</style>

<?php echo '<script'; ?>
>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('modal-eliminar');
    const btnCancelar = document.getElementById('btn-cancelar');
    const btnConfirmar = document.getElementById('btn-confirmar');
    const modalId = document.getElementById('modal-id');
    const modalTipo = document.getElementById('modal-tipo');
    const modalFacultad = document.getElementById('modal-facultad');
    
    let formularioActual = null;

    // Manejar clicks en botones de eliminar
    document.querySelectorAll('.btn-eliminar').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Obtener datos de la votación
            const id = this.getAttribute('data-id');
            const tipo = this.getAttribute('data-tipo');
            const facultad = this.getAttribute('data-facultad');
            
            // Llenar el modal con los datos
            modalId.textContent = id;
            modalTipo.textContent = tipo;
            modalFacultad.textContent = facultad;
            
            // Guardar referencia al formulario
            formularioActual = this.closest('.form-eliminar');
            
            // Mostrar el modal
            modal.style.display = 'flex';
            
            // Enfocar el botón de cancelar
            btnCancelar.focus();
        });
    });

    // Manejar cancelación
    btnCancelar.addEventListener('click', function() {
        modal.style.display = 'none';
        formularioActual = null;
    });

    // Manejar confirmación
    btnConfirmar.addEventListener('click', function() {
        if (formularioActual) {
            // Cambiar el botón de confirmar para mostrar que está procesando
            btnConfirmar.innerHTML = '⏳ Eliminando...';
            btnConfirmar.disabled = true;
            
            // Enviar el formulario
            formularioActual.submit();
        }
    });

    // Cerrar modal al hacer click fuera de él
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.style.display = 'none';
            formularioActual = null;
        }
    });

    // Cerrar modal con la tecla Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.style.display === 'flex') {
            modal.style.display = 'none';
            formularioActual = null;
        }
    });
});
<?php echo '</script'; ?>
>

<?php
}
}
/* {/block "contenido"} */
}

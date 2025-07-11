{extends file="layout.tpl"}
{block name="contenido"}
<h2>Crear Nueva Votación</h2>

{if isset($smarty.get.error) && $smarty.get.error == "faltan_datos"}
    <div class="alert alert-error">
        ⚠️ Todos los campos del formulario son obligatorios.
    </div>
{/if}

{if isset($smarty.get.error) && $smarty.get.error == "error_sistema"}
    <div class="alert alert-error">
        ⚠️ {$smarty.get.mensaje|default:"Error del sistema"}
    </div>
{/if}

{if isset($error_mensaje)}
    <div class="alert alert-error">
        ⚠️ {$error_mensaje}
    </div>
{/if}


<form method="post" action="crear_votacion.php">
    
    <!-- Campos normales -->
    <label>Tipo de votación:</label>
    <select name="tipo_votacion" required>
        <option value="">-- Seleccione --</option>
        {foreach from=$tipos_votacion item=tipo}
            <option value="{$tipo}" {if ($smarty.get.tipo_votacion|default:'') == $tipo}selected{/if}>{$tipo}</option>
        {/foreach}
    </select><br><br>

    <label>Facultad:</label>
    <select name="facultad" required>
        <option value="">-- Seleccione --</option>
        {foreach from=$facultades item=facultad}
            <option value="{$facultad}" {if ($smarty.get.facultad|default:'') == $facultad}selected{/if}>{$facultad}</option>
        {/foreach}
    </select><br><br>

    <label>Fecha de inicio:</label><br>
<input type="datetime-local" name="fecha_inicio"
       value="<?php echo isset($_GET['fecha_inicio']) && strpos($_GET['fecha_inicio'], ' ') !== false ? smarty_modifier_truncate(smarty_modifier_replace($_GET['fecha_inicio'],' ','T'),16,'') : ''; ?>"
       required><br><br>

<label>Fecha de fin:</label><br>
<input type="datetime-local" name="fecha_fin"
       value="<?php echo isset($_GET['fecha_fin']) && strpos($_GET['fecha_fin'], ' ') !== false ? smarty_modifier_truncate(smarty_modifier_replace($_GET['fecha_fin'],' ','T'),16,'') : ''; ?>"
       required><br><br>




    <button type="submit">Guardar Votación</button>
</form>

<script>
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
{if isset($smarty.get.id_tipo_solicitud) && $smarty.get.id_tipo_solicitud != ''}
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('usar_id_manual').checked = true;
    toggleIdManual();
});
{/if}
</script>

{/block}
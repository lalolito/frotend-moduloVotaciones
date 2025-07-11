{extends file="layout.tpl"}
{block name="contenido"}
<h2>Editar Votación</h2>

{if isset($error_mensaje)}
    <div class="mensaje-notificacion error">
        ⚠️ {$error_mensaje}
    </div>
{/if}

<form method="post" action="actualizar_votacion.php">
    <input type="hidden" name="id_tipo_solicitud" value="{$votacion.id}">
    <input type="hidden" name="agrupador_original" value="{$votacion.agrupador}">
    
    <!-- Información actual -->
    <div style="background-color: #f8f9fa; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
        <h3>📊 Información Actual</h3>
        <p><strong>ID:</strong> {$votacion.id}</p>
        <p><strong>Agrupador actual:</strong> <code>{$votacion.agrupador}</code></p>
        <p><strong>Tipo dependiente:</strong> {$votacion.tipo_dependiente}</p>
    </div>
    
    <label>Tipo de votación:</label>
    <select name="tipo_solicitud" required>
        <option value="">-- Seleccione --</option>
        {foreach from=$tipos_votacion item=tipo}
            <option value="{$tipo}" {if $votacion.tipo == $tipo}selected{/if}>{$tipo}</option>
        {/foreach}
    </select><br><br>
    
    <label>Tipo de dependiente:</label>
    <select name="tipo_dependiente" required>
        <option value="">-- Seleccione --</option>
        {foreach from=$tipos_dependiente item=tipo_dep}
            <option value="{$tipo_dep}" {if $votacion.tipo_dependiente == $tipo_dep}selected{/if}>{$tipo_dep}</option>
        {/foreach}
    </select><br><br>

    <label>Facultad:</label>
    <select name="facultad" required>
        <option value="">-- Seleccione --</option>
        {foreach from=$facultades item=facultad}
            <option value="{$facultad}" {if $votacion.facultad == $facultad}selected{/if}>{$facultad}</option>
        {/foreach}
    </select><br><br>

  <input type="datetime-local" name="fecha_inicio" value="{$votacion.inicio|replace:' ':'T'|truncate:16:''}" required>
<input type="datetime-local" name="fecha_fin" value="{$votacion.fin|replace:' ':'T'|truncate:16:''}" required>

    
    <!-- Campo oculto para ID_TIPO_DEPENDIENTE si existe -->
    {if isset($votacion.id_tipo_dependiente) && $votacion.id_tipo_dependiente}
        <input type="hidden" name="id_tipo_dependiente" value="{$votacion.id_tipo_dependiente}">
    {/if}

    <!-- Preview del nuevo agrupador -->
    <div id="agrupador-preview" style="margin: 15px 0; padding: 10px; background-color: #e7f3ff; border: 1px solid #b3d9ff; border-radius: 4px;">
        <strong>🏷️ Nuevo agrupador:</strong> <span id="agrupador-text">{$votacion.agrupador}</span>
        <input type="hidden" name="agrupador" id="agrupador" value="{$votacion.agrupador}">
    </div>

    <button type="submit">Actualizar Votación</button>
    <a href="votaciones.php"><button type="button">Cancelar</button></a>
</form>

<script>
// Función para limpiar URL si hay parámetros de error
document.addEventListener('DOMContentLoaded', function() {
    {if isset($limpiar_url) && $limpiar_url}
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
            const newUrl = baseUrl + "?id={$votacion.id}";
            window.history.replaceState({}, document.title, newUrl);
        }, 500);
        
    }, 3000); // 3 segundos para leer el mensaje
    {/if}
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
        const agrupadorOriginal = '{$votacion.agrupador}';
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
</script>

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

{/block}
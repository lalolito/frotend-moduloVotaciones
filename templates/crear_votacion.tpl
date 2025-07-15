{extends file="layout.tpl"}
{block name="contenido"}
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
        <div class="form-group">
            <label for="tipo_votacion">Tipo de votación:</label>
            <select name="tipo_votacion" id="tipo_votacion" required>
                <option value="">-- Seleccione --</option>
                {foreach from=$tipos_votacion item=tipo}
                    <option value="{$tipo}" {if ($smarty.get.tipo_votacion|default:'') == $tipo}selected{/if}>{$tipo}</option>
                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <label for="facultad">Facultad:</label>
            <select name="facultad" id="facultad" required>
                <option value="">-- Seleccione --</option>
                {foreach from=$facultades item=facultad}
                    <option value="{$facultad}" {if ($smarty.get.facultad|default:'') == $facultad}selected{/if}>{$facultad}</option>
                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <label for="fecha_inicio">Fecha de inicio:</label>
            <input type="datetime-local" name="fecha_inicio" id="fecha_inicio"
                value="<?php echo isset($_GET['fecha_inicio']) && strpos($_GET['fecha_inicio'], ' ') !== false ? smarty_modifier_truncate(smarty_modifier_replace($_GET['fecha_inicio'],' ','T'),16,'') : ''; ?>"
                required>
        </div>

        <div class="form-group">
            <label for="fecha_fin">Fecha de fin:</label>
            <input type="datetime-local" name="fecha_fin" id="fecha_fin"
                value="<?php echo isset($_GET['fecha_fin']) && strpos($_GET['fecha_fin'], ' ') !== false ? smarty_modifier_truncate(smarty_modifier_replace($_GET['fecha_fin'],' ','T'),16,'') : ''; ?>"
                required>
        </div>

        <button type="submit">Guardar Votación</button>
    </form>
</div>

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

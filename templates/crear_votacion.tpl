{extends file="layout.tpl"}

{block name="contenido"}
<h2>Crear Nueva Votación</h2>

{if isset($smarty.get.error) && $smarty.get.error == "faltan_datos"}
    <p style="color: red;">⚠️ Todos los campos del formulario son obligatorios.</p>
{/if}

<form method="post" action="guardar_votacion.php">
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

    <label>Fecha de inicio:</label>
    <input type="datetime-local" name="fecha_inicio" value="{$smarty.get.fecha_inicio|default:''}" required><br><br>

    <label>Fecha de fin:</label>
    <input type="datetime-local" name="fecha_fin" value="{$smarty.get.fecha_fin|default:''}" required><br><br>

    <button type="submit">Guardar Votación</button>
</form>
{/block}

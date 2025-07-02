{extends file="layout.tpl"}

{block name="contenido"}
<h2>Crear Nueva Plancha</h2>

<form method="post" action="guardar_plancha.php" enctype="multipart/form-data">
    <label>Nombre de la plancha:</label>
    <input type="text" name="nombre" required><br><br>

    <label>Votación asociada:</label>
    <select name="votacion_id" required>
        <option value="">-- Seleccione una votación --</option>
        {foreach from=$votaciones item=votacion}
            <option value="{$votacion.id}">{$votacion.nombre}</option>
        {/foreach}
    </select><br><br>

    <label>Imagen de la plancha:</label>
    <input type="file" name="imagen" accept="image/*" required><br><br>

    <button type="submit">Guardar Plancha</button>
</form>
{/block}

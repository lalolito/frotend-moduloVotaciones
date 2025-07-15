{extends file="layout.tpl"}

{block name="contenido"}
<h2>Editar Plancha</h2>

<form method="post" action="actualizar_plancha.php" enctype="multipart/form-data">
    <!-- ID de la plancha -->
    <input type="hidden" name="id" value="{$plancha.ID_OPCION_PREGUNTA}">
    <!-- URL actual de la imagen -->
    <input type="hidden" name="url_actual" value="{$plancha.URL}">

    <!-- Nombre -->
    <label>Nombre de la plancha:</label>
    <input type="text" name="nombre" value="{$plancha.OPCION}" required><br><br>

    <!-- Pregunta asociada -->
    <label>Pregunta asociada:</label>
    <select name="pregunta" required>
        {foreach from=$preguntas item=preg}
            <option value="{$preg.ID_PREGUNTA}" {if $preg.ID_PREGUNTA == $plancha.id_pregunta}selected{/if}>{$preg.PREGUNTA}</option>
        {/foreach}
    </select><br><br>

    <!-- Tipo de solicitud -->
    <label>Tipo de solicitud:</label>
    <select name="tipo" required>
        {foreach from=$tipos item=tipo}
            <option value="{$tipo.ID_TIPO_SOLICITUD}" {if $tipo.ID_TIPO_SOLICITUD == $plancha.id_tipo}selected{/if}>{$tipo.TIPO_SOLICITUD}</option>
        {/foreach}
    </select><br><br>

    <!-- Imagen actual -->
    <label>Imagen actual:</label><br>
    <img src="{$plancha.URL}" alt="Imagen actual" style="width: 200px;"><br><br>

    <!-- Subir nueva imagen -->
    <label>Subir nueva imagen (opcional):</label>
    <input type="file" name="imagen" accept="image/*"><br><br>

    <button type="submit">Actualizar Plancha</button>
</form>
{/block}

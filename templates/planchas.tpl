{extends file="layout.tpl"}

{block name="contenido"}
<h2>Listado de Planchas</h2>

{if isset($smarty.get.mensaje)}
    {if $smarty.get.mensaje == "creada"}
        <p style="color: green;">✅ Plancha creada exitosamente.</p>
    {elseif $smarty.get.mensaje == "actualizada"}
        <p style="color: green;">✅ Plancha actualizada correctamente.</p>
    {elseif $smarty.get.mensaje == "eliminada"}
        <p style="color: green;">🗑 Plancha eliminada correctamente.</p>
    {/if}
{/if}

{if isset($smarty.get.error)}
    {if $smarty.get.error == "campos"}
        <p style="color: red;">⚠️ Todos los campos son obligatorios.</p>
    {elseif $smarty.get.error == "upload"}
        <p style="color: red;">⚠️ Error al subir la imagen de la plancha.</p>
    {elseif $smarty.get.error == "sin_id"}
        <p style="color: red;">⚠️ No se especificó qué plancha eliminar.</p>
    {/if}
{/if}

<a href="crear_plancha.php">
    <button style="margin-bottom: 20px;">+ Nueva Plancha</button>
</a>

<div class="card-container vertical-layout">
    {foreach from=$planchas item=plancha}
    <div class="card full-width">
        <img src="{$plancha.imagen}" alt="Plancha {$plancha.nombre}" class="card-img">
        <div class="card-content">
            <h3>{$plancha.nombre}</h3>
            <p><strong>Votación:</strong> {$plancha.votacion}</p>
            <div class="card-actions">
                <a href="editar_plancha.php?id={$plancha.id}" class="card-button">✏️ Editar</a>
                <a href="eliminar_plancha.php?id={$plancha.id}" class="card-button danger" onclick="return confirm('¿Deseas eliminar esta plancha?')">🗑 Eliminar</a>
            </div>
        </div>
    </div>
    {/foreach}
</div>
{/block}

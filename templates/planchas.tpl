{extends file="layout.tpl"}

{block name="contenido"}
<h2>Listado de Planchas</h2>
<a href="crear_plancha.php">
    <button style="margin-bottom: 20px;">+ Nueva Plancha</button>
</a>

<div class="card-container">
    {foreach from=$planchas item=plancha}
    <div class="card">
        <img src="../assets/img/placeholder.png" alt="Plancha {$plancha.nombre}" class="card-img">
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

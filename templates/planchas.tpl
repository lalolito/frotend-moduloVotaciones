{extends file="layout.tpl"}

{block name="contenido"}
<h2>Listado de Planchas</h2>
<a href="crear_plancha.php"><button class="btn">+ Nueva Plancha</button></a>

<div class="card-container">
    {foreach from=$planchas item=plancha}
    <div class="card">
        <img class="card-img" src="{$plancha.imagen}" alt="Plancha {$plancha.nombre}">

        <div class="card-content">
            <h4>{$plancha.nombre}</h4>
            <p><strong>Votación:</strong> {$plancha.votacion}</p>

            <div class="card-actions">
                <a href="editar_plancha.php?id={$plancha.id}" class="card-button">Editar</a>
                <a href="eliminar_plancha.php?id={$plancha.id}" class="card-button danger" onclick="return confirm('¿Deseas eliminar esta plancha?')">Eliminar</a>
            </div>
        </div>

{if isset($plancha.principal) || isset($plancha.suplente)}
        <div class="card-photos">
            {if $plancha.principal}
            <div>
                <img src="{$plancha.principal}" alt="Principal">
                <div class="label">Principal</div>
            </div>
            {/if}
            {if $plancha.suplente}
            <div>
                <img src="{$plancha.suplente}" alt="Suplente">
                <div class="label">Suplente</div>
            </div>
            {/if}
        </div>
        {/if}
    </div>
    {/foreach}
</div>
{/block}

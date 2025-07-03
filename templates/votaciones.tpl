{extends file="layout.tpl"}

{block name="contenido"}
<h2>Listado de Votaciones</h2>

{if isset($smarty.get.mensaje)}
    {if $smarty.get.mensaje == "creada"}
        <div class="mensaje-notificacion">✅ Votación creada exitosamente.</div>
    {elseif $smarty.get.mensaje == "actualizada"}
        <div class="mensaje-notificacion">✅ Votación actualizada correctamente.</div>
    {elseif $smarty.get.mensaje == "eliminada"}
        <div class="mensaje-notificacion">✅ Votación eliminada.</div>
    {/if}
{/if}

{if isset($smarty.get.error)}
    {if $smarty.get.error == "campos"}
        <div class="mensaje-notificacion error">⚠️ Por favor completa todos los campos.</div>
    {elseif $smarty.get.error == "sin_id"}
        <div class="mensaje-notificacion error">⚠️ No se especificó la votación a eliminar.</div>
    {elseif $smarty.get.error == "faltan_datos"}
        <div class="mensaje-notificacion error">⚠️ Todos los campos del formulario son obligatorios.</div>
    {/if}
{/if}

<script>
    setTimeout(() => {
        document.querySelectorAll('.mensaje-notificacion').forEach(alert => {
            alert.style.display = 'none';
        });
    }, 5000);
</script>

<a href="crear_votacion.php"><button>+ Nueva Votación</button></a>

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
        {foreach from=$votaciones item=votacion}
        <tr>
            <td>{$votacion.id}</td>
            <td>{$votacion.tipo}</td>
            <td>{$votacion.facultad}</td>
            <td>{$votacion.inicio}</td>
            <td>{$votacion.fin}</td>
            <td>
                <a href="editar_votacion.php?id={$votacion.id}"><button>Editar</button></a>
                <a href="eliminar_votacion.php?id={$votacion.id}" onclick="return confirm('¿Deseas eliminar esta votación?')"><button>Eliminar</button></a>
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>
{/block}

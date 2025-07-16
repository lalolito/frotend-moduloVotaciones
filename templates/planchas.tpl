{extends file="layout.tpl"}

{block name="contenido"}
<h2>Listado de Planchas</h2>
<a href="crear_plancha.php"><button class="btn">+ Nueva Plancha</button></a>

<style>
/* Animación para eliminación */
.fade-out {
    opacity: 0;
    transition: opacity 0.4s ease;
}

/* Estilo del toast */
.toast {
    position: fixed;
    top: 20px;
    right: 20px;
    background: #28a745;
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
    opacity: 0;
    transform: translateY(-20px);
    transition: opacity 0.4s ease, transform 0.4s ease;
    z-index: 999;
}
.toast.show {
    opacity: 1;
    transform: translateY(0);
}
</style>

<div class="card-container">
    {foreach from=$planchas item=plancha}
    <div class="card" data-id="{$plancha.id}">
        <img class="card-img" src="http://localhost/frotend-moduloVotaciones/{$plancha.imagen}" alt="Plancha {$plancha.nombre}">


        <div class="card-content">
            <h4>{$plancha.nombre}</h4>
            <p><strong>Votación:</strong> {$plancha.votacion}</p>

            <div class="card-actions">
                <a href="editar_plancha.php?id={$plancha.id}" class="card-button">Editar</a>
                <button class="card-button danger" onclick="eliminarPlancha({$plancha.id})">Eliminar</button>
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

<!-- Contenedor del toast -->
<div id="toast" class="toast">Plancha eliminada correctamente</div>

{literal}
<script>
function eliminarPlancha(id) {
    if (confirm("¿Estás seguro de que deseas eliminar esta plancha?")) {
        fetch('../ajax/planchasAjax.php?accion=eliminar&id=' + id)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'ok') {
                    const card = document.querySelector(`.card[data-id='${id}']`);
                    if (card) {
                        card.classList.add('fade-out');
                        setTimeout(() => {
                            card.remove();
                            mostrarToast("Plancha eliminada correctamente");
                        }, 400);
                    }
                } else {
                    alert("Error al eliminar: " + data.mensaje);
                }
            })
            .catch(error => {
                alert("Error en la solicitud");
                console.error(error);
            });
    }
}

function mostrarToast(mensaje) {
    const toast = document.getElementById("toast");
    toast.textContent = mensaje;
    toast.classList.add("show");

    setTimeout(() => {
        toast.classList.remove("show");
    }, 3000);
}
</script>
{/literal}
{/block}

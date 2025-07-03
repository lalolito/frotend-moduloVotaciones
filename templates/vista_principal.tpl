{extends file="layout_VP.tpl"}

{block name="contenido"}
<h2 class="text-center">Administración del Módulo de Votaciones</h2>
<p class="text-center">Selecciona el módulo que deseas administrar:</p>

<div class="menu-principal">
    <div class="menu-card">
        <img src="assets/img/votaciones.png" alt="Votaciones">
        <h3>Votaciones</h3>
        <p>Gestiona fechas, tipos y reglas de votación.</p>
        <a href="controllers/votaciones.php">Ingresar</a>
    </div>

    <div class="menu-card">
        <img src="assets/img/planchas.png" alt="Planchas">
        <h3>Planchas</h3>
        <p>Registra y administra las planchas por votación.</p>
        <a href="controllers/planchas.php">Ingresar</a>
    </div>

    <div class="menu-card">
        <img src="assets/img/reportes.png" alt="Reportes">
        <h3>Reportes</h3>
        <p>Genera resultados generales o por facultad.</p>
        <a href="controllers/reportes.php">Ingresar</a>
    </div>
</div>
{/block}

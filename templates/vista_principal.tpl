{extends file="layout_VP.tpl"}

{block name="contenido"}
<h2>Administración del Módulo de Votaciones</h2>

<p>Seleccione la sección a la que desea acceder:</p>

<div class="card-container vertical-layout">
    <div class="card full-width">
        <div class="card-content">
            <h3>🗳 Votaciones</h3>
            <p>Administra la creación, modificación y supervisión de procesos de votación.</p>
            <div class="card-actions">
                <a href="controllers/votaciones.php" class="card-button">Ir a Votaciones</a>
            </div>
        </div>
    </div>

    <div class="card full-width">
        <div class="card-content">
            <h3>📋 Planchas</h3>
            <p>Agrega y edita las planchas participantes en los procesos de votación.</p>
            <div class="card-actions">
                <a href="controllers/planchas.php" class="card-button">Ir a Planchas</a>
            </div>
        </div>
    </div>

    <div class="card full-width">
        <div class="card-content">
            <h3>📊 Reportes</h3>
            <p>Descarga informes de escrutinio general y por facultad.</p>
            <div class="card-actions">
                <a href="controllers/reportes.php" class="card-button">Ir a Reportes</a>
            </div>
        </div>
    </div>
</div>
{/block}

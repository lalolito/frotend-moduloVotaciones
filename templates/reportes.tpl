{extends file="layout.tpl"}

{block name="contenido"}
<h2>Reportes de Escrutinio</h2>

{if isset($smarty.get.error) && $smarty.get.error == "facultad"}
    <p style="color: red;">⚠️ Por favor seleccione una facultad para generar el reporte.</p>
{/if}

<p>Seleccione el tipo de reporte que desea generar y descargar:</p>

<div style="display: flex; flex-direction: column; gap: 20px; max-width: 400px;">
    <a href="reporte_general.php" class="card-button" style="text-align: center;">📥 Descargar Escrutinio General</a>

    <form method="get" action="reporte_facultad.php">
        <label for="facultad">Seleccionar facultad:</label>
        <select name="facultad" id="facultad" required>
            <option value="">-- Seleccione --</option>
            <option value="Ingeniería">Ingeniería</option>
            <option value="Derecho">Derecho</option>
            <option value="Educación">Educación</option>
            <option value="Arquitectura">Arquitectura</option>
        </select><br><br>
        <button type="submit" class="card-button">📥 Descargar por Facultad</button>
    </form>
</div>
{/block}

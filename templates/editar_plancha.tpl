{extends file="layout.tpl"}

{block name="contenido"}
<h2>Editar Plancha</h2>

<form method="post" action="actualizar_plancha.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{$plancha.id}">

    <label>Nombre de la plancha:</label>
    <input type="text" name="nombre" value="{$plancha.nombre}" required><br><br>

    <p><strong>Votación asociada:</strong> {$plancha.votacion}</p><br>

    <label>Imagen actual:</label><br>
    <img src="{$plancha.imagen}" alt="Imagen actual" style="width: 200px; height: auto;"><br><br>

    <label>Subir nueva imagen (opcional):</label>
    <input type="file" name="imagen" accept="image/*"><br><br>

    <button type="submit">Actualizar Plancha</button>
</form>
{/block}

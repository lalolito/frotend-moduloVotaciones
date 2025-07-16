{extends file="layout.tpl"}

{block name="contenido"}
<h2>Crear Nueva Plancha</h2>

<form id="formCrearPlancha" enctype="multipart/form-data">
    <label>Nombre de la plancha:</label>
    <input type="text" name="nombre" required><br><br>

    <label>Pregunta asociada:</label>
    <select name="pregunta" required>
        <option value="">-- Seleccione una pregunta --</option>
        {foreach from=$preguntas item=preg}
            <option value="{$preg.ID_PREGUNTA}">{$preg.PREGUNTA}</option>
        {/foreach}
    </select><br><br>

    <label>Tipo de solicitud:</label>
    <select name="tipo" required>
        <option value="">-- Seleccione un tipo --</option>
        {foreach from=$tipos item=tipo}
            <option value="{$tipo.ID_TIPO_SOLICITUD}">{$tipo.TIPO_SOLICITUD}</option>
        {/foreach}
    </select><br><br>

    <label>Agrupador:</label>
    <input type="text" name="agrupador" required><br><br>

    <label>Imagen de la plancha:</label>
    <input type="file" name="imagen" accept="image/*" required><br><br>

    <button type="submit">Guardar Plancha</button>
</form>

{literal}
<script>
document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("formCrearPlancha");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(form);
        formData.append("accion", "registrar"); 

        fetch("../ajax/planchasAjax.php", {
            method: "POST",
            body: formData
        })
        .then(resp => resp.json())
        .then(data => {
            console.log("Respuesta del servidor:", data);

            if (data.status === "ok") {
                alert("Plancha registrada correctamente");
                window.location.href = "planchas.php";
            } else {
                alert("Error al registrar: " + data.mensaje);
            }
        })
        .catch(error => {
            alert("⚠️ Error inesperado");
            console.error(error);
        });
    });
});
</script>
{/literal}

{/block}

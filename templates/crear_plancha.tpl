{extends file="layout.tpl"}

{block name="contenido"}
<h2 class="text-center">Crear Nueva Plancha</h2>

<form id="formCrearPlancha" enctype="multipart/form-data">
    <fieldset>
        <legend>Información básica</legend>

        <label>Nombre de la plancha:</label>
        <input type="text" name="nombre" required>

        <label>Pregunta asociada:</label>
        <select name="pregunta" required>
            <option value="">-- Seleccione una pregunta --</option>
            {foreach from=$preguntas item=preg}
                <option value="{$preg.ID_PREGUNTA}">{$preg.PREGUNTA}</option>
            {/foreach}
        </select>

        <label>Tipo de solicitud:</label>
        <select name="tipo" required>
            <option value="">-- Seleccione un tipo --</option>
            {foreach from=$tipos item=tipo}
                <option value="{$tipo.ID_TIPO_SOLICITUD}">{$tipo.TIPO_SOLICITUD}</option>
            {/foreach}
        </select>

        <label>Imagen de la plancha:</label>
        <input type="file" name="imagen" accept="image/*" required>
    </fieldset>

    <div class="form-btn-container">
        <button type="submit">Guardar Plancha</button>
    </div>
</form>

{literal}
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            if (data.status === "ok") {
                Swal.fire({
                    title: "¡Plancha registrada!",
                    text: "Se creó correctamente.",
                    icon: "success",
                    confirmButtonText: "Ver planchas"
                }).then(() => {
                    window.location.href = "planchas.php";
                });
            } else {
                Swal.fire({
                    title: "❌ Error al registrar",
                    text: data.mensaje || "Ocurrió un error.",
                    icon: "error"
                });
            }
        })
        .catch(error => {
            Swal.fire({
                title: " Error inesperado",
                text: "Revisa la consola para más información.",
                icon: "warning"
            });
            console.error(error);
        });
    });
});
</script>
{/literal}

{literal}
<style>
    form#formCrearPlancha {
        max-width: 600px;
        margin: 30px auto;
        padding: 25px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    fieldset {
        border: none;
        padding: 0;
        margin: 0;
    }

    legend {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }

    form#formCrearPlancha label {
        display: block;
        margin-top: 15px;
        margin-bottom: 5px;
        font-weight: bold;
    }

    form#formCrearPlancha input[type="text"],
    form#formCrearPlancha select,
    form#formCrearPlancha input[type="file"] {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form-btn-container {
        text-align: center;
        margin-top: 25px;
    }

    form#formCrearPlancha button {
        background-color: #007bff;
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    form#formCrearPlancha button:hover {
        background-color: #0056b3;
    }

    @media (max-width: 768px) {
        form#formCrearPlancha {
            padding: 20px 15px;
        }
    }
</style>
{/literal}
{/block}

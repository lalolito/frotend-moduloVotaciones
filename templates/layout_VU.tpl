<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{$titulo_pagina|default:"Módulo de Votaciones"}</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>
<body>
    {include file="header.tpl" usuario=$usuario|default:''}

    <main>
        {block name="contenido"}{/block}
        {if isset($mensaje)}
            <div class="mensaje-notificacion">{$mensaje}</div>
        {/if}
    </main>

    {include file="footer.tpl"}
    <script>
function abrirModalPlancha() {
  document.getElementById("modalPlancha").style.display = "block";
}

function cerrarModal() {
  document.getElementById("modalPlancha").style.display = "none";
}
</script>

</body>
</html>



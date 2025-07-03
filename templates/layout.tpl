<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{$titulo_pagina|default:"Módulo de Votaciones"}</title>
    <link rel="stylesheet" href="../assets/css/estilo.css">
</head>
<body>
    {include file="header.tpl"}

    <main>
        {block name="contenido"}{/block}
        {if isset($mensaje)}
            <div class="mensaje-notificacion">{$mensaje}</div>
        {/if}
    </main>
    <div class="menu-flotante">
    <button onclick="toggleMenu()">☰</button>
    <div id="opciones-menu" class="menu-opciones oculto">
        <div class="burbuja-opcion">
        <a href="votaciones.php">🗳</a>
        <span class="tooltip-opcion">Votaciones</span>
        </div>

        <div class="burbuja-opcion">
        <a href="planchas.php">📋</a>
        <span class="tooltip-opcion">Planchas</span>
        </div>

        <div class="burbuja-opcion">
        <a href="reportes.php">📊</a>
        <span class="tooltip-opcion">Reportes</span>
        </div>

        <div class="burbuja-opcion">
        <a href="../index.php">🏠</a>
        <span class="tooltip-opcion">Inicio</span>
        </div>
    </div>
</div>
<script>
function toggleMenu() {
  const menu = document.getElementById("opciones-menu");
  menu.classList.toggle("oculto");
  setTimeout(() => {
    menu.classList.toggle("visible");
  }, 10); // se activa después del display para permitir la transición
}
</script>


    {include file="footer.tpl"}
</body>
</html>



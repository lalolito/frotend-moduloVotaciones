{extends file="layout.tpl"}

{block name="contenido"}
  <h2>Bienvenido, {$nombre|escape} 👋</h2>
  <h3>Facultad de {$nombre_facultad|escape}</h3>
  <h4>Selecciona el tipo de elección:</h4>

  <div class="opciones-eleccion">
    {if $rol == 'Estudiante'}
      <form method="post" action="vista_usuario.php">
        <input type="hidden" name="tipo" value="estudiantil">
        <button class="btn-opcion">Consejo Estudiantil</button>
      </form>
    {/if}

    {if $rol == 'Estudiante' || $rol == 'Docente'}
      <form method="post" action="vista_usuario.php">
        <input type="hidden" name="tipo" value="docentes">
        <button class="btn-opcion">Representante de Docentes</button>
      </form>
    {/if}
  </div>
{/block}

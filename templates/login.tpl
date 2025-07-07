{extends file="layout_VP.tpl"}

{block name="contenido"}
<h2>Iniciar Sesión</h2>

{if isset($smarty.get.error)}
  <div class="mensaje-notificacion error">
    {if $smarty.get.error == "datos"}
      ❌ Usuario o contraseña incorrectos.
    {elseif $smarty.get.error == "campos"}
      ⚠️ Por favor completa todos los campos.
    {/if}
  </div>
{/if}

<form method="post" action="controllers/login.php" class="form-login">
  <div class="form-group">
    <label for="usuario">Usuario o Correo:</label>
    <input type="text" id="usuario" name="usuario" required>
  </div>

  <div class="form-group">
    <label for="clave">Contraseña:</label>
    <input type="password" id="clave" name="clave" required>
  </div>

  <div class="form-actions">
    <button type="submit" class="btn">Iniciar Sesión</button>
  </div>
</form>
{/block}

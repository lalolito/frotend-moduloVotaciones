{extends file="layout_VU.tpl"}

{block name="contenido"}

<h2>Bienvenido, {$usuario}</h2>

<div class="card-container horizontal-layout">
  <div class="card" onclick="abrirModalPlancha()">
    <img src="../assets/img/plancha.png" alt="Planchas" class="card-icon" />
    <h3>Planchas</h3>
    <p>Consulta los candidatos y selecciona tu voto.</p>
    <button class="card-button">Ver Planchas</button>
  </div>
</div>

<!-- Modal emergente -->
<div id="modalPlancha" class="modal">
  <div class="modal-contenido">
    <span class="cerrar" onclick="cerrarModal()">&times;</span>
    <h2>Plancha Renovación</h2>
    <img src="../assets/img/plancha.png" class="img-modal" alt="Plancha">
    <p><strong>Facultad:</strong> Ingeniería</p>
    <p><strong>Candidato principal:</strong> Javier Muñoz</p>
    <p><strong>Suplente:</strong> Juan Rivera</p>
    <button class="card-button">Votar</button>
  </div>
</div>

{/block}

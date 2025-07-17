<?php
/* Smarty version 4.5.5, created on 2025-07-17 19:58:13
  from 'C:\Xampp\htdocs\frotend-moduloVotaciones\templates\planchas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_687939b5b9d142_37922533',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd90d24e9132d86b8a6f2ce017ed3a46a4c205a88' => 
    array (
      0 => 'C:\\Xampp\\htdocs\\frotend-moduloVotaciones\\templates\\planchas.tpl',
      1 => 1752775049,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_687939b5b9d142_37922533 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_83946355687939b5b83b74_69682134', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_83946355687939b5b83b74_69682134 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_83946355687939b5b83b74_69682134',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Listado de Planchas</h2>
<a href="crear_plancha.php"><button class="btn">+ Nueva Plancha</button></a>

<style>
/* Animación para eliminación */
.fade-out {
    opacity: 0;
    transition: opacity 0.4s ease;
}

/* Estilo del toast */
.toast {
    position: fixed;
    top: 20px;
    right: 20px;
    background: #28a745;
    color: white;
    padding: 10px 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
    opacity: 0;
    transform: translateY(-20px);
    transition: opacity 0.4s ease, transform 0.4s ease;
    z-index: 999;
}
.toast.show {
    opacity: 1;
    transform: translateY(0);
}
</style>

<div class="card-container">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['planchas']->value, 'plancha');
$_smarty_tpl->tpl_vars['plancha']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plancha']->value) {
$_smarty_tpl->tpl_vars['plancha']->do_else = false;
?>
    <div class="card" data-id="<?php echo $_smarty_tpl->tpl_vars['plancha']->value['id'];?>
">
        <img class="card-img" src="http://localhost/frotend-moduloVotaciones/<?php echo $_smarty_tpl->tpl_vars['plancha']->value['imagen'];?>
" alt="Plancha <?php echo $_smarty_tpl->tpl_vars['plancha']->value['nombre'];?>
">


        <div class="card-content">
            <h4><?php echo $_smarty_tpl->tpl_vars['plancha']->value['nombre'];?>
</h4>
            <p><strong>Votación:</strong> <?php echo $_smarty_tpl->tpl_vars['plancha']->value['votacion'];?>
</p>

            <div class="card-actions">
                <a href="editar_plancha.php?id=<?php echo $_smarty_tpl->tpl_vars['plancha']->value['id'];?>
" class="card-button">Editar</a>
                <button class="card-button danger" onclick="eliminarPlancha(<?php echo $_smarty_tpl->tpl_vars['plancha']->value['id'];?>
)">Eliminar</button>
            </div>
        </div>

        <?php if ((isset($_smarty_tpl->tpl_vars['plancha']->value['principal'])) || (isset($_smarty_tpl->tpl_vars['plancha']->value['suplente']))) {?>
        <div class="card-photos">
            <?php if ($_smarty_tpl->tpl_vars['plancha']->value['principal']) {?>
            <div>
                <img src="<?php echo $_smarty_tpl->tpl_vars['plancha']->value['principal'];?>
" alt="Principal">
                <div class="label">Principal</div>
            </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['plancha']->value['suplente']) {?>
            <div>
                <img src="<?php echo $_smarty_tpl->tpl_vars['plancha']->value['suplente'];?>
" alt="Suplente">
                <div class="label">Suplente</div>
            </div>
            <?php }?>
        </div>
        <?php }?>
    </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>

<!-- Contenedor del toast -->
<div id="toast" class="toast">Plancha eliminada correctamente</div>


<?php echo '<script'; ?>
>
function eliminarPlancha(id) {
    if (confirm("¿Estás seguro de que deseas eliminar esta plancha?")) {
        fetch('../ajax/planchasAjax.php?accion=eliminar&id=' + id)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'ok') {
                    const card = document.querySelector(`.card[data-id='${id}']`);
                    if (card) {
                        card.classList.add('fade-out');
                        setTimeout(() => {
                            card.remove();
                            mostrarToast("Plancha eliminada correctamente");
                        }, 400);
                    }
                } else {
                    alert("Error al eliminar: " + data.mensaje);
                }
            })
            .catch(error => {
                alert("Error en la solicitud");
                console.error(error);
            });
    }
}

function mostrarToast(mensaje) {
    const toast = document.getElementById("toast");
    toast.textContent = mensaje;
    toast.classList.add("show");

    setTimeout(() => {
        toast.classList.remove("show");
    }, 3000);
}
<?php echo '</script'; ?>
>

<?php
}
}
/* {/block "contenido"} */
}

<?php
/* Smarty version 4.5.5, created on 2025-07-16 19:45:02
  from 'C:\Xampp\htdocs\frotend-moduloVotaciones\templates\crear_plancha.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6877e51e8f36a0_85480659',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f358a6b75078601157d17c02b37b08ecc57b6bbf' => 
    array (
      0 => 'C:\\Xampp\\htdocs\\frotend-moduloVotaciones\\templates\\crear_plancha.tpl',
      1 => 1752687882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6877e51e8f36a0_85480659 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14694214826877e51e8e2ba9_81252886', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_14694214826877e51e8e2ba9_81252886 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_14694214826877e51e8e2ba9_81252886',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2 class="text-center">Crear Nueva Plancha</h2>

<form id="formCrearPlancha" enctype="multipart/form-data">
    <fieldset>
        <legend>Información básica</legend>

        <label>Nombre de la plancha:</label>
        <input type="text" name="nombre" required>

        <label>Pregunta asociada:</label>
        <select name="pregunta" required>
            <option value="">-- Seleccione una pregunta --</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['preguntas']->value, 'preg');
$_smarty_tpl->tpl_vars['preg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['preg']->value) {
$_smarty_tpl->tpl_vars['preg']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['preg']->value['ID_PREGUNTA'];?>
"><?php echo $_smarty_tpl->tpl_vars['preg']->value['PREGUNTA'];?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>

        <label>Tipo de solicitud:</label>
        <select name="tipo" required>
            <option value="">-- Seleccione un tipo --</option>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tipos']->value, 'tipo');
$_smarty_tpl->tpl_vars['tipo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->value) {
$_smarty_tpl->tpl_vars['tipo']->do_else = false;
?>
                <option value="<?php echo $_smarty_tpl->tpl_vars['tipo']->value['ID_TIPO_SOLICITUD'];?>
"><?php echo $_smarty_tpl->tpl_vars['tipo']->value['TIPO_SOLICITUD'];?>
</option>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>

        <label>Agrupador:</label>
        <input type="text" name="agrupador" required>

        <label>Imagen de la plancha:</label>
        <input type="file" name="imagen" accept="image/*" required>
    </fieldset>

    <div class="form-btn-container">
        <button type="submit">Guardar Plancha</button>
    </div>
</form>


<!-- SweetAlert2 CDN -->
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/sweetalert2@11"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
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
                    title: "✅ ¡Plancha registrada!",
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
                title: "⚠️ Error inesperado",
                text: "Revisa la consola para más información.",
                icon: "warning"
            });
            console.error(error);
        });
    });
});
<?php echo '</script'; ?>
>



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

<?php
}
}
/* {/block "contenido"} */
}

<?php
/* Smarty version 4.5.5, created on 2025-07-16 18:18:32
  from 'C:\Xampp\htdocs\frotend-moduloVotaciones\templates\crear_plancha.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6877d0d8a992e0_13137364',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f358a6b75078601157d17c02b37b08ecc57b6bbf' => 
    array (
      0 => 'C:\\Xampp\\htdocs\\frotend-moduloVotaciones\\templates\\crear_plancha.tpl',
      1 => 1752682568,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6877d0d8a992e0_13137364 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10883522866877d0d8a89ab4_77015325', "contenido");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.tpl");
}
/* {block "contenido"} */
class Block_10883522866877d0d8a89ab4_77015325 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'contenido' => 
  array (
    0 => 'Block_10883522866877d0d8a89ab4_77015325',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h2>Crear Nueva Plancha</h2>

<form id="formCrearPlancha" enctype="multipart/form-data">
    <label>Nombre de la plancha:</label>
    <input type="text" name="nombre" required><br><br>

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
    </select><br><br>

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
    </select><br><br>

    <label>Agrupador:</label>
    <input type="text" name="agrupador" required><br><br>

    <label>Imagen de la plancha:</label>
    <input type="file" name="imagen" accept="image/*" required><br><br>

    <button type="submit">Guardar Plancha</button>
</form>


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
<?php echo '</script'; ?>
>


<?php
}
}
/* {/block "contenido"} */
}

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('../controllers/votacionController.php');
use app\controllers\votacionController;

// Iniciar controlador
$ctrl = new votacionController();

// Procesar la modificación
$resultado = $ctrl->modificarVotacionControlador();

// Verificar el tipo de respuesta y actuar según sea necesario
switch ($resultado['tipo']) {
    case 'recargar':
        header("Location: votaciones.php?mensaje=editado_ok");
        exit();

    case 'simple':
    case 'limpiar':
    default:
        // Redirigir de vuelta al formulario de edición con errores
        $params = http_build_query([
            'error' => $resultado['titulo'] ?? 'error_bd',
            'mensaje' => $resultado['texto'] ?? ''
        ]);
        $id = $_POST['id_tipo_solicitud'] ?? '0';
        header("Location: editar_votacion.php?id=$id&$params");
        exit();
}
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Cargar dependencias
require_once(__DIR__ . '/../config/server.php');
require_once(__DIR__ . '/../controllers/votacionController.php');

use app\controllers\votacionController;

// Verificar que sea POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: votaciones.php?error=sin_id");
    exit();
}

// Obtener ID del POST
$id = $_POST['id_tipo_solicitud'] ?? null;

if (!$id || !is_numeric($id)) {
    header("Location: votaciones.php?error=sin_id");
    exit();
}

try {
    $votacionController = new votacionController();
    $resultado = $votacionController->eliminarVotacionControlador();
    
    if (is_array($resultado)) {
        if ($resultado['tipo'] == 'recargar') {
            // Guardar mensaje en sesión
            $_SESSION['mensaje_exito'] = "Votación eliminada exitosamente (ID: $id)";
            header("Location: votaciones.php");
            exit();
        } else {
            // Error del controlador
            $error_msg = urlencode($resultado['texto'] ?? 'Error al eliminar');
            header("Location: votaciones.php?error=error_eliminar&mensaje=" . $error_msg);
            exit();
        }
    } else {
        throw new Exception("Respuesta inesperada del controlador");
    }
    
} catch (Exception $e) {
    error_log("Error en eliminar_votacion.php: " . $e->getMessage());
    
    $error_msg = urlencode("Error del sistema: " . $e->getMessage());
    header("Location: votaciones.php?error=error_eliminar&mensaje=" . $error_msg);
    exit();
}
?>
<?php
// Mostrar errores en desarrollo
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Encabezado JSON para todas las respuestas
header("Content-Type: application/json");

require_once __DIR__ . '/../controllers/planchaController.php';
use app\controllers\planchaController;

$ctrl = new planchaController();

// Si es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'])) {
    $accion = $_POST['accion'];

    switch ($accion) {
        case 'registrar':
            $ctrl->guardar();
            break;

        case 'actualizar':
            $ctrl->actualizar();
            break;

        default:
            echo json_encode([
                "status" => "error",
                "mensaje" => "Acción POST no válida"
            ]);
            break;
    }

// Si es GET
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['accion'])) {
    $accion = $_GET['accion'];

    switch ($accion) {
        case 'preguntas':
            $resultado = $ctrl->modelo->obtenerPreguntas();
            echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
            break;

        case 'tipos':
            $resultado = $ctrl->modelo->obtenerTiposVotacion();
            echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
            break;

        case 'planchas':
        case 'listar':
            $resultado = $ctrl->modelo->listarPlanchas();
            echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
            break;

        case 'obtener':
            if (!isset($_GET['id'])) {
                echo json_encode(["status" => "error", "mensaje" => "ID no enviado"]);
                exit;
            }
            $resultado = $ctrl->modelo->obtenerPlanchaPorID($_GET['id']);
            echo json_encode($resultado ?: []);
            break;

        case 'eliminar':
            if (!isset($_GET['id'])) {
                echo json_encode(["status" => "error", "mensaje" => "ID no enviado"]);
                exit;
            }
            try {
                $ctrl->modelo->eliminarPlancha($_GET['id']);
                echo json_encode(["status" => "ok"]);
            } catch (Throwable $e) {
                echo json_encode(["status" => "error", "mensaje" => $e->getMessage()]);
            }
            break;

        default:
            echo json_encode([
                "status" => "error",
                "mensaje" => "Acción GET no válida"
            ]);
            break;
    }

} else {
    echo json_encode([
        "status" => "error",
        "mensaje" => "Petición no válida"
    ]);
}
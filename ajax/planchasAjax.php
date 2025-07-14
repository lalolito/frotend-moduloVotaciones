<?php
require_once "../controllers/planchaController.php";
use app\controllers\planchaController;

$ctrl = new planchaController();

$action = $_GET["action"] ?? '';

switch ($action) {

    // Registrar nueva plancha
    case "registrar":
        $ctrl->guardar();
        break;

    // Obtener preguntas disponibles
    case "preguntas":
        $resultado = $ctrl->modelo->obtenerPreguntas();
        echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
        break;

    // Obtener tipos de solicitud con servicio VOT
    case "tipos":
        $resultado = $ctrl->modelo->obtenerTiposVotacion();
        echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
        break;

    // Obtener todas las planchas (detalle completo)
    case "planchas":
        $resultado = $ctrl->modelo->obtenerPlanchas();
        echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
        break;

    // Obtener solo ID, nombre y URL (modo resumido)
    case "listar":
        $resultado = $ctrl->modelo->listarPlanchas();
        echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
        break;

    // Eliminar plancha por ID
    case "eliminar":
        if (!isset($_GET["id"])) {
            echo json_encode(["status" => "error", "mensaje" => "ID no enviado"]);
            exit;
        }

        $id = $_GET["id"];

        try {
            $ctrl->modelo->eliminarPlancha($id);
            echo json_encode(["status" => "ok"]);
        } catch (Throwable $e) {
            echo json_encode(["status" => "error", "mensaje" => $e->getMessage()]);
        }
        break;

    // Obtener una plancha específica por ID
    case "obtener":
        if (!isset($_GET["id"])) {
            echo json_encode(["status" => "error", "mensaje" => "ID no enviado"]);
            exit;
        }

        $id = $_GET["id"];
        $resultado = $ctrl->modelo->obtenerPlanchaPorID($id);
        echo json_encode($resultado ?: []);
        break;

    // Actualizar una plancha
    case "actualizar":
        $ctrl->actualizar(); // Ya imprime JSON
        break;


    default:
        echo json_encode(["error" => "Acción no válida"]);
}

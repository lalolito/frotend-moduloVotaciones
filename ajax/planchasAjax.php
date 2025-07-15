<?php
require_once "../controllers/planchaController.php";
use app\controllers\planchaController;

$ctrl = new planchaController();

$action = $_GET["action"] ?? '';

switch ($action) {

    case "registrar":
        $ctrl->guardar();
        break;

    case "preguntas":
        $resultado = $ctrl->modelo->obtenerPreguntas();
        echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
        break;

    case "tipos":
        $resultado = $ctrl->modelo->obtenerTiposVotacion();
        echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
        break;

    case "planchas":
        $resultado = $ctrl->modelo->obtenerPlanchas();
        echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
        break;

    case "listar":
        $resultado = $ctrl->modelo->listarPlanchas();
        echo json_encode($resultado->fetchAll(PDO::FETCH_ASSOC));
        break;

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

    case "obtener":
        if (!isset($_GET["id"])) {
            echo json_encode(["status" => "error", "mensaje" => "ID no enviado"]);
            exit;
        }

        $id = $_GET["id"];
        $resultado = $ctrl->modelo->obtenerPlanchaPorID($id);
        echo json_encode($resultado ?: []);
        break;

    case "actualizar":
        $ctrl->actualizar();
        break;


    default:
        echo json_encode(["error" => "Acción no válida"]);
}

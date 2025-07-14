<?php
namespace app\controllers;

use app\models\planchaModel;

require_once __DIR__ . '/../models/planchaModel.php';
require_once __DIR__ . '/../libs/Smarty.class.php';

class planchaController {
    public $modelo;

    public function __construct() {
        $this->modelo = new planchaModel();
    }

    // Vista que carga preguntas y tipos para la gestión de planchas
    public function vistaGestionar() {
        $preguntas = $this->modelo->obtenerPreguntas()->fetchAll(\PDO::FETCH_ASSOC);
        $tipos     = $this->modelo->obtenerTiposVotacion()->fetchAll(\PDO::FETCH_ASSOC);

        $smarty = new \Smarty();
        $smarty->setTemplateDir('templates');
        $smarty->setCompileDir('templates_c');

        $smarty->assign('preguntas', $preguntas);
        $smarty->assign('tipos', $tipos);

        $smarty->display('gestionar_planchas.tpl');
    }

    // Guardar nueva plancha
    public function guardar() {
        $idPregunta = $_POST["pregunta"] ?? null;
        $idTipo     = $_POST["tipo"] ?? null;
        $nombre     = $_POST["nombre"] ?? null;
        $agrupador  = $_POST["agrupador"] ?? null;

        if (!$idPregunta || !$idTipo || !$nombre || !$agrupador) {
            echo json_encode(["status" => "error", "mensaje" => "Faltan datos requeridos"]);
            exit;
        }

        $idrelacion = $this->modelo->obtenerIDRelacion($idPregunta, $idTipo);
        $url = null;

        // Guardar imagen en carpeta
        if (!empty($_FILES["imagen"]["name"])) {
            $folder = __DIR__ . "/../assets/img/planchas";
            if (!file_exists($folder)) mkdir($folder, 0777, true);

            $nombreArchivo = "plancha_" . time() . "_" . basename($_FILES["imagen"]["name"]);
            $ruta = $folder . "/" . $nombreArchivo;
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
            $url = "assets/img/planchas/$nombreArchivo";
        } elseif (!empty($_POST["url"])) {
            $url = $_POST["url"];
        }

        try {
            $this->modelo->guardarPlancha($idrelacion, $nombre, $url);
            echo json_encode(["status" => "ok"]);
        } catch (\Throwable $e) {
            echo json_encode(["status" => "error", "mensaje" => $e->getMessage()]);
        }
        exit;
    }

    // Actualizar una plancha existente
    public function actualizar() {
        $id      = $_POST["id"]      ?? null;
        $nombre  = $_POST["nombre"]  ?? null;
        $agrupador = $_POST["agrupador"] ?? null;
        $url     = $_POST["url"]     ?? null;

        if (!$id || !$nombre) {
            echo json_encode(["status" => "error", "mensaje" => "Faltan datos"]);
            return;
        }

        // Reemplazar imagen si se sube una nueva
        if (!empty($_FILES["imagen"]["name"])) {
            $folder = __DIR__ . "/../assets/img/planchas";
            if (!file_exists($folder)) mkdir($folder, 0777, true);

            $nombreArchivo = "plancha_" . time() . "_" . basename($_FILES["imagen"]["name"]);
            $ruta = $folder . "/" . $nombreArchivo;
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
            $url = "assets/img/planchas/$nombreArchivo";
        }

        try {
            $this->modelo->actualizarPlancha($id, $nombre, $url);
            echo json_encode(["status" => "ok"]);
        } catch (\Throwable $e) {
            echo json_encode(["status" => "error", "mensaje" => $e->getMessage()]);
        }
    }
}

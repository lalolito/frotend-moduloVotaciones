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

    public function guardar() {
        $idPregunta = $_POST["pregunta"]  ?? null;
        $idTipo     = $_POST["tipo"]      ?? null;
        $nombre     = $_POST["nombre"]    ?? null;

        if (!$idPregunta || !$idTipo || !$nombre) {
            echo json_encode(["status" => "error", "mensaje" => "Faltan datos requeridos"]);
            exit;
        }

        
        $idrelacion = $this->modelo->obtenerIDRelacion($idPregunta, $idTipo);

        // Procesar imagen
        $url = null;
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

        // Guardar en base de datos
        try {
            $this->modelo->guardarPlancha($idrelacion, $nombre, $url);
            echo json_encode(["status" => "ok"]);
        } catch (\Throwable $e) {
            echo json_encode(["status" => "error", "mensaje" => $e->getMessage()]);
        }

        exit;
    }

    public function actualizar() {
        $id         = $_POST["id"]         ?? null;
        $nombre     = $_POST["nombre"]     ?? null;
        $idPregunta = $_POST["pregunta"]   ?? null;
        $idTipo     = $_POST["tipo"]       ?? null;
        $url        = $_POST["url_actual"] ?? null;

        if (!$id || !$nombre || !$idPregunta || !$idTipo) {
            echo json_encode(["status" => "error", "mensaje" => "Faltan datos"]);
            return;
        }

        // Procesar nueva imagen si fue enviada
        if (!empty($_FILES["imagen"]["name"])) {
            $folder = __DIR__ . "/../assets/img/planchas";
            if (!file_exists($folder)) mkdir($folder, 0777, true);

            $nombreArchivo = "plancha_" . time() . "_" . basename($_FILES["imagen"]["name"]);
            $ruta = $folder . "/" . $nombreArchivo;
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
            $url = "assets/img/planchas/$nombreArchivo";
        }

        // Obtener nueva relación entre pregunta y tipo
        $idRelacion = $this->modelo->obtenerIDRelacion($idPregunta, $idTipo);

        // Actualizar en base de datos
        try {
            $this->modelo->actualizarPlancha($id, $idRelacion, $nombre, $url);
            header("Location: ../views/planchas.php?mensaje=actualizada");
            exit;
        } catch (\Throwable $e) {
            echo json_encode(["status" => "error", "mensaje" => $e->getMessage()]);
        }
    }
}

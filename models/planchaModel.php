<?php
namespace app\models;

require_once "mainModel.php";

use PDO;

class planchaModel extends mainModel {

    // Guarda una nueva plancha
    public function guardarPlancha($idSolicitudPregunta, $nombre, $url) {
        $datos = [
            ["campo_nombre" => "ID_SOLICITUD_PREGUNTA", "campo_marcador" => ":id_solicitud", "campo_valor" => $idSolicitudPregunta],
            ["campo_nombre" => "OPCION", "campo_marcador" => ":opcion", "campo_valor" => $nombre],
            ["campo_nombre" => "URL", "campo_marcador" => ":url", "campo_valor" => $url]
        ];
        return $this->guardarDatos("ugc_opcion_pregunta", $datos);
    }

    // Actualiza una plancha existente
    public function actualizarPlancha($id, $nombre, $url) {
        $datos = [
            ["campo_nombre" => "OPCION", "campo_marcador" => ":opcion", "campo_valor" => $nombre],
            ["campo_nombre" => "URL", "campo_marcador" => ":url", "campo_valor" => $url]
        ];
        $condicion = [
            "condicion_campo" => "ID_OPCION_PREGUNTA",
            "condicion_marcador" => ":id",
            "condicion_valor" => $id
        ];
        return $this->actualizarDatos("ugc_opcion_pregunta", $datos, $condicion);
    }

    // Elimina una plancha por ID
    public function eliminarPlancha($id) {
        return $this->eliminarRegistro("ugc_opcion_pregunta", "ID_OPCION_PREGUNTA", $id);
    }

    // Retorna todas las planchas (usado para listarlas)
    public function obtenerPlanchas() {
        return $this->ejecutarConsulta("SELECT * FROM ugc_opcion_pregunta");
    }

    // Obtiene una sola plancha por su ID
    public function obtenerPlanchaPorID($id) {
        $sql = $this->conectar()->prepare("SELECT * FROM ugc_opcion_pregunta WHERE ID_OPCION_PREGUNTA = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    // Lista básica con solo ID, nombre y URL
    public function listarPlanchas() {
        return $this->ejecutarConsulta("SELECT ID_OPCION_PREGUNTA, OPCION, URL FROM ugc_opcion_pregunta");
    }

    // Trae todas las preguntas para usarlas en el formulario
    public function obtenerPreguntas() {
        return $this->ejecutarConsulta("SELECT * FROM ugc_preguntas");
    }

    // Trae los tipos de solicitud del servicio VOT
    public function obtenerTiposVotacion() {
        return $this->ejecutarConsulta("SELECT * FROM ugc_tipo_solicitud WHERE SERVICIO = 'VOT'");
    }

    // Obtiene o crea la relación entre una pregunta y un tipo de solicitud
    public function obtenerIDRelacion($idPregunta, $idTipoSolicitud) {
        $pdo = $this->conectar();

        // Verificar si ya existe la relación
        $query = "SELECT ID_SOLICITUD_PREGUNTA 
                  FROM ugc_solicitud_preguntas 
                  WHERE ID_PREGUNTA = :pregunta AND ID_TIPO_SOLICITUD = :tipo";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            ":pregunta" => $idPregunta,
            ":tipo" => $idTipoSolicitud        
        ]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return $resultado["ID_SOLICITUD_PREGUNTA"];
        }

        // Si no existe, la creamos
        $stmtInsert = $pdo->prepare("INSERT INTO ugc_solicitud_preguntas (ID_PREGUNTA, ID_TIPO_SOLICITUD) VALUES (:preg, :tipo)");
        $stmtInsert->execute([
            ":preg" => $idPregunta,
            ":tipo" => $idTipoSolicitud
        ]);

        return $pdo->lastInsertId();
    }
}

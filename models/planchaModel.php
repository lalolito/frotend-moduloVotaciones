<?php
namespace app\models;

require_once "mainModel.php";
use PDO;

class planchaModel extends mainModel {


    // Obtener conexión directa desde fuera
    public function getConexion() {
        return $this->conectar();
    }


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
    public function actualizarPlancha($id, $idSolicitudPregunta, $nombre, $url) {
        $datos = [
            ["campo_nombre" => "ID_SOLICITUD_PREGUNTA", "campo_marcador" => ":id_solicitud", "campo_valor" => $idSolicitudPregunta],
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


    // Retorna todas las planchas (para listar)
    public function obtenerPlanchas() {
        return $this->ejecutarConsulta("SELECT * FROM ugc_opcion_pregunta");
    }


    // Lista básica con ID, nombre y URL
    public function listarPlanchas() {
        return $this->ejecutarConsulta("SELECT ID_OPCION_PREGUNTA, OPCION, URL FROM ugc_opcion_pregunta");
    }


    // Obtener una plancha específica por ID
    public function obtenerPlanchaPorID($id) {
        $sql = $this->conectar()->prepare("SELECT * FROM ugc_opcion_pregunta WHERE ID_OPCION_PREGUNTA = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }


    // Obtiene todas las preguntas para los formularios
    public function obtenerPreguntas() {
        return $this->ejecutarConsulta("SELECT * FROM ugc_preguntas");
    }


    // Obtiene los tipos de solicitud disponibles
    public function obtenerTiposVotacion() {
        return $this->ejecutarConsulta("SELECT * FROM ugc_tipo_solicitud WHERE SERVICIO = 'VOT'");
    }


    // Devuelve o crea la relación entre pregunta y tipo de solicitud
    public function obtenerIDRelacion($idPregunta, $idTipoSolicitud) {
        $pdo = $this->conectar();

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

        // Si no existe la relación, la crea
        $stmtInsert = $pdo->prepare("INSERT INTO ugc_solicitud_preguntas (ID_PREGUNTA, ID_TIPO_SOLICITUD) VALUES (:preg, :tipo)");
        $stmtInsert->execute([
            ":preg" => $idPregunta,
            ":tipo" => $idTipoSolicitud
        ]);

        return $pdo->lastInsertId();
    }


    // Extrae ID_PREGUNTA y ID_TIPO_SOLICITUD a partir de la relación
    public function obtenerPreguntaPorRelacion($idRelacion) {
        $sql = $this->conectar()->prepare("
            SELECT ID_PREGUNTA, ID_TIPO_SOLICITUD 
            FROM ugc_solicitud_preguntas 
            WHERE ID_SOLICITUD_PREGUNTA = :id
        ");
        $sql->bindParam(":id", $idRelacion);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    
    // Alternativa si solo necesitas el tipo
    public function obtenerTipoPorRelacion($idRelacion) {
        $sql = $this->conectar()->prepare("SELECT ID_TIPO_SOLICITUD FROM ugc_solicitud_preguntas WHERE ID_SOLICITUD_PREGUNTA = :id");
        $sql->bindParam(":id", $idRelacion);
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        return $row ? $row["ID_TIPO_SOLICITUD"] : null;
    }


    // Asociar plancha a votación
    public function obtenerVotacionDePlancha($id_opcion_pregunta) {
        $sql = "SELECT ts.*
                FROM ugc_opcion_pregunta op
                JOIN ugc_solicitud_preguntas sp ON op.ID_SOLICITUD_PREGUNTA = sp.ID_SOLICITUD_PREGUNTA
                JOIN ugc_tipo_solicitud ts ON sp.ID_TIPO_SOLICITUD = ts.ID_TIPO_SOLICITUD
                WHERE op.ID_OPCION_PREGUNTA = ?";
        return $this->ejecutarConsultaPersonalizada($sql,[$id_opcion_pregunta]);
    }
    

    // Retorna planchas copn votaciones a partir de cierta fecha 
    public function listarPlanchasRecientes($fecha_inicio = '2025-06-01') {
         $sql = "SELECT op.ID_OPCION_PREGUNTA, op.OPCION, op.URL
                FROM ugc_opcion_pregunta op
                JOIN ugc_solicitud_preguntas sp ON op.ID_SOLICITUD_PREGUNTA = sp.ID_SOLICITUD_PREGUNTA
                JOIN ugc_tipo_solicitud ts ON sp.ID_TIPO_SOLICITUD = ts.ID_TIPO_SOLICITUD
                WHERE ts.FECHA_INICIO >= :fecha";

        $stmt = $this->conectar()->prepare($sql);
        $stmt->bindParam(':fecha', $fecha_inicio);
        $stmt->execute();
        return $stmt;
    }

}

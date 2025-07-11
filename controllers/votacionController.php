<?php
namespace app\controllers;

require_once __DIR__ . '/../models/mainModel.php';
require_once __DIR__ . '/../models/votacionModel.php';

use app\models\mainModel;
use app\models\votacionModel;

class votacionController extends mainModel {
    
    private $votacionModel;
    
    public function __construct() {
        $this->votacionModel = new votacionModel();
    }
    
    # Controlador para crear votación #
    public function crearVotacionControlador() {
        // Obtener y validar ID manual si se proporciona
        $id_tipo_solicitud = $_POST['id_tipo_solicitud'] ?? null;
        
        if (!empty($id_tipo_solicitud)) {
            $id_tipo_solicitud = $this->limpiarCadena($id_tipo_solicitud);
            
            // Validar que sea un número válido
            if (!is_numeric($id_tipo_solicitud) || $id_tipo_solicitud <= 0) {
                return [
                    "tipo" => "simple",
                    "titulo" => "ID inválido",
                    "texto" => "El ID debe ser un número mayor a 0.",
                    "icono" => "error"
                ];
            }
            
            // Verificar que el ID no exista ya
            $verificar_id = $this->ejecutarConsulta("
                SELECT ID_TIPO_SOLICITUD 
                FROM ugc_tipo_solicitud 
                WHERE ID_TIPO_SOLICITUD = '$id_tipo_solicitud'
            ");
            
            if ($verificar_id->rowCount() > 0) {
                return [
                    "tipo" => "simple",
                    "titulo" => "ID duplicado",
                    "texto" => "Ya existe una votación con el ID '$id_tipo_solicitud'.",
                    "icono" => "error"
                ];
            }
        } else {
            // No se proporcionó ID manual: obtener el siguiente ID automáticamente
            $consulta_max_id = $this->ejecutarConsulta("SELECT MAX(ID_TIPO_SOLICITUD) AS max_id FROM ugc_tipo_solicitud");
            $resultado = $consulta_max_id->fetch(\PDO::FETCH_ASSOC);
            $id_tipo_solicitud = isset($resultado['max_id']) && $resultado['max_id'] !== null ? (int)$resultado['max_id'] + 1 : 1;
            
            // Log para debug
            error_log("ID automático generado: $id_tipo_solicitud (MAX anterior: " . ($resultado['max_id'] ?? 'ninguno') . ")");
        }
        
        // Resto de validaciones...
        $tipo_solicitud = $this->limpiarCadena($_POST['tipo_solicitud']);
        $servicio = $this->limpiarCadena($_POST['servicio'] ?? 'VOT');
        $fecha_inicio = date('Y-m-d H:i:s', strtotime($this->limpiarCadena($_POST['fecha_inicio'])));
        $fecha_fin = date('Y-m-d H:i:s', strtotime($this->limpiarCadena($_POST['fecha_fin'])));
        $id_tipo_dependiente = $this->limpiarCadena($_POST['id_tipo_dependiente'] ?? null);
        $agrupador = $this->limpiarCadena($_POST['agrupador']);
        $usuario_creador = $this->limpiarCadena($_POST['usuario_creador'] ?? 'admin');

        // Validación de campos obligatorios
        if ($tipo_solicitud == "" || $fecha_inicio == "" || $fecha_fin == "" || $agrupador == "") {
            return [
                "tipo" => "simple",
                "titulo" => "Campos incompletos",
                "texto" => "Los campos TIPO_SOLICITUD, FECHA_INICIO, FECHA_FIN y AGRUPADOR son obligatorios.",
                "icono" => "error"
            ];
        }

        // Validación de fechas
        if (strtotime($fecha_inicio) > strtotime($fecha_fin)) {
            return [
                "tipo" => "simple",
                "titulo" => "Fechas inválidas",
                "texto" => "La fecha de inicio debe ser anterior o igual a la fecha de fin.",
                "icono" => "error"
            ];
        }

        // Validar formato del agrupador (debe ser letra + 3 caracteres)
        if (!preg_match('/^[EDAX][A-Z]{3}$/', $agrupador)) {
            return [
                "tipo" => "simple",
                "titulo" => "Agrupador inválido",
                "texto" => "El agrupador debe tener el formato correcto (ej: EDER, DING, AECO, XGEN).",
                "icono" => "error"
            ];
        }

        // Verificar que no exista un agrupador duplicado para el mismo servicio
        $verificar_agrupador = $this->ejecutarConsulta("
            SELECT ID_TIPO_SOLICITUD 
            FROM ugc_tipo_solicitud 
            WHERE AGRUPADOR = '$agrupador' AND SERVICIO = '$servicio'
        ");
        
        if ($verificar_agrupador->rowCount() > 0) {
            return [
                "tipo" => "simple",
                "titulo" => "Agrupador duplicado",
                "texto" => "Ya existe una votación con el agrupador '$agrupador' para este servicio.",
                "icono" => "error"
            ];
        }

        // Preparar datos - SIEMPRE incluir el ID (manual o automático)
        $datos = [];
        
        // Incluir el ID (ya sea manual o calculado automáticamente)
        $datos[] = [
            "campo_nombre" => "ID_TIPO_SOLICITUD",
            "campo_marcador" => ":id_tipo_solicitud",
            "campo_valor" => $id_tipo_solicitud
        ];
        
        // Resto de campos obligatorios
        $datos[] = ["campo_nombre" => "TIPO_SOLICITUD", "campo_marcador" => ":tipo_solicitud", "campo_valor" => $tipo_solicitud];
        $datos[] = ["campo_nombre" => "SERVICIO", "campo_marcador" => ":servicio", "campo_valor" => $servicio];
        $datos[] = ["campo_nombre" => "FECHA_INICIO", "campo_marcador" => ":fecha_inicio", "campo_valor" => $fecha_inicio];
        $datos[] = ["campo_nombre" => "FECHA_FIN", "campo_marcador" => ":fecha_fin", "campo_valor" => $fecha_fin];
        $datos[] = ["campo_nombre" => "AGRUPADOR", "campo_marcador" => ":agrupador", "campo_valor" => $agrupador];
        
        // Solo agregar ID_TIPO_DEPENDIENTE si se proporciona
        if (!empty($id_tipo_dependiente)) {
            $datos[] = [
                "campo_nombre" => "ID_TIPO_DEPENDIENTE",
                "campo_marcador" => ":id_tipo_dependiente",
                "campo_valor" => $id_tipo_dependiente
            ];
        }

        // Guardar en la base de datos
        $guardar = $this->guardarDatos("ugc_tipo_solicitud", $datos);
        
        if ($guardar->rowCount() >= 1) {
            // El ID final es el que calculamos (manual o automático)
            $id_final = $id_tipo_solicitud;
            
            error_log("Votación creada exitosamente - ID: $id_final, Agrupador: $agrupador, Usuario: $usuario_creador");
            
            return [
                "tipo" => "limpiar",
                "titulo" => "Votación registrada",
                "texto" => "La votación fue registrada correctamente con ID '$id_final' y agrupador '$agrupador'.",
                "icono" => "success",
                "id_votacion" => $id_final
            ];
        } else {
            return [
                "tipo" => "simple",
                "titulo" => "Error",
                "texto" => "No se pudo guardar la votación. Verifique los datos e intente nuevamente.",
                "icono" => "error"
            ];
        }
    }

    # Método para listar votaciones usando el modelo #
    public function listarVotacionesControlador() {
        try {
            return $this->votacionModel->obtenerVotacionesActivas();
        } catch (Exception $e) {
            error_log("Error al listar votaciones: " . $e->getMessage());
            return [];
        }
    }

    # Método para obtener datos de votación específica usando el modelo #
    public function obtenerVotacionControlador($id) {
        try {
            return $this->votacionModel->obtenerVotacionPorId($id);
        } catch (Exception $e) {
            error_log("Error al obtener votación: " . $e->getMessage());
            return null;
        }
    }

    # Controlador para modificar votación #
    public function modificarVotacionControlador() {
        $id_tipo_solicitud = $this->limpiarCadena($_POST['id_tipo_solicitud']);
        $tipo_solicitud = $this->limpiarCadena($_POST['tipo_solicitud']);
        $fecha_inicio = date('Y-m-d H:i:s', strtotime($this->limpiarCadena($_POST['fecha_inicio'])));
        $fecha_fin = date('Y-m-d H:i:s', strtotime($this->limpiarCadena($_POST['fecha_fin'])));
        $id_tipo_dependiente = $this->limpiarCadena($_POST['id_tipo_dependiente'] ?? null);
        $agrupador = $this->limpiarCadena($_POST['agrupador']);

        // Validar campos obligatorios
        if ($id_tipo_solicitud == "" || $tipo_solicitud == "" || $fecha_inicio == "" || $fecha_fin == "" || $agrupador == "") {
            return [
                "tipo" => "simple",
                "titulo" => "Campos incompletos",
                "texto" => "Todos los campos obligatorios deben estar completos",
                "icono" => "error"
            ];
        }

        // Verificar que la votación existe
        $verificar_votacion = $this->ejecutarConsulta("SELECT ID_TIPO_SOLICITUD FROM ugc_tipo_solicitud WHERE ID_TIPO_SOLICITUD = '$id_tipo_solicitud'");
        if ($verificar_votacion->rowCount() == 0) {
            return [
                "tipo" => "simple",
                "titulo" => "Votación no encontrada",
                "texto" => "La votación que intenta modificar no existe",
                "icono" => "error"
            ];
        }

        // Validar fechas
        if (strtotime($fecha_inicio) > strtotime($fecha_fin)) {
            return [
                "tipo" => "simple",
                "titulo" => "Error en fechas",
                "texto" => "La fecha de inicio debe ser anterior o igual a la fecha de fin",
                "icono" => "error"
            ];
        }

        $datos_actualizacion = [
            ["campo_nombre" => "TIPO_SOLICITUD", "campo_marcador" => ":tipo_solicitud", "campo_valor" => $tipo_solicitud],
            ["campo_nombre" => "FECHA_INICIO", "campo_marcador" => ":fecha_inicio", "campo_valor" => $fecha_inicio],
            ["campo_nombre" => "FECHA_FIN", "campo_marcador" => ":fecha_fin", "campo_valor" => $fecha_fin],
            ["campo_nombre" => "AGRUPADOR", "campo_marcador" => ":agrupador", "campo_valor" => $agrupador]
        ];

        if (!empty($id_tipo_dependiente)) {
            $datos_actualizacion[] = ["campo_nombre" => "ID_TIPO_DEPENDIENTE", "campo_marcador" => ":id_tipo_dependiente", "campo_valor" => $id_tipo_dependiente];
        }

        $condicion = [
            "condicion_campo" => "ID_TIPO_SOLICITUD",
            "condicion_marcador" => ":id_tipo_solicitud",
            "condicion_valor" => $id_tipo_solicitud
        ];

        $actualizar_votacion = $this->actualizarDatos("ugc_tipo_solicitud", $datos_actualizacion, $condicion);

        if ($actualizar_votacion->rowCount() >= 1) {
            return [
                "tipo" => "recargar",
                "titulo" => "Votación modificada",
                "texto" => "La votación ha sido modificada correctamente",
                "icono" => "success"
            ];
        } else {
            return [
                "tipo" => "simple",
                "titulo" => "Sin cambios",
                "texto" => "No se realizaron cambios en la votación",
                "icono" => "info"
            ];
        }
    }
    

    # Controlador para eliminar votación #
    public function eliminarVotacionControlador() {
        $id_tipo_solicitud = $this->limpiarCadena($_POST['id_tipo_solicitud']);
        
        if ($id_tipo_solicitud == "") {
            return [
                "tipo" => "simple",
                "titulo" => "Error",
                "texto" => "ID de votación requerido",
                "icono" => "error"
            ];
        }

        // Verificar que la votación existe
        $verificar_votacion = $this->ejecutarConsulta("SELECT ID_TIPO_SOLICITUD FROM ugc_tipo_solicitud WHERE ID_TIPO_SOLICITUD = '$id_tipo_solicitud' AND SERVICIO = 'VOT'");
        if ($verificar_votacion->rowCount() == 0) {
            return [
                "tipo" => "simple",
                "titulo" => "Votación no encontrada",
                "texto" => "La votación que intenta eliminar no existe",
                "icono" => "error"
            ];
        }

        $eliminar_votacion = $this->eliminarRegistro("ugc_tipo_solicitud", "ID_TIPO_SOLICITUD", $id_tipo_solicitud);
        
        if ($eliminar_votacion->rowCount() >= 1) {
            return [
                "tipo" => "recargar",
                "titulo" => "Votación eliminada",
                "texto" => "La votación ha sido eliminada correctamente",
                "icono" => "success"
            ];
        } else {
            return [
                "tipo" => "simple",
                "titulo" => "Error inesperado",
                "texto" => "No se pudo eliminar la votación",
                "icono" => "error"
            ];
        }
    }
}
?>
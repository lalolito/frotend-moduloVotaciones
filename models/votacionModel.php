<?php
namespace app\models;
require_once __DIR__ . '/mainModel.php';
use app\models\mainModel;

class votacionModel extends mainModel {
    
    # Método para obtener votaciones activas #
    public function obtenerVotacionesActivas() {
        $consulta = $this->ejecutarConsulta("
            SELECT 
                ID_TIPO_SOLICITUD,
                TIPO_SOLICITUD,
                SERVICIO,
                FECHA_INICIO,
                FECHA_FIN,
                ID_TIPO_DEPENDIENTE,
                AGRUPADOR
            FROM ugc_tipo_solicitud
            WHERE SERVICIO = 'VOT'
            ORDER BY FECHA_INICIO DESC
        ");
        
        $votaciones = $consulta->fetchAll(\PDO::FETCH_ASSOC);
        
        // Procesar cada votación para extraer información del agrupador
        foreach ($votaciones as &$votacion) {
            $agrupador = $votacion['AGRUPADOR'];
            
            // Extraer tipo de dependiente del primer carácter
            $letra_dependiente = substr($agrupador, 0, 1);
            switch ($letra_dependiente) {
                case 'E':
                    $votacion['TIPO_DEPENDIENTE'] = 'Estudiante';
                    break;
                case 'D':
                    $votacion['TIPO_DEPENDIENTE'] = 'Docente';
                    break;
                case 'A':
                    $votacion['TIPO_DEPENDIENTE'] = 'Administrativo';
                    break;
                default:
                    $votacion['TIPO_DEPENDIENTE'] = 'Sin asignar';
            }
            
            // Extraer facultad de los últimos 3 caracteres
            $codigo_facultad = substr($agrupador, 1);
            $facultades_map = [
                'DER' => 'Derecho',
                'ING' => 'Ingeniería',
                'ECO' => 'Economía',
                'ARQ' => 'Arquitectura',
                'EDU' => 'Educación'
            ];
            
            $votacion['FACULTAD'] = $facultades_map[$codigo_facultad] ?? 'Facultad no identificada';
            
            // Agregar estado por defecto
            $votacion['ESTADO'] = 'PENDIENTE';
        }
        
        return $votaciones;
    }
    
    # Método para obtener votación por ID #
    public function obtenerVotacionPorId($id) {
        $id = $this->limpiarCadena($id);
        $consulta = $this->ejecutarConsulta("
            SELECT 
                ID_TIPO_SOLICITUD,
                TIPO_SOLICITUD,
                SERVICIO,
                FECHA_INICIO,
                FECHA_FIN,
                ID_TIPO_DEPENDIENTE,
                AGRUPADOR
            FROM ugc_tipo_solicitud
            WHERE ID_TIPO_SOLICITUD = '$id'
        ");
        
        $votacion = $consulta->fetch(\PDO::FETCH_ASSOC);
        
        if ($votacion) {
            $agrupador = $votacion['AGRUPADOR'];
            
            // Extraer tipo de dependiente
            $letra_dependiente = substr($agrupador, 0, 1);
            switch ($letra_dependiente) {
                case 'E':
                    $votacion['TIPO_DEPENDIENTE'] = 'Estudiante';
                    break;
                case 'D':
                    $votacion['TIPO_DEPENDIENTE'] = 'Docente';
                    break;
                case 'A':
                    $votacion['TIPO_DEPENDIENTE'] = 'Administrativo';
                    break;
                default:
                    $votacion['TIPO_DEPENDIENTE'] = 'Sin asignar';
            }
            
            // Extraer facultad
            $codigo_facultad = substr($agrupador, 1);
            $facultades_map = [
                'DER' => 'Derecho',
                'ING' => 'Ingeniería',
                'ECO' => 'Economía',
                'ARQ' => 'Arquitectura',
                'EDU' => 'Educación'
            ];
            
            $votacion['FACULTAD'] = $facultades_map[$codigo_facultad] ?? 'Facultad no identificada';
            $votacion['ESTADO'] = 'PENDIENTE';
        }
        
        return $votacion;
    }
    
    # Método para obtener planchas de una votación #
    public function obtenerPlanchasVotacion($id_votacion) {
        $id_votacion = $this->limpiarCadena($id_votacion);
        $consulta = $this->ejecutarConsulta("
            SELECT 
                op.ID_OPCION_PREGUNTA,
                op.NOMBRE_OPCION,
                op.RUTA_IMAGEN,
                sp.ID_SOLICITUD_PREGUNTA
            FROM ugc_opcion_pregunta op
            INNER JOIN ugc_solicitud_pregunta sp ON op.ID_SOLICITUD_PREGUNTA = sp.ID_SOLICITUD_PREGUNTA
            WHERE sp.ID_TIPO_SOLICITUD = '$id_votacion'
            ORDER BY op.NOMBRE_OPCION ASC
        ");
        
        return $consulta->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    # Método para verificar si una votación está activa #
    public function verificarVotacionActiva($id_votacion) {
        $id_votacion = $this->limpiarCadena($id_votacion);
        $consulta = $this->ejecutarConsulta("
            SELECT 
                FECHA_INICIO,
                FECHA_FIN
            FROM ugc_tipo_solicitud
            WHERE ID_TIPO_SOLICITUD = '$id_votacion' AND SERVICIO = 'VOT'
        ");
        
        $votacion = $consulta->fetch(\PDO::FETCH_ASSOC);
        
        if ($votacion) {
            $ahora = date('Y-m-d H:i:s');
            return ($ahora >= $votacion['FECHA_INICIO'] && $ahora <= $votacion['FECHA_FIN']);
        }
        
        return false;
    }
    
    # Método para obtener estadísticas de votación #
    public function obtenerEstadisticasVotacion($id_votacion) {
        $id_votacion = $this->limpiarCadena($id_votacion);
        
        // Obtener información básica de la votación
        $consulta_votacion = $this->ejecutarConsulta("
            SELECT 
                TIPO_SOLICITUD,
                AGRUPADOR,
                FECHA_INICIO,
                FECHA_FIN
            FROM ugc_tipo_solicitud
            WHERE ID_TIPO_SOLICITUD = '$id_votacion'
        ");
        
        $votacion = $consulta_votacion->fetch(\PDO::FETCH_ASSOC);
        
        if (!$votacion) {
            return null;
        }
        
        // Obtener número de planchas
        $consulta_planchas = $this->ejecutarConsulta("
            SELECT COUNT(*) as total_planchas
            FROM ugc_opcion_pregunta op
            INNER JOIN ugc_solicitud_pregunta sp ON op.ID_SOLICITUD_PREGUNTA = sp.ID_SOLICITUD_PREGUNTA
            WHERE sp.ID_TIPO_SOLICITUD = '$id_votacion'
        ");
        
        $planchas = $consulta_planchas->fetch(\PDO::FETCH_ASSOC);
        
        return [
            'votacion' => $votacion,
            'total_planchas' => $planchas['total_planchas'] ?? 0,
            'estado' => $this->verificarVotacionActiva($id_votacion) ? 'ACTIVA' : 'INACTIVA'
        ];
    }

    public function obtenerTiposDeSolicitudUnicos() {
        $sql = "SELECT DISTINCT TIPO_SOLICITUD FROM ugc_tipo_solicitud ORDER BY TIPO_SOLICITUD ASC";
        $stmt = $this->conectar()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }
}
?>

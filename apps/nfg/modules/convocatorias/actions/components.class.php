<?php


class convocatoriasComponents extends sfComponents
{
  /**
   * Entrada: nfgConvocatoria
   */
  public function executeCompFaltan()
  {
    $faltan_min = $this->NfgConvocatoria->getParticipantesMin();
    $faltan_max = $this->NfgConvocatoria->getParticipantesMax();
    
    if(is_null($faltan_min) && is_null($faltan_max)) $this->tipoFaltan = -1;
    elseif($faltan_min == $faltan_max) $this->tipoFaltan = 1; //mínimo y máximo coinciden
    elseif(is_null($faltan_max)) $this->tipoFaltan = 3; //sólo límite mínimo
    elseif(is_null($faltan_min)) $this->tipoFaltan = 4; //sólo límite máximo
    elseif($faltan_min < $faltan_max) $this->tipoFaltan = 2; //mínimo y máximo distintos
    else $this->tipoFaltan = -1;
  }
  
  /**
   * Entrada: nfgConvocatoria
   */
  public function executeCompApuntados()
  {
    
  }
  
  /**
   * Entrada: nfgConvocatoria
   */
  public function executeCompInvitados()
  {
    
  }
  
  /**
   * Ranking de actividades ordenadas por localidad
   */
  public function executeRankingLocalidad()
  {
    $con = Propel::getConnection(NfgLocalidadPeer::DATABASE_NAME);
    
    $sql = "SELECT nfg_localidad . * , COUNT( nfg_localidad.id ) AS num
    FROM (
    nfg_localidad
    INNER JOIN nfg_lugar ON nfg_lugar.id_localidad = nfg_localidad.id
    )
    INNER JOIN nfg_convocatoria ON nfg_lugar.id = nfg_convocatoria.id_lugar_ini
    GROUP BY nfg_localidad.id
    ORDER BY num desc
    LIMIT 10";

    $stmt = $con->prepare($sql);
    $stmt->execute();
    $this->localidades = $stmt->fetchAll();
  }
  
  public function executeRankingActividad()
  {
    $con = Propel::getConnection(NfgLocalidadPeer::DATABASE_NAME);
    
    $sql = "SELECT nfg_actividad . * , COUNT( nfg_actividad.id ) AS num
    FROM nfg_actividad
    INNER JOIN nfg_convocatoria ON nfg_actividad.id = nfg_convocatoria.id_actividad 
    GROUP BY nfg_actividad.id
    ORDER BY num desc
    LIMIT 10";

    $stmt = $con->prepare($sql);
    $stmt->execute();
    $this->actividades = $stmt->fetchAll();
  }
  
}





?>
<?php


/**
 * Skeleton subclass for representing a row from the 'nfg_convocatoria' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Fri Jan  1 18:08:41 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class NfgConvocatoria extends BaseNfgConvocatoria {
  
  public function getActividad()
  {
      return $this->getNfgActividad()->getNombre();
  }

  public function getFechaConvocatoria()
  {
    return $this->getFechaIni("d-m-y")." de ".$this->getHoraIni(). " a " .$this->getHoraFin();
  }

  public function getHora()
  {
    return $this->getHoraIni(). " a " .$this->getHoraFin();
  }

  public function numApuntados()
  {
    return 1 + $this->countNfgParticipantes() + $this->countNfgApuntados();
  }

  /**
   * Gente que le falta al creador de la convocatoria sin tener en cuenta a los apuntados
   *
   * @return integer
   */
  public function getFaltanMin()
  {
    $faltan = $this->getParticipantesMin() - $this->countNfgInvitados();
    return $faltan<0?0:$faltan;
  }

  /**
   * Gente que le falta al creador de la convocatoria teniendo en cuenta a los apuntados
   *
   * @return integer
   */
  public function getFaltanMinActualizado()
  {
    $faltan = $this->getFaltanMin() - $this->numApuntados();
    return $faltan<0?0:$faltan;
  }

  public function getFaltanMax()
  {
    $faltan = $this->getParticipantesMax() - $this->countNfgInvitados();
    return $faltan<0?0:$faltan;
  }

  public function getFaltanMaxActualizado()
  {
    $faltan = $this->getFaltanMax() - $this->numApuntados();
    return $faltan<0?0:$faltan;
  }

  public function getFaltan()
  {
    $faltanmin = $this->getFaltanMinActualizado();
    $faltanmax = $this->getFaltanMaxActualizado();
    if($faltanmax == 0) return "¡Completo!";
    return "Faltan ".$faltanmin;
  }
  
  /**
   * min = participantes_min
   * max = participantes_max
   * num = num_apuntados
   * x = num_faltan
   * salida = texto salida
   */
  public function getTextoFaltan()
  {
    $salida = "Apúntate"; //Caso por defecto
    $min = $this->getParticipantesMin();
    $max = $this->getParticipantesMax();
    $num = $this->numApuntados();
    if((is_null($min) || $min<=0)) $min = 0;
    if(($min>=0) && (is_null($max)))
    {//min=m,max=inf.
      $salida = "Apúntate";
    }
    elseif(($min>0) && ($max>0) && ($min<=$max))
    {//min=m,max=M,m<M
      if($num<$min) $salida = "Faltan ". ($min-$num); //No se ha llegado al mínimo
      elseif($num<$max) $salida = ($max-$num). " plazas disponibles"; //Se ha llegado al mínimo pero no al máximo
      else //Ya se ha llegado al máximo 
      {
        $salida = "¡Completo!"; 
        //if($this->getAdmiteSuplentes()==1) $salida .= " (Admite lista de espera)"; 
      }
    }
//    elseif(($min>0) && ($max>0) && ($min=$max))
//    {//min=m,max=M,m=M
//      
//    }
    elseif(($min>0) && ($max>0) && ($min>$max))
    {//min=m,max=M,m>M ¡ERROR!
      //Nunca debería entrar aquí.
      $salida = "Apúntante";
    }
    else
    {
      //Nunca debería entrar aquí.
      $salida = "Apúntante";
    }
    return $salida;
  }

  public function getLocalidad()
  {
      return $this->getNfgLugarRelatedByIdLugarIni()->getNfgLocalidad()->getNombre();
  }

  public function apuntar($id_usuario)
  {
    //Nº participantes ACTUAL < Nº participantes max. permitidos para esta convocatoria.
    if($this->numApuntados() < $this->getParticipantesMax())
    {
      //Comprobar NO repetido antes de guardar
        $NfgParticipante = new NfgParticipante();
        $NfgParticipante->setIdUsuario($id_usuario);
        $this->addNfgParticipante($NfgParticipante);
        $this->save();
    }
    else
    {
      if($this->getAdmiteSuplentes())
      {
        //Comprobar NO repetido antes de guardar
        $NfgSuplente = new NfgSuplente();
        $NfgSuplente->setIdUsuario($id_usuario);
        $this->addNfgSuplente($NfgSuplente);
        $this->save();
      }
      else
      {
        //Mensaje: "No hay sitio en esta convocatoria"
      }
    }
  }
  
  public function desapuntar($id_usuario)
  {
    $criteria = new Criteria();  
    $criteria->add(NfgParticipantePeer::ID_CONVOCATORIA,$this->getId());
    $criteria->add(NfgParticipantePeer::ID_USUARIO,$id_usuario);
    NfgParticipantePeer::doDelete($criteria);
  }
  
  public function cancelar()
  {
    $this->delete();
  }
  
  public function estaApuntado($id_usuario)
  {
    foreach($this->getNfgParticipantes() as $participante)
    {
      if(($participante->getIdUsuario() == $id_usuario)) return true;
    }
    return false;
  }  
  
  public function getAccionesUsuario($id_usuario)
  {
    $apuntarse = false; //cuando no estás apuntado y hay plazas todavía
    $desapuntarse = false; //Cuando estás apuntado o eres el propietario (¿Si la convocatoria se queda sin participantes?)
    $cancelar = false; //Cuando eres el dueño
    $editar = false;
    
    $espropietario = ($id_usuario == $this->getIdUsuario()); 
    $cancelar = $espropietario;
    $editar = $espropietario;
    
    $estaapuntado = $this->estaApuntado($id_usuario);
    if($estaapuntado || $espropietario) $desapuntarse = true;
    else $apuntarse = ($this->getFaltanMaxActualizado()>0);
    
    $acciones['apuntarse'] = $apuntarse;
    $acciones['desapuntarse'] = $desapuntarse;
    $acciones['cancelar'] = $cancelar;
    
    return $acciones;
  }
  
  


} // NfgConvocatoria

<?php


/**
 * Skeleton subclass for representing a row from the 'nfg_usuario' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Fri Jan  1 18:08:42 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class NfgUsuario extends BaseNfgUsuario {
  public function __toString()
  {
    return $this->getSftUsuario()->getAlias();
  }
  
  public function getSftUsuario() {
    return SftUsuarioPeer::retrieveByPK($this->getIdSfuser());
  }
/*
  public function getAlias()
    {
      $sftUsuario = $this->getSftUsuario();

      if($sftUsuario instanceof SftUsuario)
        return $sftUsuario->getAlias();
      else 
        return "";
      //return strtolower('(' . $sftUsuario->getAliasOriginal() . ')' . ' ' . $sftUsuario->getNombre() . ' ' . $sftUsuario->getApellido1() . ' ' . $sftUsuario->getApellido2());
    }
  */
} // NfgUsuario

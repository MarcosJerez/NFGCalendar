<?php


/**
 * Skeleton subclass for representing a row from the 'nfg_localidad' table.
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
class NfgLocalidad extends BaseNfgLocalidad {
  public function __toString()
  {
    return $this->getNombre();
  }

} // NfgLocalidad

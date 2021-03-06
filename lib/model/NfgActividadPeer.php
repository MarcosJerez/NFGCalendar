<?php


/**
 * Skeleton subclass for performing query and update operations on the 'nfg_actividad' table.
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
class NfgActividadPeer extends BaseNfgActividadPeer {
    static public function retrieveForAutoSelect($q)
    {
        $oCriteria = new Criteria();
        $oCriteria->add(NfgActividadPeer::NOMBRE, '%'.$q.'%', Criteria::LIKE);
        $oCriteria->addAscendingOrderByColumn(NfgActividadPeer::NOMBRE);

        $tActividad = array();
        foreach (NfgActividadPeer::doSelect($oCriteria) as $oActividad)
        {
            $tActividad[$oActividad->getId()] = array('value'=>$oActividad->getId(),'label'=>$oActividad->getNfgCategoria().' - '.$oActividad->getNombre());
        }

        return $tActividad;
    }

} // NfgActividadPeer

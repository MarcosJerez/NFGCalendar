<?php


/**
 * Skeleton subclass for performing query and update operations on the 'nfg_lugar' table.
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
class NfgLugarPeer extends BaseNfgLugarPeer {

    static public function retrieveForAutoSelect($q)
    {
        $oCriteria = new Criteria();
        $oCriteria->add(NfgLugarPeer::NOMBRE, '%'.$q.'%', Criteria::LIKE);
        $oCriteria->addAscendingOrderByColumn(NfgLugarPeer::NOMBRE);

        $tLugar = array();
        foreach (NfgLugarPeer::doSelect($oCriteria) as $oLugar)
        {
            $tLugar[$oLugar->getId()] = array('value'=>$oLugar->getId(),'label'=>$oLugar->getNombre().', '.$oLugar->getNFGLocalidad()->getNombre());;
        }

        return $tLugar;
    }
} // NfgLugarPeer

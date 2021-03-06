<?php

/**
 * Skeleton subclass for performing query and update operations on the 'gen_paises' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Sun Oct 23 16:15:27 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    plugins.sftGuardPlugin.lib.model
 */
class GenPaisPeer extends BaseGenPaisPeer {

    static public function retrieveForAutoSelect($q) {
        $cultura = sfContext::getInstance()->getUser()->getCulture();

        $oCriteria = new Criteria();
        $oCriteria->add(GenPaisI18nPeer::NOMBRE, '%' . $q . '%', Criteria::LIKE);
        $oCriteria->add(GenPaisI18nPeer::ID_CULTURA, $cultura, Criteria::LIKE);
        $oCriteria->addAscendingOrderByColumn(GenPaisI18nPeer::NOMBRE);

        $salida = array();
        foreach (GenPaisI18nPeer::doSelect($oCriteria) as $pais) {
            $salida[$pais->getNombre()] = (string) $pais->getNombre();
        }

        return $salida;
    }

}

// GenPaisPeer

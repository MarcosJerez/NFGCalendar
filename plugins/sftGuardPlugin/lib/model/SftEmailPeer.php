<?php


/**
 * Skeleton subclass for performing query and update operations on the 'sft_emails' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Sun Oct 23 16:15:20 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    plugins.sftGuardPlugin.lib.model
 */
class SftEmailPeer extends BaseSftEmailPeer {
    
    static public function dameEmailConDireccion($direccion)
    {
        $c = new Criteria();
        $c->add(SftEmailPeer::DIRECCION, $direccion);

        $email = SftEmailPeer::doSelectOne($c);

        return $email;
    }
} // SftEmailPeer

<?php

/**
 * Skeleton subclass for representing a row from the 'gen_provincias' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Sun Oct 23 16:15:29 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    plugins.sftGuardPlugin.lib.model
 */
class GenProvincia extends BaseGenProvincia
{

    public function getIdProvincia()
    {
        return $this->getId();
    }
    
    public function __toString()
    {
        return $this->getNombre();
    }

}

// GenProvincia

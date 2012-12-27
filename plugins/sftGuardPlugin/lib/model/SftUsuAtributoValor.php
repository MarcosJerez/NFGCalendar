<?php

/**
 * Skeleton subclass for representing a row from the 'sft_usu_atributos_valores' table.
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
class SftUsuAtributoValor extends BaseSftUsuAtributoValor
{

    /**
     * Get the name of the user.
     *
     * @return     string
     */
    public function getNombreUsuario()
    {
        if ($this->aSftUsuAtributo === null && ($this->id_usuario !== null))
        {

            return $this->getSftUsuario()->NombreCompleto();
        }else
            return '';
    }

}

// SftUsuAtributoValor
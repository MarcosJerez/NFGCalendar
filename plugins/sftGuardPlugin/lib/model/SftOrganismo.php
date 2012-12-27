<?php

/**
 * Skeleton subclass for representing a row from the 'sft_organismos' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Sun Oct 23 16:15:21 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    plugins.sftGuardPlugin.lib.model
 */
class SftOrganismo extends BaseSftOrganismo
{

    public function getIdOrganismo()
    {
        return $this->getId();
    }

    public function __toString()
    {
        return $this->getNombre();
    }

    public function delete(PropelPDO $con = null)
    {
        // Borramos usuarios
        $usuarios = $this->getSftUsuarios();
        // Solo debería haber uno, pero por si las moscas
        foreach ($usuarios as $usuario)
        {
            // Borramos el usuario asociado y todo su profile
            $usuario->delete();
        }


        parent::delete($con);
    }

    public function getSfusername()
    {
        $usuarios = $this->getSftUsuarios();
        if (count($usuarios) == 1)
        {
            $usuario = $usuarios[0];
            $id_sfuser = $usuario->getIdSfuser();
            $sfuser = sfGuardUserPeer::retrieveByPK($id_sfuser);
            if ($sfuser instanceof sfGuardUser)
            {
                return $sfuser->getUsername();
            } else
            {
                return null;
            }
        } else
        {
            return null;
        }
    }

    public function getSfUser()
    {
        $usuarios = $this->getSftUsuarios();
        if (count($usuarios) == 1)
        {
            $usuario = $usuarios[0];
            $id_sfuser = $usuario->getIdSfuser();
            $sfuser = sfGuardUserPeer::retrieveByPK($id_sfuser);
            return $sfuser;
        } else
        {
            return null;
        }
    }

    public function save(PropelPDO $con = null)
    {
        $isNew = $this->isNew();
        $this->setUpdatedAt(time());
        parent::save($con);

        if ($isNew) // Hay que crearle su sfUser y su SftUsuario
        {
            $sfUser = new sfGuardUser();
            $sfUser->setUsername($this->generaUserName());
            $sfUser->setPassword('pass' . $sfUser->getUsername());
            $sfUser->setIsActive(1);

            $sfUser->save();

            $usuario = new SftUsuario();
            $usuario->setIdSfuser($sfUser->getId());
            $usuario->setAlias($sfUser->getUsername());
            $usuario->setIdCulturapref('es_ES');
            $usuario->setActivo(1);
            $usuario->setIdOrganismo($this->getId());

            $usuario->save();
        }
    }

    public function dameSftUsuario()
    {
        $usuarios = $this->getSftUsuarios();
        if ($usuarios[0] instanceof SftUsuario)
        {
            return $usuarios[0];
        } else
        {
            return null;
        }
    }

    protected function generaUserName()
    {
        $nombre = $this->getNombre();

        $login = "";

        // Se construye un login de 6 caracteres
        // Antes se eliminan acentos, di�resis y caracteres especiales

        $nombre = explode(" ", $nombre);

        switch (count($nombre))
        {
            case 1:
                $nom = (strlen($nombre[0]) >= 4) ? substr($nombre[0], 0, 4) : $nom = substr($nombre[0], 0, strlen($nombre[0]));
                $ap_1 = "";
                $ap_2 = "";
                break;
            case 2:
                $nom = (strlen($nombre[0]) >= 2) ? substr($nombre[0], 0, 2) : $nom = substr($nombre[0], 0, strlen($nombre[0]));
                $ap_1 = (strlen($nombre[1]) >= 2) ? substr($nombre[1], 0, 2) : $nom = substr($nombre[1], 0, strlen($nombre[1]));
                $ap_2 = "";
                break;
            default :
                $nom = substr($nombre[0], 0, 1);
                $ap_1 = substr($nombre[1], 0, 1);
                $ap_2 = (strlen($nombre[1]) >= 2) ? substr($nombre[1], 0, 2) : $nom = substr($nombre[1], 0, strlen($nombre[1]));
                break;
        }

        $login = strtolower($nom . $ap_1 . $ap_2);

        $c = new Criteria();
        $c->add(sfGuardUserPeer::USERNAME, $login . '%', Criteria::LIKE);
        $c->addDescendingOrderByColumn(sfGuardUserPeer::USERNAME);

        $usuarios = sfGuardUserPeer::doSelect($c);

        if (count($usuarios) > 0)
        {
            $usuario = $usuarios[0];

            $num = substr($usuario->getUsername(), 4);

            $num = intval($num) + 1;
        } else
        {
            $num = 0;
        }

        $login .= str_pad($num, 4, "0", STR_PAD_LEFT);

        return $login;
    }

    public function generaPassword()
    {
        return Utilidades::generaClave(6);
    }

}

// SftOrganismo
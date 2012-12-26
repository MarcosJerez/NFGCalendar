<?php

/**
 * miperfil actions.
 *
 * @package    basico
 * @subpackage miperfil
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class miperfilActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $id_sf_user = $this->getUser()->getAttribute('idUsuario', null, 'SftUser');
    $usu = BolUsuarioPeer::retrieveByIdSfUser($id_sf_user);
    
    $this->disp = $usu->getDisponibilidad();
    $this->habilidades = $usu->getBolUsuarioHabilidads();
    
    $this->formHabilidad = new HabilidadForm(); 
  }
  
  public function executeSetDisponibilidad(sfWebRequest $request)
  {
    $id_sf_user = $this->getUser()->getAttribute('idUsuario', null, 'SftUser');
    $disponibilidad = $request->getParameter('disponibilidad',0);
    
    $usu = BolUsuarioPeer::retrieveByIdSfUser($id_sf_user);
    if($usu instanceof BolUsuario)
    {
      $usu->setDisponibilidad($disponibilidad);
      $usu->save();   
    }
    
    $this->forward('miperfil','index');
    
  }
  
  public function executeAddHabilidad(sfWebRequest $request)
  {
    $id_sf_user = $this->getUser()->getAttribute('idUsuario', null, 'SftUser');
    $usu = BolUsuarioPeer::retrieveByIdSfUser($id_sf_user);
    $tHabilidad = $request->getParameter('habilidad',null);
    $id_hab = $tHabilidad['id'];
    
    $usu_hab = new BolUsuarioHabilidad();
    $usu_hab -> setIdUsuario($usu->getId());
    $usu_hab -> setIdHabilidad($id_hab);
    $usu_hab -> save();
    
    $this->forward('miperfil','index');
  }
  
  public function executeAutocompleteHabilidad(sfWebRequest $request)
  {
    $this->getResponse()->setContentType('aplication/json');
    $tHabilidades = BolHabilidadPeer::retrieveForAutoSelect($request->getParameter('q'));
    return $this->renderText(json_encode($tHabilidades));
  }
  
  public function executeDeleteHabilidad(sfWebRequest $request)
  {
    $id_sf_user = $this->getUser()->getAttribute('idUsuario', null, 'SftUser');
    $usu = BolUsuarioPeer::retrieveByIdSfUser($id_sf_user);
    $id_usu = $usu->getId();
    $id_usuhab = $request->getParameter('id',null);
    
    $usu_hab = BolUsuarioHabilidadPeer::retrieveByPK($id_usuhab);
    if($usu_hab instanceof BolUsuarioHabilidad)
    {
      if($id_usu == $usu_hab->getIdUsuario()) //Comprobar que es una habilidad suya (anti-hacking)
      {
        $usu_hab->delete();
      }
    }
    
    $this->forward('miperfil','index');
  }
  
}

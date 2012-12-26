<?php

require_once dirname(__FILE__).'/../lib/actividadesGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/actividadesGeneratorHelper.class.php';

/**
 * actividades actions.
 *
 * @package    nosfaltauno
 * @subpackage actividades
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class actividadesActions extends autoActividadesActions
{
  public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->NfgActividad = $this->form->getObject();
    
    //Modificado respecto de la caché (hay que añadir el id del usuario cogiéndolo de la sesión)
    $data = $request->getParameter($this->form->getName());
    $data['pendiente'] = '1';
    $data['id_usuario'] = NfgUsuarioPeer::dameMiUsuario();
    $data['tipo'] = '1112';
    $request->addRequestParameters(array($this->form->getName()=>$data));
    
    if($this->processForm($request, $this->form))
    {
      sfView::NONE;
    }
    else
    {
      $this->setTemplate('new');
    }
    //Fin de modificación
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $NfgActividad = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $NfgActividad)));

      $this->getUser()->setFlash('notice', $notice);
      return true;
      //$this->redirect(array('sf_route' => 'nfg_actividad_edit', 'sf_subject' => $NfgActividad));
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
      return false;
    }
  }
}

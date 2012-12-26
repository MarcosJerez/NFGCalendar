<?php

/**
 * convocatoria actions.
 *
 * @package    nosfaltauno
 * @subpackage comentarios
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class comentariosActions extends sfActions
{
  /**
  * Executes new action
  *
  * @param sfRequest $request A request object
  */
  public function executeCreate(sfWebRequest $request)
  {
    $idconvocatoria = $request->getParameter('idconv');
    $idusuario = $this->getUser()->getAttribute('idUsuario',null,'SftUser');
    $idusuarioNfg = NfgUsuarioPeer::dameMiUsuario();
    $texto = $request->getParameter('texto');

    $comentario = new NfgComentario();
    $comentario->setIdConvocatoria($idconvocatoria);
    $comentario->setIdUsuario($idusuarioNfg);
    $comentario->setFecha(date('Y-m-d H:i:s'));
    $comentario->setTexto($texto);
    $comentario->save();

    $this->redirect('convocatorias/edit?id='.$idconvocatoria);
  }

}

<?php

require_once dirname(__FILE__).'/../lib/convocatoriasGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/convocatoriasGeneratorHelper.class.php';

/**
 * convocatorias actions.
 *
 * @package    nosfaltauno
 * @subpackage convocatorias
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class convocatoriasActions extends autoConvocatoriasActions
{
  public function executeAutocompleteActividad(sfWebRequest $request)
  {
       $this->getResponse()->setContentType('aplication/json');
       $nombreActividad = NfgActividadPeer::retrieveForAutoSelect($request->getParameter('q'));
       return $this->renderText(json_encode($nombreActividad));
  }

  public function executeAutocompleteLugar(sfWebRequest $request)
  {
       $this->getResponse()->setContentType('aplication/json');
       $nombreLugar = NfgLugarPeer::retrieveForAutoSelect($request->getParameter('q'));
       return $this->renderText(json_encode($nombreLugar));
  }

  public function executeAutocompleteNombreUsuario(sfWebRequest $request)
  {
       $this->getResponse()->setContentType('aplication/json');
       $nombreUsuario = NfgUsuarioPeer::retrieveForAutoSelect($request->getParameter('q'));
       return $this->renderText(json_encode($nombreUsuario));
  }
  
  public function executeIndex(sfWebRequest $request)
  {
    $id_usuario = NfgUsuarioPeer::dameMiUsuario();
    
    //Tus convocatorias: Convocatorias vigentes. Sin paginado y ordenado por cercania de fecha
    $criteria = new Criteria();
    $criteria->add(NfgConvocatoriaPeer::ID_USUARIO,$id_usuario);
//    if($request->hasParameter('mes') && $request->hasParameter('dia') && $request->hasParameter('ano'))
//    {//Esto es al pinchar en el calendario
//        $fechaConvocatoria = $request->getParameter('ano').'-'.$request->getParameter('mes').'-'.$request->getParameter('dia');
//        $criteria->add(NfgConvocatoriaPeer::FECHA_INI, $fechaConvocatoria);
//        $criteria->add(NfgConvocatoriaPeer::FECHA_FIN, $fechaConvocatoria);
//        $criteria->addDescendingOrderByColumn(NfgConvocatoriaPeer::HORA_INI);
//    }
//    else
    $criteria->add(NfgConvocatoriaPeer::FECHA_INI, date('Y-m-d'), Criteria::GREATER_EQUAL);

//    $pager = $this->configuration->getPager('NfgConvocatoria');
//    $pager->setCriteria($criteria);
//    $pager->setPage($this->getPage());
//    $pager->setPeerMethod($this->configuration->getPeerMethod());
//    $pager->setPeerCountMethod($this->configuration->getPeerCountMethod());
//    $pager->init();
//    $this->pagerUsuario = $pager;
    $this->convocatoriasUsuario = NfgConvocatoriaPeer::doSelect($criteria);
    
    //También las que esté apuntado (debería ser en la misma consulta para ordenar por fecha)
    $criteria = new Criteria();
    $criteria->add(NfgParticipantePeer::ID_USUARIO,$id_usuario);
    $criteria->add(NfgConvocatoriaPeer::FECHA_INI, date('Y-m-d'), Criteria::GREATER_EQUAL);
    $criteria->addJoin(NfgParticipantePeer::ID_CONVOCATORIA, NfgConvocatoriaPeer::ID);
    $this->convocatoriasUsuario = array_merge($this->convocatoriasUsuario,NfgConvocatoriaPeer::doSelect($criteria));
    

    //Tus sugerencias: Sin paginado y ordenado por cercanía de fecha
    $criteria = new Criteria();
    $criteria->add(NfgConvocatoriaPeer::ID_USUARIO,$id_usuario, Criteria::NOT_EQUAL);
    $criteria->add(NfgConvocatoriaPeer::PRIVADA,  1, Criteria::NOT_EQUAL);
    $criteria->add(NfgConvocatoriaPeer::FECHA_INI, date('Y-m-d'), Criteria::GREATER_EQUAL);

    //En vez de usar paginado, limitar los resultados por ejemplo a 10. Para buscar ya está la búsqueda.
    $pager = $this->configuration->getPager('NfgConvocatoria');
    $pager->setCriteria($criteria);
    $pager->setPage($this->getPage());
    $pager->setPeerMethod($this->configuration->getPeerMethod());
    $pager->setPeerCountMethod($this->configuration->getPeerCountMethod());
    $pager->init();
    $this->pagerSugerencias = $pager;
	
    $this->sort = $this->getSort();
  }
  
  public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->NfgConvocatoria = $this->form->getObject();

    $id_usuario = NfgUsuarioPeer::dameMiUsuario();

    $datos = $request->getParameter($this->form->getName());
    $datos['id_usuario'] = $id_usuario;
    $request->addRequestParameters(array($this->form->getName() => $datos));

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    $this->NfgConvocatoria = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->NfgConvocatoria);

    $oCriteria = new Criteria();
    $oCriteria->add(NfgApuntadoPeer::ID_CONVOCATORIA, $this->NfgConvocatoria->getId());
    $this->NfgApuntado = NfgApuntadoPeer::doSelect($oCriteria);

    $this->nombre_invitado = new sfWidgetFormChoice(array(
                                        'choices' => array(),
                                        'renderer_class' => 'sfWidgetFormPropelJQueryAutocompleter',
                                        'renderer_options' => array(
                                                    'model' => 'NfgUsuario',
                                                    'method' => 'getAlias',
                                                    'url' => sfContext::getInstance()->getController()->genUrl('convocatorias/autocompleteNombreUsuario'),
                                                   )));

    $id_usuario = NfgUsuarioPeer::dameMiUsuario();
    $id_usuario_convocatoria = $this->NfgConvocatoria->getIdUsuario();
        
    if($id_usuario == $id_usuario_convocatoria) return 'Success';
    else
    {
      $criteria = new Criteria();
      $criteria->add(NfgParticipantePeer::ID_USUARIO,$id_usuario);
      if($this->NfgConvocatoria->countNfgParticipantes($criteria) > 0) 
      {
        $this->setTemplate('viewParticipante');
        return 'Success';
      }
      else
      {
        $this->setTemplate('viewNoparticipante');
        return 'Success';
      }
    }
  }

  // TODO: comprobar en las 3 tablas: participantes, suplentes, apuntado
  public function executeApuntarse(sfWebRequest $request)
  {
    $id_convocatoria = $request->getParameter('id_convocatoria');
    $id_usuario = NfgUsuarioPeer::dameMiUsuario();

    $numTotalPersonas = $this->numTotalPersonasConvocatorias($id_convocatoria);

    $oConvocatoria = NfgConvocatoriaPeer::retrieveByPK($id_convocatoria);

    //Nº participantes ACTUAL < Nº participantes max. permitidos para esta convocatoria.
    if($numTotalPersonas < $oConvocatoria->getParticipantesMax())
    {
        $NfgParticipante = new NfgParticipante();
        $NfgParticipante->setIdConvocatoria($id_convocatoria);
        $NfgParticipante->setIdUsuario($id_usuario);
        $NfgParticipante->save();
    }
    else
    {
        $NfgSuplente = new NfgSuplente();
        $NfgSuplente->setIdConvocatoria($id_convocatoria);
        $NfgSuplente->setIdUsuario($id_usuario);
        $NfgSuplente->save();
    }

    $this->redirect('convocatorias/edit?id='.$id_convocatoria);
  }
  
  public function executeDesapuntarse(sfWebRequest $request)
  {
    $id_convocatoria = $request->getParameter('id_convocatoria');
    $id_usuario = NfgUsuarioPeer::dameMiUsuario();

    $oCriteria = new Criteria();
    $oCriteria->add(NfgParticipantePeer::ID_CONVOCATORIA, $id_convocatoria);
    $numParticipantes = NfgParticipantePeer::doCount($oCriteria);

    $oConvocatoria = NfgConvocatoriaPeer::retrieveByPK($id_convocatoria);

    //Nº participantes ACTUAL < Nº participantes max. permitidos para esta convocatoria.
    $criteria = new Criteria();
    $criteria->add(NfgParticipantePeer::ID_CONVOCATORIA,$id_convocatoria);
    $criteria->add(NfgParticipantePeer::ID_USUARIO,$id_usuario);
    $oParticipantes = NfgParticipantePeer::doSelectOne($criteria);

    $criteria = new Criteria();
    $criteria->add(NfgSuplentePeer::ID_CONVOCATORIA,$id_convocatoria);
    $criteria->add(NfgSuplentePeer::ID_USUARIO,$id_usuario);
    $oSuplente = NfgSuplentePeer::doSelectOne($criteria);

    if($oParticipantes instanceof NfgParticipante)
        $oParticipantes->delete();
    elseif($oSuplente instanceof NfgSuplente)
        $oSuplente->delete();

    $this->redirect('convocatorias/edit?id='.$id_convocatoria);
  }

   public function executeApuntar(sfWebRequest $request)
  {
    $id_convocatoria = $request->getParameter('id_convocatoria');
    $autocomplete_nombre_invitado = $request->getParameter('autocomplete_nombre_invitado');
    $dato = explode('-', $autocomplete_nombre_invitado);
    $invitado = trim($dato[0]);
    $oCriteria = new Criteria();
    $oCriteria->add(SftUsuarioPeer::ALIAS, $invitado);
    $oEdaUsuario = SftUsuarioPeer::doSelectOne($oCriteria);

    $numTotalPersonas = $this->numTotalPersonasConvocatorias($id_convocatoria);
    $oConvocatoria = NfgConvocatoriaPeer::retrieveByPK($id_convocatoria);

    if($numTotalPersonas < $oConvocatoria->getParticipantesMax()) /*Si no ha llegado al limite de gente en la convocatorias*/
    {
        if($oEdaUsuario instanceof EdaUsuarios)
        {
            $oCriteria = new Criteria();
            $oCriteria->add(NfgUsuarioPeer::ID_SFUSER,$oEdaUsuario->getId());
            $NfgUsuario = NfgUsuarioPeer::doSelectOne($oCriteria);

            //Verificación de Invitado, Comprobación si ya está invitado...
            $oCriteria = new Criteria();
            $oCriteria->add(NfgInvitadoPeer::ID_CONVOCATORIA,$id_convocatoria);
            $oCriteria->add(NfgInvitadoPeer::ID_USUARIO,$NfgUsuario->getId());
            $NfgInvitadoConvocatoria = NfgInvitadoPeer::doSelectOne($oCriteria);

            if($NfgInvitadoConvocatoria instanceof NfgInvitado)
            {
                //Ya existe ete usuario en en esta convocatoria
                $this->redirect('convocatorias/edit?id='.$id_convocatoria);
            }
            //FIN DE COMPROBACIÓN

            if($NfgUsuario instanceof NfgUsuario) //Si esta en la BBDD lo metemos en la tabla invitado a espera de confirmación del ususario
            {
                $NfgInvitado = new NfgInvitado();
                $NfgInvitado->setIdConvocatoria($id_convocatoria);
                $NfgInvitado->setIdUsuario($NfgUsuario->getId());
                $NfgInvitado->save();
            }
            $this->redirect('convocatorias/edit?id='.$id_convocatoria);
        }
        elseif(!empty($autocomplete_nombre_invitado))
        {
            //Verificación de Apuntado, Comprobación si ya está apuntado...
            $oCriteria = new Criteria();
            $oCriteria->add(NfgApuntadoPeer::ID_CONVOCATORIA,$id_convocatoria);
            $oCriteria->add(NfgApuntadoPeer::APUNTADO,$autocomplete_nombre_invitado);
            $NfgApuntadoConvocatoria = NfgApuntadoPeer::doSelectOne($oCriteria);

            if($NfgApuntadoConvocatoria instanceof NfgApuntado)
            {
                //Ya existe ete usuario en en esta convocatoria
                $this->redirect('convocatorias/edit?id='.$id_convocatoria);
            }
            //FIN DE COMPROBACIOÓN
            else
            {
                $NfgApuntado = new NfgApuntado();
                $NfgApuntado->setIdConvocatoria($id_convocatoria);
                $NfgApuntado->setApuntado($autocomplete_nombre_invitado);
                $NfgApuntado->save();

                $this->redirect('convocatorias/edit?id='.$id_convocatoria);
            }
        }
        else{
            //Comentario mal
           }
    }
    else
    {
        // Lo APuntamos como suplente!!! //Hay qe mirar nombre normal!!
        $NfgSuplente = new NfgSuplente();
        $NfgSuplente->setIdConvocatoria($id_convocatoria);
        $NfgSuplente->setIdUsuario($id_usuario);
        $NfgSuplente->save();
    }
 }

  public function executeDesapuntar(sfWebRequest $request)
  {
    $id_invitado = $request->getParameter('id');
    $id_convocatoria = $request->getParameter('id_convocatoria');

    $oApuntado = NfgApuntadoPeer::retrieveByPK($id_invitado);
    $oApuntado->delete();

    $this->redirect('convocatorias/edit?id='.$id_convocatoria);
  }

  public function executeDesInvitar(sfWebRequest $request)
  {
    $id_invitado = $request->getParameter('id');
    $id_convocatoria = $request->getParameter('id_convocatoria');

    $NfgInvitado = NfgInvitadoPeer::retrieveByPK($id_invitado);
    $NfgInvitado->delete();

    $this->redirect('convocatorias/edit?id='.$id_convocatoria);
  }

  private function numTotalPersonasConvocatorias($id_convocatoria)
  {
      // Nº de participantes de una convocatoria
    $oCriteria = new Criteria();
    $oCriteria->add(NfgParticipantePeer::ID_CONVOCATORIA, $id_convocatoria);
    $numParticipantes = NfgParticipantePeer::doCount($oCriteria);

    // Nº de invitados de una convocatoria
    $oCriteria = new Criteria();
    $oCriteria->add(NfgInvitadoPeer::ID_CONVOCATORIA, $id_convocatoria);
    $numInvitados = NfgInvitadoPeer::doCount($oCriteria);

    $numTotalPersonas = $numParticipantes + $numInvitados;
    return $numTotalPersonas;
  }
}

<?php

/**
 * calendar actions.
 *
 * @package    basico
 * @subpackage calendar
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class calendarActions extends sfActions
{
  protected function fb_init()
  {
    define('FB_APP_ID', 38871837476);
    define('FB_APP_SECRET', '3a3bf26d209538439c142ac216120124');
    $isAuthenticated = false;

    //uses the PHP SDK.  Download from https://github.com/facebook/php-sdk
    $webdir = sfConfig::get('sf_web_dir');
    require $webdir.'/fb/src/facebook.php';

    $this->access_token = $facebook = new Facebook(array(
      'appId'  => FB_APP_ID,
      'secret' => FB_APP_SECRET,
      //  'scope' => 'manage_groups',
    ));

    $fb_userId = $facebook->getUser();
    
    if ($fb_userId)
    { 
      $isAuthenticated = true;
      $userInfo = $facebook->api('/' + $fb_userId);
      
      $criteria = new Criteria();
      $criteria->add(NfgUsuarioPeer::ID_FBUSER,$fb_userId);
      $nfg_user = NfgUsuarioPeer::doSelectOne($criteria);
      if (!($nfg_user instanceof NfgUsuario))
      {
        $nfg_user = new NfgUsuario();
        $nfg_user->setIdFbuser($fb_userId);
        $nfg_user->setAlias($userInfo['name']);
        $nfg_user->save();
      }
      $sf_user = $this->getUser();
      $sf_user->setAuthenticated(true);
      $sf_user->setAttribute('userId',$nfg_user->getId(),'NfgUser');
      $sf_user->setAttribute('userId',$fb_userId,'FbUser');
      $sf_user->setAttribute('userName',$userInfo['name'],'FbUser');
      $sf_user->setCulture('es_ES');
    }
    else
    {
      $this->getUser()->setCulture('es_ES');
      $this->getUser()->setAuthenticated(false);
    }
      
      
    $this->facebook = $facebook;
    $this->fb_userId = $fb_userId;
    return $isAuthenticated;
  }
  
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //De momento todo a executeTarifaMesa
//    $this->forward('calendar','tarifaMesa');

    $this->isAuthenticated = $this->fb_init(); 
    $this->urlEventos = 'calendar/convTodasJSON';
    $criteria = new Criteria();
    $this->widgetActividades = new sfWidgetFormPropelChoice(array('model'=>'NfgActividad','method'=>'getAbrev','criteria'=>$criteria));
    $this->widgetLocalidades = new sfWidgetFormPropelChoice(array('model' => 'NfgLocalidad', 'order_by'=>array('Nombre','asc'),'add_empty' => false));
    
    if($this->isAuthenticated) $this->setTemplate('index');
    else $this->setTemplate('indexNoLogin');
    $this->setLayout('layout2');
    
//    $result = $this->facebook->api( '/groups/477018869004497/','post', array('access_token' => $this->facebook->getAccessToken(),
//                                                                             'message' => 'Playing around with FB Graph..',
//                                                                             'name'=>"Anonimo") );
  }
  
  public function executeXActividad(sfWebRequest $request)
  {
    $this->isAuthenticated = $this->fb_init(); 
    $id = $request->getParameter('id');
    $this->urlEventos = '@XActividadJSON?id='.$id;
    
    $this->actividad = NfgActividadPeer::retrieveByPK($id);
    $this->widgetActividades = new sfWidgetFormPropelChoice(array('model'=>'NfgActividad','method'=>'getAbrev'));
    $this->widgetLocalidades = new sfWidgetFormPropelChoice(array('model' => 'NfgLocalidad', 'order_by'=>array('Nombre','asc'),'add_empty' => false));
    
    if($this->isAuthenticated) $this->setTemplate('index');
    else $this->setTemplate('indexNoLogin');
    $this->setLayout('layout2');
  }
  
  
  
  public function executeXCategoria(sfWebRequest $request)
  {
    $this->isAuthenticated = $this->fb_init(); 
    $id = $request->getParameter('id');
    $this->urlEventos = '@XCategoriaJSON?id='.$id;
    
    //$id_categoria = 3;
    $this->categoria = NfgCategoriaPeer::retrieveByPK($id);
    $criteria = new Criteria();
    //$criteria->add(NfgActividadPeer::ID_CATEGORIA,$id_categoria);
    $this->widgetActividades = new sfWidgetFormPropelChoice(array('model'=>'NfgActividad','method'=>'getAbrev','criteria'=>$criteria));
    $this->widgetLocalidades = new sfWidgetFormPropelChoice(array('model' => 'NfgLocalidad', 'order_by'=>array('Nombre','asc'),'add_empty' => false));
    
    if($this->isAuthenticated) $this->setTemplate('index');
    else $this->setTemplate('indexNoLogin');
    $this->setLayout('layout2');
  }
    
  public function executeConvTodasJSON(sfWebRequest $request)
  {
    $this->setLayout(false);
    sfConfig::set('sf_web_debug', false);
    
    $start = $request->getParameter('start',strtotime('first day of this month'));
    $end = $request->getParameter('end',strtotime('last day of this month'));
    
    $start = date('Y-m-d',$start);
    $end = date('Y-m-d',$end);
    
    $criteria = new Criteria();
    $criteria->add(NfgConvocatoriaPeer::FECHA_INI,$start,CRITERIA::GREATER_EQUAL);
    //$criteria->add(NfgConvocatoriaPeer::FECHA_INI,$end,CRITERIA::LESS_EQUAL);
    $convocatorias = NfgConvocatoriaPeer::doSelect($criteria);
  
    if (headers_sent($filename, $linenum)) echo "Headers already sent in $filename on line $linenum\n";
    echo $this->conv2json($convocatorias);
    return sfView::NONE; 
  }
  
  public function executeXActividadJSON(sfWebRequest $request)
  {
    $this->setLayout(false);
    sfConfig::set('sf_web_debug', false);
    $id_actividad = $request->getParameter('id');
    
    $start = $request->getParameter('start',strtotime('first day of this month'));
    $end = $request->getParameter('end',strtotime('last day of this month'));
    
    $start = date('Y-m-d',$start);
    $end = date('Y-m-d',$end);

    //$id_actividad = 7;
    $criteria = new Criteria();
    $criteria->add(NfgConvocatoriaPeer::ID_ACTIVIDAD,$id_actividad);
    $criteria->add(NfgConvocatoriaPeer::FECHA_INI,$start,CRITERIA::GREATER_EQUAL);
    //$criteria->add(NfgConvocatoriaPeer::FECHA_INI,$end,CRITERIA::LESS_EQUAL);
    $convocatorias = NfgConvocatoriaPeer::doSelect($criteria);
  
    if (headers_sent($filename, $linenum)) echo "Headers already sent in $filename on line $linenum\n";
    echo $this->conv2json($convocatorias);
    return sfView::NONE;
  }
  
  public function executeXCategoriaJSON(sfWebRequest $request)
  {
    $this->setLayout(false);
    sfConfig::set('sf_web_debug', false);
    $id_categoria = $request->getParameter('id');
    
    $start = $request->getParameter('start',strtotime('first day of this month'));
    $end = $request->getParameter('end',strtotime('last day of this month'));
    
    $start = date('Y-m-d',$start);
    $end = date('Y-m-d',$end);

    //$id_actividad = 7;
    $criteria = new Criteria();
    $criteria->add(NfgActividadPeer::ID_CATEGORIA,$id_categoria);
    $criteria->addJoin(NfgActividadPeer::ID,NfgConvocatoriaPeer::ID_ACTIVIDAD);
    $criteria->add(NfgConvocatoriaPeer::FECHA_INI,$start,CRITERIA::GREATER_EQUAL);
    //$criteria->add(NfgConvocatoriaPeer::FECHA_INI,$end,CRITERIA::LESS_EQUAL);
    $convocatorias = NfgConvocatoriaPeer::doSelect($criteria);
  
    if (headers_sent($filename, $linenum)) echo "Headers already sent in $filename on line $linenum\n";
    echo $this->conv2json($convocatorias);
    return sfView::NONE;
  }
  
  private function conv2json($convocatorias)
  {
    $userId = $this->getUser()->getAttribute('userId',null,'NfgUser');
    $eventos = array();
    foreach ($convocatorias as $convocatoria) {
      $estaapuntado = false; //Si está en la tabla nfg_participantes
      $evento = array(); 
      $evento['id'] = $convocatoria->getId();
      $evento['title'] = $convocatoria->getNfgActividad()->getAbrev();
      $evento['start'] = $convocatoria->getFechaIni().' '.$convocatoria->getHoraIni();
      $evento['className'] = str_replace(' ', '_', $convocatoria->getNfgActividad()->getAbrev());
      $evento['apuntados'] = array();
      $evento['espropietario'] = ($convocatoria->getId() == $userId);
      $evento['apuntados'][] = array('nombre'=>$convocatoria->getNfgUsuario()->getAlias(),'fbId'=>$convocatoria->getNfgUsuario()->getIdFbuser());
      $apuntados = $convocatoria->getNfgParticipantes();
      foreach($apuntados as $apuntado)
      {//$apuntado = new NfgParticipante();
        $evento['apuntados'][] = array('nombre'=>$apuntado->getNfgUsuario()->getAlias(),'fbId'=>$apuntado->getNfgUsuario()->getIdFbuser());
        if(($apuntado->getIdUsuario() == $userId)) $estaapuntado = true;
      }
      $evento['estaapuntado'] = $estaapuntado;
      $evento['textoFaltan'] = $convocatoria->getFaltan();
      $evento['admiteMasGente'] = ($convocatoria->numApuntados() < $convocatoria->getParticipantesMax());
      $evento['acciones'] = $convocatoria->getAccionesUsuario($userId);
      $evento['color'] = $evento['admiteMasGente']?'green':'red';
      $eventos[] = $evento;
    }
    
    return json_encode($eventos);
  }
  
  /**
   * Presenta el formulario de Nueva convocatoria
   * 
   * El formulario está en un componente así que newSuccess simplemente 
   * llamará al componente
   * 
   * @param sfWebRequest $request
   */
  public function executeNew(sfWebRequest $request)
  {
    $this->setLayout('layout2');
    $convocatoria = new NfgConvocatoria();
    $this->convocatoria = $convocatoria;
    
    if ($request->isMethod('post'))
    {
      //Validar los datos
      $params = $request->getParameter('convocatoria');
      $autocompletes = $request->getParameter('autocomplete');

      $fb_user = $this->getUser()->getAttribute('userId',null,'FbUser');
      $criteria = new Criteria();
      $criteria->add(NfgUsuarioPeer::ID_FBUSER,$fb_user);
      $nfg_user = NfgUsuarioPeer::doSelectOne($criteria);
      $id_usuario = $nfg_user->getId();
      
      
      //$id_usuario = 32;
      //Si los datos son válidos, guardar y redirigir
      $convocatoria->setIdUsuario($id_usuario);
      $convocatoria->setIdActividad($params['id_actividad']);
      $convocatoria->setIdLugarIni($params['id_lugar_ini']);
      if(!empty($params['id_lugar_fin'])) $convocatoria->setIdLugarFin($params['id_lugar_fin']);
      $convocatoria->setFechaIni(DateTime::createFromFormat('d/m/Y', $params['dia'])->format('Y-m-d'));
      $convocatoria->setHoraIni($params['hora'].':00');
      $convocatoria->setParticipantesMin($params['participantes_min']);
      if(!empty($params['participantes_max'])) $convocatoria->setParticipantesMax($params['participantes_max']);
      $convocatoria->save();

      $this->redirect('calendar/index');
    }
    
    $this->convocatoria = $convocatoria;
    
  }
  
  /**
   * Autocomplete de actividades para los formularios de nueva convocatoria y
   * editar convocatoria
   * 
   * @param sfWebRequest $request
   * @return json_array
   */
  public function executeAutocompleteActividad(sfWebRequest $request)
  {
    $this->getResponse()->setContentType('aplication/json');
    $actividades = NfgActividadPeer::retrieveForAutoSelect($request->getParameter('term'));
    return $this->renderText(json_encode($actividades));
  }
  
  /**
   * Autocomplete de lugares para los formularios de nueva convocatoria y
   * editar convocatoria
   * 
   * @param sfWebRequest $request
   * @return json_array
   */
  public function executeAutocompleteLugar(sfWebRequest $request)
  {
    $this->getResponse()->setContentType('aplication/json');
    $lugares = NfgLugarPeer::retrieveForAutoSelect($request->getParameter('term'));
    return $this->renderText(json_encode($lugares));
  }
  
  public function executeCreate(sfWebRequest $request)
  {
    $params = $request->getParameter('convocatoria');
    $autocompletes = $request->getParameter('autocomplete');
    
    $fb_user = $this->getUser()->getAttribute('userId',null,'FbUser');
    $criteria = new Criteria();
    $criteria->add(NfgUsuarioPeer::ID_FBUSER,$fb_user);
    $nfg_user = NfgUsuarioPeer::doSelectOne($criteria);
    $id_usuario = $nfg_user->getId();
    
    $convocatoria = new NfgConvocatoria();
    $convocatoria->setIdUsuario($id_usuario);
    $convocatoria->setIdActividad($params['id_actividad']);
    $convocatoria->setIdLugarIni(7);
    $convocatoria->setFechaIni($params['dia']);
    $convocatoria->setHoraIni($params['hora'].':00');
    $convocatoria->setParticipantesMin($params['participantes_min']);
    $convocatoria->setParticipantesMax($params['participantes_max']);
    $convocatoria->save();
    
    $this->redirect('calendar/index');
  }
  
  // TODO: comprobar en las 3 tablas: participantes, suplentes, apuntado
  /** Para las tarifas mesa del AVE quito los suplentes */
  public function executeApuntarse(sfWebRequest $request)
  {
    $id_convocatoria = $request->getParameter('id');
    $id_usuario = $this->getUser()->getAttribute('userId',null,'NfgUser');

    $oConvocatoria = NfgConvocatoriaPeer::retrieveByPK($id_convocatoria);
    $oConvocatoria->apuntar($id_usuario);

    $this->redirect('calendar/index');
  }
  
  // TODO: comprobar en las 3 tablas: participantes, suplentes, apuntado
  /** Para las tarifas mesa del AVE quito los suplentes */
  public function executeDesapuntarse(sfWebRequest $request)
  {
    $id_convocatoria = $request->getParameter('id');
    $id_usuario = $this->getUser()->getAttribute('userId',null,'NfgUser');
    
    $oConvocatoria = NfgConvocatoriaPeer::retrieveByPK($id_convocatoria);
    if($oConvocatoria instanceof NfgConvocatoria)
      $oConvocatoria->desapuntar($id_usuario);

    $this->redirect('calendar/index');
  }
  
  // TODO: comprobar en las 3 tablas: participantes, suplentes, apuntado
  /** Para las tarifas mesa del AVE quito los suplentes */
  public function executeCancelar(sfWebRequest $request)
  {
    $convocatoria_params = $request->getParameter('convocatoria');
    $id_convocatoria = $convocatoria_params['id'];
    $id_usuario = $this->getUser()->getAttribute('userId',null,'NfgUser');
    
    $oConvocatoria = NfgConvocatoriaPeer::retrieveByPK($id_convocatoria);
    if($oConvocatoria instanceof NfgConvocatoria)
      if($id_usuario == $oConvocatoria->getIdUsuario()) $oConvocatoria->cancelar();

    $this->redirect('calendar/index');
  }
  
  public function executeEvento(sfWebRequest $request)
  {
    $id_convocatoria = $request->getParameter('id');
    //$id_convocatoria = $convocatoria_params['id'];
    $id_usuario = $this->getUser()->getAttribute('userId',null,'NfgUser');
//$id_usuario = 32;    
    $convocatoria = NfgConvocatoriaPeer::retrieveByPK($id_convocatoria);
    $id_usuario_convocatoria = $convocatoria->getIdUsuario();
    
    $criteria = new Criteria();
    $criteria->add(NfgApuntadoPeer::ID_CONVOCATORIA, $id_convocatoria);
    $this->NfgApuntado = NfgApuntadoPeer::doSelect($criteria);

    $this->nombre_invitado = new sfWidgetFormChoice(array(
                                        'choices' => array(),
                                        'renderer_class' => 'sfWidgetFormPropelJQueryAutocompleter',
                                        'renderer_options' => array(
                                                    'model' => 'NfgUsuario',
                                                    'method' => 'getAlias',
                                                    'url' => sfContext::getInstance()->getController()->genUrl('convocatorias/autocompleteNombreUsuario'),
                                                   )));

    $criteria = new Criteria();
    $this->widgetActividades = new sfWidgetFormPropelChoice(array('model'=>'NfgActividad','method'=>'getAbrev','criteria'=>$criteria));
    $this->widgetLugares = new sfWidgetFormPropelChoice(array('model' => 'NfgLugar', 'add_empty' => false));
     
    $this->convocatoria = $convocatoria;
    
    //    if($convocatoria instanceof NfgConvocatoria)
//    {
//      
//    }
    $this->setLayout('layout2');
      
    if($id_usuario == $id_usuario_convocatoria)
    //if(true)
    {
      $this->setTemplate('edit');
      return 'Success';
    }
    else
    {
      $criteria = new Criteria();
      $criteria->add(NfgParticipantePeer::ID_USUARIO,$id_usuario);
      if($convocatoria->countNfgParticipantes($criteria) > 0) 
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
  
  
  public function executePublicar(sfWebRequest $request)
  {
    $this->isAuthenticated = $this->fb_init(); 
    
    $this->setLayout('layout2');
    
    //print_r($this->access_token); exit;
//    
//    $result = $this->facebook->api( '/groups/477018869004497/','post', array('access_token' => $this->facebook->getAccessToken(),
//                                                                             'message' => 'Playing around with FB Graph..',
//                                                                             'name'=>"Anonimo") );
//  print_r($result); exit;
//  
// // <fb:prompt-permission perms="read_stream,publish_stream">¿Quieres publicar tus viajes en facebook?</fb:prompt-permission>
//
//    
//    $result = $this->facebook->api( '/me/feed/','post', array('access_token' => $this->facebook->getAccessToken(),
//                                                              'message' => 'Playing around with FB Graph..') );
//    
//    
   }
   
  
}
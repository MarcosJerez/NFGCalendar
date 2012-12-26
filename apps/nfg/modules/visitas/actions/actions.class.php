<?php

/**
 * visitas actions.
 *
 * @package    edae3
 * @subpackage inicio
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class visitasActions extends sfActions {

    public function executeVer(sfWebRequest $request)
    {
        $id_convocatoria = $request->getParameter('id');

        $oCriteria = new Criteria();
        $oCriteria->add(NfgConvocatoriaPeer::ID, $id_convocatoria);
        $this->NfgConvocatoria = NfgConvocatoriaPeer::doSelectOne($oCriteria);

        $oCriteria = new Criteria();
        $oCriteria->add(NfgParticipantePeer::ID_CONVOCATORIA, $this->NfgConvocatoria->getId());
        $this->NfgParticipantes = NfgParticipantePeer::doSelect($oCriteria);


        $oCriteria = new Criteria();
        $oCriteria->add(NfgApuntadoPeer::ID_CONVOCATORIA, $this->NfgConvocatoria->getId());
        $this->NfgApuntado = NfgApuntadoPeer::doSelect($oCriteria);

    }
}
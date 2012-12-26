<?php

require_once dirname(__FILE__).'/../lib/convocatoriaBusquedaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/convocatoriaBusquedaGeneratorHelper.class.php';

/**
 * convocatoriaBusqueda actions.
 *
 * @package    nosfaltauno
 * @subpackage convocatoriaBusqueda
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class convocatoriaBusquedaActions extends autoConvocatoriaBusquedaActions
{
    protected function buildCriteria()
    {
        if ($this->configuration->hasFilterForm())
        {
            if (null === $this->filters)
            {
                $this->filters = $this->configuration->getFilterForm($this->getFilters());
            }

            $criteria = $this->filters->buildCriteria($this->getFilters());
        }
        else
            $criteria = new Criteria();
        
        $this->addSortCriteria($criteria);
        $id_usuario = NfgUsuarioPeer::dameMiUsuario();
        $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_criteria'), $criteria);
        $criteria = $event->getReturnValue();
        $criteria->add(NfgConvocatoriaPeer::ID_USUARIO,$id_usuario, Criteria::NOT_EQUAL);
        $criteria->add(NfgConvocatoriaPeer::PRIVADA, 1, Criteria::NOT_EQUAL);
        $criteria->add(NfgConvocatoriaPeer::FECHA_INI, date('Y-m-d'), Criteria::GREATER_EQUAL);

        return $criteria;
    }
}

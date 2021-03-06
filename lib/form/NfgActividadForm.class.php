<?php

/**
 * NfgActividad form.
 *
 * @package    nosfaltauno
 * @subpackage form
 * @author     Your name here
 */
class NfgActividadForm extends BaseNfgActividadForm
{
  public function configure()
  {
    $this->setWidget('descripcion',new sfWidgetFormTextarea());
    
    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'id_categoria' => new sfValidatorPropelChoice(array('model' => 'NfgCategoria', 'column' => 'id', 'required' => false)),
      'nombre'       => new sfValidatorString(array('max_length' => 100)),
      'descripcion'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'tipo'         => new sfValidatorInteger(array('min' => 0, 'max' => 4444, 'required' => false)),
      'pendiente'    => new sfValidatorBoolean(),
      'id_usuario'   => new sfValidatorPropelChoice(array('model' => 'NfgUsuario', 'column' => 'id', 'required' => false)),
    ));
  }
}

<?php

/**
 * SftEstadisticaAplicacion form base class.
 *
 * @method SftEstadisticaAplicacion getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftEstadisticaAplicacionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'id_aplicacion'  => new sfWidgetFormPropelChoice(array('model' => 'SftAplicacion', 'add_empty' => false)),
      'id_usuario'     => new sfWidgetFormPropelChoice(array('model' => 'SftUsuario', 'add_empty' => false)),
      'numero_accesos' => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
      'navegador'      => new sfWidgetFormInputText(),
      'ip_cliente'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'id_aplicacion'  => new sfValidatorPropelChoice(array('model' => 'SftAplicacion', 'column' => 'id')),
      'id_usuario'     => new sfValidatorPropelChoice(array('model' => 'SftUsuario', 'column' => 'id')),
      'numero_accesos' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'created_at'     => new sfValidatorDateTime(array('required' => false)),
      'updated_at'     => new sfValidatorDateTime(array('required' => false)),
      'navegador'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ip_cliente'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_estadistica_aplicacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftEstadisticaAplicacion';
  }


}

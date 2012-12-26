<?php

/**
 * SftTelefono form base class.
 *
 * @method SftTelefono getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftTelefonoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'numerotelefono'  => new sfWidgetFormInputText(),
      'id_tipotelefono' => new sfWidgetFormPropelChoice(array('model' => 'SftTipoTelefono', 'add_empty' => false)),
      'id_usuario'      => new sfWidgetFormPropelChoice(array('model' => 'SftUsuario', 'add_empty' => true)),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'numerotelefono'  => new sfValidatorString(array('max_length' => 20)),
      'id_tipotelefono' => new sfValidatorPropelChoice(array('model' => 'SftTipoTelefono', 'column' => 'id')),
      'id_usuario'      => new sfValidatorPropelChoice(array('model' => 'SftUsuario', 'column' => 'id', 'required' => false)),
      'created_at'      => new sfValidatorDateTime(array('required' => false)),
      'updated_at'      => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_telefono[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftTelefono';
  }


}

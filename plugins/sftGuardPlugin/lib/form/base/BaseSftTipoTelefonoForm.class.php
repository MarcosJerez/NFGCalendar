<?php

/**
 * SftTipoTelefono form base class.
 *
 * @method SftTipoTelefono getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftTipoTelefonoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id' => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_tipo_telefono[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftTipoTelefono';
  }

  public function getI18nModelName()
  {
    return 'SftTipoTelefonoI18n';
  }

  public function getI18nFormClass()
  {
    return 'SftTipoTelefonoI18nForm';
  }

}

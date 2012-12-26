<?php

/**
 * SftTipoDocIdentificacion form base class.
 *
 * @method SftTipoDocIdentificacion getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftTipoDocIdentificacionForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'funciondecontrol' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'funciondecontrol' => new sfValidatorString(array('max_length' => 24, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_tipo_doc_identificacion[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftTipoDocIdentificacion';
  }

  public function getI18nModelName()
  {
    return 'SftTipoDocIdentificacionI18n';
  }

  public function getI18nFormClass()
  {
    return 'SftTipoDocIdentificacionI18nForm';
  }

}

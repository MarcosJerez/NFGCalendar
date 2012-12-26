<?php

/**
 * SftTipoDireccionI18n form base class.
 *
 * @method SftTipoDireccionI18n getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftTipoDireccionI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'id_idioma' => new sfWidgetFormInputHidden(),
      'nombre'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'SftTipoDireccion', 'column' => 'id', 'required' => false)),
      'id_idioma' => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdIdioma()), 'empty_value' => $this->getObject()->getIdIdioma(), 'required' => false)),
      'nombre'    => new sfValidatorString(array('max_length' => 24)),
    ));

    $this->widgetSchema->setNameFormat('sft_tipo_direccion_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftTipoDireccionI18n';
  }


}

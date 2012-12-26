<?php

/**
 * SftTipoTelefonoI18n form base class.
 *
 * @method SftTipoTelefonoI18n getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftTipoTelefonoI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'id_idioma' => new sfWidgetFormInputHidden(),
      'nombre'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'SftTipoTelefono', 'column' => 'id', 'required' => false)),
      'id_idioma' => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdIdioma()), 'empty_value' => $this->getObject()->getIdIdioma(), 'required' => false)),
      'nombre'    => new sfValidatorString(array('max_length' => 20)),
    ));

    $this->widgetSchema->setNameFormat('sft_tipo_telefono_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftTipoTelefonoI18n';
  }


}

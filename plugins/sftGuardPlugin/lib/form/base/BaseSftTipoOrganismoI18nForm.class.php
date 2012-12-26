<?php

/**
 * SftTipoOrganismoI18n form base class.
 *
 * @method SftTipoOrganismoI18n getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseSftTipoOrganismoI18nForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'nombre'      => new sfWidgetFormInputText(),
      'abreviatura' => new sfWidgetFormInputText(),
      'id_idioma'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'SftTipoOrganismo', 'column' => 'id', 'required' => false)),
      'nombre'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'abreviatura' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id_idioma'   => new sfValidatorChoice(array('choices' => array($this->getObject()->getIdIdioma()), 'empty_value' => $this->getObject()->getIdIdioma(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sft_tipo_organismo_i18n[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SftTipoOrganismoI18n';
  }


}
